<?php

namespace App\Repository\Services;

use App\Interfaces\Services\SingleServiceRepositoryInterface;
use App\Models\Service;

class SingleServiceRepository implements SingleServiceRepositoryInterface
{
    public function index()
    {

        return view('Dashboard.services.single.index', ['services' => Service::all()]);
    }

    public function show(Service $Service)
    {
        $doctors = $Service->Doctors;

        return view('Dashboard.Services.show_doctors', compact('doctors', 'Service'));
    }

    public function store($request)
    {
        try {

            Service::create(
                [
                    'name' => $request->name,
                    'price' => $request->price,
                    'description' => $request->description,
                ]
            );

            session()->flash('add');
            return redirect()->back();
        } catch (\Exception $ex) {

            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    public function update($request)
    {

        try {

            $Service = Service::find($request->service_id);
            $Service->update(
                [
                    'name' => $request->name,
                    'price' => $request->price,
                    'description' => $request->description,
                    'status' => $request->status

                ]
            );

            session()->flash('edit');
            return redirect()->route('services.index');
        } catch (\Exception $ex) {

            return redirect()->route('services.index')->withErrors($ex->getMessage());
        }
    }

    public function destroy($request)
    {
        try {
            $Service = Service::find($request->service_id);
            $Service->delete();
            session()->flash('delete');
            return redirect()->route('services.index');
        } catch (\Exception $ex) {

            return redirect()->route('services.index')->withErrors($ex->getMessage());
        }
    }
}
