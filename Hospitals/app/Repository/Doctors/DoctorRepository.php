<?php

namespace App\Repository\Doctors;

use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Doctor;
use App\Models\Section;
use App\Traits\FileFunctionTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorRepository implements DoctorRepositoryInterface
{

    use FileFunctionTrait;
    public function index()
    {

        return view('Dashboard.doctors.index', ['doctors' => Doctor::all()]);
    }

    public function create()
    {

        return view('Dashboard.doctors.add', ['sections' => Section::all()]);
    }

    public function store($attributes)
    {
        try {

            DB::beginTransaction();
            $Doctor = new Doctor();
            $Doctor->name = $attributes->name;
            $Doctor->email = $attributes->email;
            $Doctor->password = Hash::make($attributes->password);
            $Doctor->price = $attributes->price;
            $Doctor->phone = $attributes->phone;
            $Doctor->appointments = $attributes->appointments;
            $Doctor->section_id = $attributes->section_id;
            $Doctor->save();
            if ($attributes->hasFile('photo')) {
                $Doctor->Image()->create(
                    [
                        'filename' => $this->SaveImage($attributes->file('photo'), 'doctors', 'upload_image')
                    ]
                );
            }
            DB::commit();
            session()->flash('add');
            return redirect()->route('doctors.index');

        } catch (\Exception $ex) {

            DB::rollBack();
            return redirect()->route('doctors.index')->withErrors($ex->getMessage());
        }
    }


    Public function edit($Doctor)
    {

        return view('Dashboard.doctors.add',
        [
            'Doctor' => $Doctor,
            'sections' => Section::all()
        ]
        );
    }

    public function update($attributes , $id)
    {

        try {

            DB::beginTransaction();
            $Doctor = Doctor::find($id);
            $Doctor->name = $attributes->name;
            $Doctor->email = $attributes->email;
            $Doctor->password = Hash::make($attributes->password);
            $Doctor->price = $attributes->price;
            $Doctor->phone = $attributes->phone;
            $Doctor->appointments = $attributes->appointments;
            $Doctor->section_id = $attributes->section_id;
            $Doctor->save();

            if ($attributes->hasFile('photo')) {
                $Doctor->Image()->update(
                    [
                        'filename' => $this->SaveImage($attributes->file('photo'), 'doctors', 'upload_image')
                    ]
                );
            }

            DB::commit();
            session()->flash('edit');
            return redirect()->route('doctors.index');
        } catch (\Exception $ex) {

            DB::rollBack();
            return redirect()->route('doctors.index')->withErrors($ex->getMessage());
        }
    }

    public function destroy($attributes)
    {
        try {
            $section = Section::find($attributes->section_id);
            $section->delete();
            session()->flash('delete');
            return redirect()->route('sections.index');
        } catch (\Exception $ex) {

            return redirect()->route('sections.index')->withErrors($ex->getMessage());
        }
    }
}
