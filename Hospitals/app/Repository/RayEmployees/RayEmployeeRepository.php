<?php

namespace App\Repository\RayEmployees;

use App\Interfaces\RayEmployees\RayEmployeeRepositoryInterface;
use App\Models\RayEmployee;
use Illuminate\Support\Facades\Hash;

class RayEmployeeRepository implements RayEmployeeRepositoryInterface
{
    public function index()
    {
        return view('Dashboard.ray_employees.index', ['ray_employees' => RayEmployee::all()]);
    }

    public function create()
    {
        //
    }

    public function show(RayEmployee $RayEmployee)
    {
        //
    }

    public function store( $attributes)
    {
         try {

            $RayEmployee = new RayEmployee();
            $RayEmployee->name = $attributes->name;
            $RayEmployee->email = $attributes->email;
            $RayEmployee->password = Hash::make($attributes->password);
            $RayEmployee->save();


            session()->flash('add');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(RayEmployee $RayEmployee)
    {

    }

    public function update( $attributes)
    {
        try {

            $RayEmployee = RayEmployee::find($attributes->employee_id);
            $RayEmployee->name = $attributes->name;
            $RayEmployee->email = $attributes->email;

            if($attributes->password !== null)
            {
                $RayEmployee->password = Hash::make($attributes->password);
            }
            $RayEmployee->save();

            session()->flash('edit');
            return redirect()->back();
        } catch (\Exception $ex) {

            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    public function destroy($request)
    {
         try {

            $RayEmployee = RayEmployee::find($request->employee_id);
            $RayEmployee->delete();
            session()->flash('delete');
            return redirect()->back();
        } catch (\Exception $ex) {

            return redirect()->back()->withErrors($ex->getMessage());
        }
    }
}
