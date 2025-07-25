<?php

namespace App\Repository\LaboratorieEmployees;

use App\Interfaces\LaboratorieEmployees\LaboratorieEmployeeRepositoryInterface;
use App\Models\LaboratorieEmployee;
use Illuminate\Support\Facades\Hash;

class LaboratorieEmployeeRepository implements LaboratorieEmployeeRepositoryInterface
{
    public function index()
    {
        return view('Dashboard.laboratorie-employee.index', ['laboratorie_employees' => LaboratorieEmployee::all()]);
    }

    public function create()
    {
        //
    }

    public function show(LaboratorieEmployee $LaboratorieEmployee)
    {
        //
    }

    public function store( $request)
    {
         try {

            $data = $request->validated();
            $LaboratorieEmployee = new LaboratorieEmployee();
            $LaboratorieEmployee->name = $data['name'];
            $LaboratorieEmployee->email = $data['email'];
            $LaboratorieEmployee->password = Hash::make( $data['password']);
            $LaboratorieEmployee->save();
            session()->flash('add');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(LaboratorieEmployee $LaboratorieEmployee)
    {

    }

    public function update( $request)
    {
        try {
            $data = $request->validated();
            $LaboratorieEmployee = LaboratorieEmployee::findOrFail($request->employee_id);
            $LaboratorieEmployee->name = $data['name'];
            $LaboratorieEmployee->email = $data['email'];
            if ($data['password'] !== null)
            {
                $LaboratorieEmployee->password = Hash::make($data['password']);
            }
                $LaboratorieEmployee->save();


            session()->flash('edit');
            return redirect()->back();
        } catch (\Exception $ex) {

            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    public function destroy($request)
    {
         try {

            $LaboratorieEmployee = LaboratorieEmployee::find($request->employee_id);
            $LaboratorieEmployee->delete();
            session()->flash('delete');
            return redirect()->back();
        } catch (\Exception $ex) {

            return redirect()->back()->withErrors($ex->getMessage());
        }
    }
}
