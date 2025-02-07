<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Insurances\InsuranceRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Insurance;

class InsuranceController extends Controller
{

    protected mixed $InsuranceRepository;
    public function __construct(InsuranceRepositoryInterface $InsuranceRepository )
    {

        $this->InsuranceRepository = $InsuranceRepository;
    }


    public function index()
    {
        return $this->InsuranceRepository->index();
    }


    public function create()
    {
        return $this->InsuranceRepository->create();
    }


    public function store(Request $request)
    {

        return $this->InsuranceRepository->store($request);
    }


    public function show(string $id)
    {
        //
    }


    public function edit(Insurance $Insurance)
    {
        return $this->InsuranceRepository->edit($Insurance);
    }


    public function update(Request $request, string $id)
    {
        return $this->InsuranceRepository->update($request, $id);
    }


    public function destroy(Request $request,string $id)
    {
        if($request->delete_type)
        {
            return $this->InsuranceRepository->DeleteSelectInsurances($request);
        }
        return $this->InsuranceRepository->destroy($request);
    }

}
