<?php

namespace App\Repository\DoctorDashboard\Laboratories;

use App\Interfaces\DoctorDashboard\Laboratories\LaboratorieRepositoryInterface;
use App\Models\Laboratorie;
use App\Models\LaboratorieEmployee;
use App\Notifications\GeneralNotification;
use Illuminate\Support\Facades\Notification;

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

    public function show( $id)
    {
        $laboratorie = Laboratorie::findOrFail($id);
        return view('Dashboard.doctor-dashboard.invoices.view_Laboratorie',compact('laboratorie'));
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
            $laboratorieEmloyees = LaboratorieEmployee::all();
            Notification::send($laboratorieEmloyees , new GeneralNotification(
             [
                        'type' => 'create_laboratorie',
                        'title' => 'طلب تشخيص جديد',
                        'body' => ' تم اضافة طلب تشخيص جديد للمريض ' . $Laboratorie->Patient->name,
                        'route_name' => $Laboratorie->id,
                        'timestamp' => now()->toDateTimeString()
                    ]
                    ,'App.Models.'.getModelGuardName()
            ));
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
            return $Laboratorie->Doctor;
            

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
