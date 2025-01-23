<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Section::create([
            'name' => 'قسم الجراحة',
            'description' =>'لإظهار رسائل التحقق مباشرةً تحت الحقول وتغيير لون الحقول إلى اللون الأحمر عند وجود خطأ في التحقق، يمكنك استخدام Bootstrap أو CSS مخصص. سنوضح هنا كيفية القيام بذلك باستخدام Bootstrap كونه شائع الاستخدام',
        ]);

         Section::create([
            'name' => 'قسم العظام',
            'description' =>'لإظهار رسائل التحقق مباشرةً تحت الحقول وتغيير لون الحقول إلى اللون الأحمر عند وجود خطأ في التحقق، يمكنك استخدام Bootstrap أو CSS مخصص. سنوضح هنا كيفية القيام بذلك باستخدام Bootstrap كونه شائع الاستخدام',
        ]);

        Section::create([
            'name' => 'قسم الانف والحنجرة',
            'description' =>'لإظهار رسائل التحقق مباشرةً تحت الحقول وتغيير لون الحقول إلى اللون الأحمر عند وجود خطأ في التحقق، يمكنك استخدام Bootstrap أو CSS مخصص. سنوضح هنا كيفية القيام بذلك باستخدام Bootstrap كونه شائع الاستخدام',
        ]);

        Section::create([
            'name' => 'قسم الباطنية',
            'description' =>'لإظهار رسائل التحقق مباشرةً تحت الحقول وتغيير لون الحقول إلى اللون الأحمر عند وجود خطأ في التحقق، يمكنك استخدام Bootstrap أو CSS مخصص. سنوضح هنا كيفية القيام بذلك باستخدام Bootstrap كونه شائع الاستخدام',

        ]);
    }
}
