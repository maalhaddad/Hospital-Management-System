<?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;
trait FileFunctionTrait
{
    protected function SaveImage($file, $folder, $disk)
    {

        $filename = time().'.'.$file->getClientOriginalExtension();

        $path = $file->storeAs($folder, $filename, $disk);

        return $filename;
    }
}
