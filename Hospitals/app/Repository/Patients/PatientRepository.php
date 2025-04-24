<?php

namespace App\Repository\Patients;

use App\Interfaces\Patients\PatientRepositoryInterface;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;

class PatientRepository implements PatientRepositoryInterface
{
    public function index()
    {

        return view('Dashboard.patients.index', ['Patients' => Patient::all()]);
    }

    public function create()
    {
        return view('Dashboard.patients.add');
    }


    public function edit(Patient $Patient)
    {
        return view('Dashboard.patients.add',compact('Patient'));
    }

    public function store($request)
    {
        try {
            $Patients = new Patient();
            $Patients->name = $request->name;
            $Patients->Address = $request->Address;
            $Patients->email = $request->email;
            $Patients->Password = Hash::make($request->Phone);
            $Patients->Date_Birth = $request->Date_Birth;
            $Patients->Phone = $request->Phone;
            $Patients->Gender = $request->Gender;
            $Patients->Blood_Group = $request->Blood_Group;
            $Patients->save();

            session()->flash('add');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request , $id)
    {

        try {

            $Patient = Patient::findOrFail($id);
            $Patient->name = $request->name;
            $Patient->Address = $request->Address;
            $Patient->email = $request->email;
            $Patient->Password = Hash::make($request->Phone);
            $Patient->Date_Birth = $request->Date_Birth;
            $Patient->Phone = $request->Phone;
            $Patient->Gender = $request->Gender;
            $Patient->Blood_Group = $request->Blood_Group;
            $Patient->save();

            session()->flash('edit');
            return redirect()->route('patients.index');
        } catch (\Exception $ex) {

            return redirect()->route('patients.index')->withErrors($ex->getMessage());
        }
    }

    public function destroy($request)
    {
        try {

            $Patient = Patient::find($request->patient_id);
            $Patient->delete();
            session()->flash('delete');
            return redirect()->route('patients.index');
        } catch (\Exception $ex) {

            return redirect()->route('patients.index')->withErrors($ex->getMessage());
        }
    }
}
