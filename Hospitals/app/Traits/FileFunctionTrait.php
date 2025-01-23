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


    public function deleteImage($filename, $folder, $disk)
{
    $path = $folder.'/' . $filename;

    if (Storage::disk($disk)->exists($path)) {
        Storage::disk($disk)->delete($path);

    }


}
}
