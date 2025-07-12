<?php

namespace App\Repository\DoctorDashboard\Rays;

use App\Interfaces\DoctorDashboard\Rays\RayRepositoryInterface;
use App\Models\Ray;

class RayRepository implements RayRepositoryInterface
{
    public function index()
    {
        return view('Dashboard.view.index', ['Rays' => Ray::all()]);
    }

    public function create()
    {
        //
    }

    public function show($id)
    {
        $ray = Ray::findOrFail($id);
        if(  $ray->doctor_id == auth()->user()->id)
        {
          return view('dashboard.doctor-dashboard.invoices.view_rays',compact('ray'));        
        }
        return redirect()->back();
    }

    public function store( $attributes)
    {
         try {

               $Ray = new Ray();
               $Ray->description = $attributes->description;
               $Ray->invoice_id = $attributes->invoice_id;
               $Ray->doctor_id = $attributes->doctor_id;
               $Ray->patient_id = $attributes->patient_id;
               $Ray->save();


            session()->flash('add');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(Ray $Ray)
    {

    }

    public function update($attributes)
    {
        try {

               $Ray = Ray::findOrFail($attributes->ray_id);
               $Ray->description = $attributes->description;
               $Ray->save();



            session()->flash('edit');
            return redirect()->back();
        } catch (\Exception $ex) {

            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    public function destroy($request)
    {
         try {

            $Ray = Ray::find($request->ray_id);
            $Ray->delete();
            session()->flash('delete');
            return redirect()->back();
        } catch (\Exception $ex) {

            return redirect()->back()->withErrors($ex->getMessage());
        }
    }
}
