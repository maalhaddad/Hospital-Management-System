<?php
namespace App\Traits;
use Illuminate\Database\Eloquent\Model;

Trait CRUDFunctionTrait
{

    public function getAllData(Model $model)
    {
        return $model->all();
    }

    public function getAllDataById(Model $model, $id)
    {
        return $model->findOrFail($id);
    }
}
