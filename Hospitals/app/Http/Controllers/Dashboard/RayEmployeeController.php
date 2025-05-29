<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\RayEmployees\RayEmployeeRepositoryInterface;
use Illuminate\Http\Request;

class RayEmployeeController extends Controller
{
    protected $RayEmployee;

    public function __construct(RayEmployeeRepositoryInterface $RayEmployee)
    {
        $this->RayEmployee = $RayEmployee;
    }

    public function index()
    {
        return $RayEmployees = $this->RayEmployee->index();
    }


    public function store(Request $request)
    {
        return $this->RayEmployee->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->RayEmployee->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->RayEmployee->destroy($request);
    }
}
