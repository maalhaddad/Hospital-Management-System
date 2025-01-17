<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Http\Requests\DoctorUpdateRequest;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Interfaces\Doctors\DoctorRepositoryInterface;

class DoctorController extends Controller
{

    protected mixed $DoctorRepository;
    public function __construct(DoctorRepositoryInterface $DoctorRepository )
    {

        $this->DoctorRepository = $DoctorRepository;
    }
    public function index()
    {
        return $this->DoctorRepository->index();
    }


    public function create()
    {
        return $this->DoctorRepository->create();
    }


    public function store(DoctorRequest $request)
    {

        return $this->DoctorRepository->store($request);
    }


    public function show(string $id)
    {
        //
    }


    public function edit(Doctor $Doctor)
    {
        return $this->DoctorRepository->edit($Doctor);
    }


    public function update(DoctorUpdateRequest $request, string $id)
    {
        return $this->DoctorRepository->update($request, $id);
    }


    public function destroy(string $id)
    {
        //
    }
}
