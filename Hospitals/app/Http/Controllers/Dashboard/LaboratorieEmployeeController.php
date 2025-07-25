<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\LaboratorieEmployees\LaboratorieEmployeeRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\LaboratorieEmployeeRequest;

class LaboratorieEmployeeController extends Controller
{

    protected $LaboratorieEmployee;

    public function __construct(LaboratorieEmployeeRepositoryInterface $laboratorieEmployeeRepositoryInterface)
    {
        $this->LaboratorieEmployee = $laboratorieEmployeeRepositoryInterface;
    }

    public function index()
    {
        return $this->LaboratorieEmployee->index();
    }


    public function create()
    {
        //
    }


    public function store(LaboratorieEmployeeRequest $request)
    {
        return $this->LaboratorieEmployee->store($request);
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(LaboratorieEmployeeRequest $request, string $id)
    {
        return $this->LaboratorieEmployee->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->LaboratorieEmployee->destroy($request);
    }
}
