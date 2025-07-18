<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\LaboratorieEmployees\LaboratorieEmployeeRepositoryInterface;
use Illuminate\Http\Request;

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

    
    public function store(Request $request)
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

    
    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(string $id)
    {
        //
    }
}
