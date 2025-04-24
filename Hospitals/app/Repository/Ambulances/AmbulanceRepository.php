<?php

namespace App\Repository\Ambulances;

use App\Interfaces\Ambulances\AmbulanceRepositoryInterface;
use App\Models\Ambulance;

class AmbulanceRepository implements AmbulanceRepositoryInterface
{
    public function index()
    {

        return view('Dashboard.services.ambulances.index', ['ambulances' => Ambulance::all()]);
    }

    public function create()
    {

        return view('Dashboard.services.ambulances.add');
    }

    public function edit($id)
    {
        $ambulance = Ambulance::find($id);
        // return $ambulance->id;
     return view('Dashboard.services.ambulances.add' ,['ambulance' => $ambulance]);
    }

    public function show(Ambulance $ambulance) {}

    public function store($request)
    {
        try {
            Ambulance::create(
                [
                    'car_number' => $request->car_number,
                    'car_model' => $request->car_model,
                    'car_year_made' => $request->car_year_made,
                    'car_type' => $request->car_type,
                    'driver_name' => $request->driver_name,
                    'driver_license_number' => $request->driver_license_number,
                    'driver_phone' => $request->driver_phone,
                    'notes' => $request->notes,
                ]
            );

            session()->flash('add');
            return redirect()->back();
        } catch (\Exception $ex) {

            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    public function update( $request , $id)
    {

        try {

            $ambulance = Ambulance::find($id);
            $request['is_available'] = $request->is_available ?? '0';
            $ambulance->update(
                [
                    'car_number' => $request->car_number,
                    'car_model' => $request->car_model,
                    'car_year_made' => $request->car_year_made,
                    'car_type' => $request->car_type,
                    'driver_name' => $request->driver_name,
                    'driver_license_number' => $request->driver_license_number,
                    'driver_number' => $request->phone_number,
                    'notes' => $request->notes,
                    'is_available' => $request->is_available,
                ]
            );

            session()->flash('edit');
            return redirect()->route('ambulances.index');
        } catch (\Exception $ex) {

            return redirect()->route('services.index')->withErrors($ex->getMessage());
        }
    }

    public function destroy($request)
    {
        try {

            $ambulance = Ambulance::find($request->ambulance_id);
            $ambulance->delete();
            session()->flash('delete');
            return redirect()->route('ambulances.index');
        } catch (\Exception $ex) {

            return redirect()->route('ambulances.index')->withErrors($ex->getMessage());
        }
    }
}
