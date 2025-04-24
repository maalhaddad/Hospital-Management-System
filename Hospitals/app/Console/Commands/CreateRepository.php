<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CreateRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Interface and Repository classes for a given model';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = Str::studly($this->argument('name'));
        $plural = Str::pluralStudly($name);

        $interfaceDir = app_path("Interfaces/{$plural}");
        $repositoryDir = app_path("Repository/{$plural}");

        if ($this->directoriesExist($interfaceDir, $repositoryDir)) {
            $this->error('Interface or Repository directory already exists.');
            return Command::FAILURE;
        }

        $this->createDirectories([$interfaceDir, $repositoryDir]);

        $this->createInterface($name, $interfaceDir);
        $this->createRepository($name, $repositoryDir);

        $this->info("Interface and Repository for {$name} created successfully.");
        // return Command::SUCCESS;

        // إضافة بيانات الريبو الى ملف البروفايدر
        $bindingLine = "\$this->app->bind({$name}RepositoryInterface::class ,{$name}Repository::class);";

        $providerPath = app_path('Providers/RepositoryServiceProvider.php');


        if (!File::exists($providerPath)) {
            $this->error("RepositoryServiceProvider.php not found!");
            return Command::FAILURE;
        }

        $content = File::get($providerPath);

        // تأكد ما انضاف من قبل
        if (Str::contains($content, $bindingLine)) {
            $this->warn("Binding already exists in AppServiceProvider.");
            return Command::SUCCESS;
        }

        $updated = preg_replace(
            '/public function register\(\)\s*\{/',
            "public function register()\n    {\n        {$bindingLine}",
            $content
        );

        if ($updated) {
            File::put($providerPath, $updated);
            $this->info("Binding line added to AppServiceProvider.");
        } else {
            $this->error("Failed to inject the binding. Please check the structure of AppServiceProvider.");
        }
          $this->info('Test Class 5');
        return Command::SUCCESS;
    }


    protected function directoriesExist(string $interfaceDir, string $repositoryDir): bool
    {
        // التحقق من وجود المجلدات
        return File::exists($interfaceDir) || File::exists($repositoryDir);
    }

    protected function createDirectories(array $directories): void
    {
        // دالة تنشى المجلدات
        foreach ($directories as $directory) {
            File::makeDirectory($directory, 0755, true);
        }
    }

    protected function createInterface(string $name, string $directory): void
    {
        // دالة تنشى ال Interface
        $interfaceName = "{$name}RepositoryInterface";
        $namespace = "App\\Interfaces\\{$name}s";
        $filePath = "{$directory}/{$interfaceName}.php";

        $content = $this->buildStub('interface', [
            '{{namespace}}' => $namespace,
            '{{interfaceName}}' => $interfaceName,
            '{{model}}' => $name,
        ]);

        File::put($filePath, $content);
        $this->info("Interface created: {$filePath}");
    }

    protected function createRepository(string $name, string $directory): void
    {
        // دالة تنشى كلاس الريبوو
        $repositoryName = "{$name}Repository";
        $interfaceName = "{$name}RepositoryInterface";
        $namespace = "App\\Repository\\{$name}s";
        $interfaceNamespace = "App\\Interfaces\\{$name}s\\{$interfaceName}";
        $filePath = "{$directory}/{$repositoryName}.php";

        $content = $this->buildStub('repository', [
            '{{namespace}}' => $namespace,
            '{{repositoryName}}' => $repositoryName,
            '{{interfaceNs}}' => $interfaceNamespace,
            '{{interfaceName}}' => $interfaceName,
            '{{model}}' => $name,
        ]);

        File::put($filePath, $content);
        $this->info("Repository created: {$filePath}");
    }

    protected function buildStub(string $type, array $replacements): string
    {
        $stubPath = resource_path("stubs/{$type}.stub");
        $stub = File::get($stubPath);

        foreach ($replacements as $key => $value) {
            $stub = str_replace($key, $value, $stub);
        }

        return $stub;
    }
}
