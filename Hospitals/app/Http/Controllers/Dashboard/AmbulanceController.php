<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AmbulanceRequest;
use App\Interfaces\Ambulances\AmbulanceRepositoryInterface;
use App\Models\Ambulance;
use Illuminate\Http\Request;

class AmbulanceController extends Controller
{

    protected mixed $AmbulanceRepository;
    public function __construct(AmbulanceRepositoryInterface $AmbulanceRepository )
    {

        $this-> AmbulanceRepository = $AmbulanceRepository;
    }


    public function index()
    {
        return $this->AmbulanceRepository->index();
    }


    public function create()
    {
        return $this->AmbulanceRepository->create();
    }


    public function store(AmbulanceRequest $request)
    {

        return $this->AmbulanceRepository->store($request);
    }


    public function show(string $id)
    {
        //
    }


    public function edit($id)
    {
        return $this->AmbulanceRepository->edit($id);
    }


    public function update(AmbulanceRequest $request, string $id)
    {
        return $this->AmbulanceRepository->update($request, $id);
    }


    public function destroy(Request $request,string $id)
    {

        return $this->AmbulanceRepository->destroy($request);
    }
}
