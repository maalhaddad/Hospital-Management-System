<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRayRequest;
use App\Interfaces\DoctorDashboard\Rays\RayRepositoryInterface;
use Illuminate\Http\Request;

class RayController extends Controller
{

    protected $Ray;

    public function __construct(RayRepositoryInterface $Ray)
    {
        $this->Ray = $Ray;
    }
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(StoreRayRequest $request)
    {
         return $this->Ray->store($request);
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
        return $this->Ray->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Ray->destroy($request);
    }
}
