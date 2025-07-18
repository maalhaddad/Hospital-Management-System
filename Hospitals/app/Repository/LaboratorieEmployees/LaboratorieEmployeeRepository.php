<?php

namespace App\Repository\LaboratorieEmployees;

use App\Interfaces\LaboratorieEmployees\LaboratorieEmployeeRepositoryInterface;
use App\Models\LaboratorieEmployee;

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

    public function update( $request, $id)
    {
        try {

            $LaboratorieEmployee = LaboratorieEmployee::findOrFail($id);


            session()->flash('edit');
            return redirect()->route('view.index');
        } catch (\Exception $ex) {

            return redirect()->route('view.index')->withErrors($ex->getMessage());
        }
    }

    public function destroy($request)
    {
         try {

            $LaboratorieEmployee = LaboratorieEmployee::find($request->LaboratorieEmployee_id);
            $LaboratorieEmployee->delete();
            session()->flash('delete');
            return redirect()->route('view.index');
        } catch (\Exception $ex) {

            return redirect()->route('view.index')->withErrors($ex->getMessage());
        }
    }
}
