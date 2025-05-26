<?php

namespace App\Repository\DoctorDashboard\Laboratories;

use App\Interfaces\DoctorDashboard\Laboratories\LaboratorieRepositoryInterface;
use App\Models\Laboratorie;

class LaboratorieRepository implements LaboratorieRepositoryInterface
{
    public function index()
    {
        return view('Dashboard.view.index', ['Laboratories' => Laboratorie::all()]);
    }

    public function create()
    {
        //
    }

    public function show(Laboratorie $Laboratorie)
    {
        //
    }

    public function store($attributes)
    {
        try {

            $Laboratorie = new Laboratorie();
            $Laboratorie->description = $attributes->description;
            $Laboratorie->invoice_id = $attributes->invoice_id;
            $Laboratorie->doctor_id = $attributes->doctor_id;
            $Laboratorie->patient_id = $attributes->patient_id;
            $Laboratorie->save();

            session()->flash('add');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(Laboratorie $Laboratorie) {}

    public function update($attributes)
    {
        try {

            $Laboratorie = Laboratorie::findOrFail($attributes->laboratorie_id);
            $Laboratorie->description = $attributes->description;
            $Laboratorie->save();

            session()->flash('edit');
            return redirect()->back();
        } catch (\Exception $ex) {

            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    public function destroy($request)
    {
        try {

            $Laboratorie = Laboratorie::find($request->laboratorie_id);
            $Laboratorie->delete();
            session()->flash('delete');
            return redirect()->back();
        } catch (\Exception $ex) {

            return redirect()->back()->withErrors($ex->getMessage());
        }
    }
}
