<?php

namespace App\Repository\Insurances;

use App\Interfaces\Insurances\InsuranceRepositoryInterface;
use App\Models\Insurance;

class InsuranceRepository implements InsuranceRepositoryInterface
{
    public function index()
    {

        return view('Dashboard.services.insurances.index', ['insurances' => Insurance::all()]);
    }

    public function create()
    {
        return view('Dashboard.services.insurances.add');
    }

    public function show(Insurance $Service)
    {

    }

    public function store($request)
    {
        try {
            Insurance::create(
                [
                    'name' => $request->name,
                    'insurance_code' => $request->insurance_code,
                    'discount_percentage' => $request->discount_percentage,
                    'company_rate' => $request->Company_rate,
                    'notes' => $request->notes,
                ]
            );

            session()->flash('add');
            return redirect()->back();
        } catch (\Exception $ex) {

            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    public function edit(Insurance $insurance)
    {
        return view('Dashboard.services.insurances.add', ['insurance' => $insurance]);
    }

    public function update($request , $id)
    {
        

        try {

            $insurance = Insurance::find($id);
            $request['status'] =$request->status ?? '0';
            $insurance->update(
                [
                    'name' => $request->name,
                    'insurance_code' => $request->insurance_code,
                    'discount_percentage' => $request->discount_percentage,
                    'company_rate' => $request->Company_rate,
                    'notes' => $request->notes,
                    'status' =>$request->status,

                ]
            );

            session()->flash('edit');
            return redirect()->route('insurances.index');
        } catch (\Exception $ex) {

            return redirect()->route('insurances.index')->withErrors($ex->getMessage());
        }
    }

    public function destroy($request)
    {
        try {
            $insurance = Insurance::find($request->insurance_id);
            $insurance->delete();
            session()->flash('delete');
            return redirect()->route('insurances.index');
        } catch (\Exception $ex) {

            return redirect()->route('insurances.index')->withErrors($ex->getMessage());
        }
    }
}
