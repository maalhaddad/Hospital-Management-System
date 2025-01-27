<?php

namespace App\Repository\Doctors;

use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Section;
use App\Traits\FileFunctionTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DoctorRepository implements DoctorRepositoryInterface
{

    use FileFunctionTrait;
    public function index()
    {
        return view('Dashboard.doctors.index', ['doctors' => Doctor::all()]);
    }


    public function create()
    {

        return view('Dashboard.doctors.add',
        [
            'sections' => Section::all(),
            'appointments' => Appointment::all(),
        ]);
    }

    public function store($request)
    {
        try {

            DB::beginTransaction();
            $Doctor = new Doctor();
            $Doctor->name = $request->name;
            $Doctor->email = $request->email;
            $Doctor->password = Hash::make($request->password);
            $Doctor->phone = $request->phone;
            $Doctor->section_id = $request->section_id;
            $Doctor->save();
            $Doctor->Appointments()->sync($request->appointments);
            if ($request->hasFile('photo')) {
                $Doctor->Image()->create(
                    [
                        'filename' => $this->SaveImage($request->file('photo'), 'doctors', 'upload_image')
                    ]
                );
            }
            DB::commit();
            session()->flash('add');
            return redirect()->route('doctors.create');

        } catch (\Exception $ex) {

            DB::rollBack();
            return redirect()->route('doctors.create')->withErrors($ex->getMessage());
        }
    }


    Public function edit($Doctor)
    {

        return view('Dashboard.doctors.add',
        [
            'Doctor'         => $Doctor,
            'sections'       => Section::all(),
            'appointments'   => Appointment::all(),
            'appointmentsId' => $Doctor->Appointments->pluck('id')->toArray()
        ]
        );
    }

    public function update($request , $id)
    {

        try {

            DB::beginTransaction();
            $Doctor = Doctor::find($id);
            $Doctor->name = $request->name;
            $Doctor->email = $request->email;
            $Doctor->phone = $request->phone;
            $Doctor->section_id = $request->section_id;
            $Doctor->save();
            $Doctor->Appointments()->sync($request->appointments);

                $funcname = $Doctor->Image ? 'update' : 'create';

            if ($request->hasFile('photo')) {
                $Doctor->Image()->$funcname(
                    [
                        'filename' => $this->SaveImage($request->file('photo'), 'doctors', 'upload_image')
                    ]
                );
            }

            DB::commit();
            session()->flash('edit');
            return redirect()->back();
        } catch (\Exception $ex) {

            DB::rollBack();
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    public function destroy($request)
    {
        try {
            $doctor = Doctor::find($request->doctor_id);

            if (isset($doctor->Image))
            {
                $this->deleteImage($doctor->Image->filename,'doctors', 'upload_image');
            }
            $doctor->delete();
            session()->flash('delete');
            return redirect()->back();
        } catch (\Exception $ex) {

            return redirect()->back()->withErrors($ex->getMessage());
        }
    }


    public function DeleteSelectDoctors($request)  {
        try {
            $doctorIds = explode(',',$request->delete_select_ids);
            DB::transaction(function () use ($doctorIds) {

                $doctors = Doctor::whereIn('id', $doctorIds)->get();
                foreach ($doctors as $doctor) {
                    if ($doctor->Image) {
                       $this->deleteImage($doctor->Image->filename,'doctors', 'upload_image');
                    }
                }
                Doctor::whereIn('id', $doctorIds)->delete();
            });

            session()->flash('delete');
            return redirect()->route('doctors.index');
        } catch (\Exception $ex) {
            return redirect()->route('doctors.index')->withErrors($ex->getMessage());
        }

    }

    public function updateStatus($request)  {

        try {


            Doctor::find($request->doctor_id)
            ->update([
                'status' => $request->status,
            ]);
            session()->flash('update-status');
            return redirect()->back();
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    public function updatePassword($request)
    {
        try {
            $doctor = Doctor::findorfail($request->id);
            $doctor->update([
                'password'=>Hash::make($request->password)
            ]);

            session()->flash('edit');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
