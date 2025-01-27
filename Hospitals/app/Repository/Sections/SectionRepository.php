<?php

namespace App\Repository\Sections;

use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Models\Section;

class SectionRepository implements SectionRepositoryInterface
{
    public function index()
    {

      return view('Dashboard.sections.index' , ['sections' => Section::all()]);
    }

    public function show(Section $section)
    {
        $doctors = $section->Doctors;

        return view('Dashboard.sections.show_doctors',compact('doctors','section'));
    }

    public function store($attributes)
    {
        try {

            Section::create(
                [
                    'name' => $attributes->name,
                    'description' => $attributes->description,
                ]
                );

                session()->flash('add');
                return redirect()->route('sections.index');
        } catch (\Exception $ex) {

            return redirect()->route('sections.index')->withErrors($ex->getMessage());
        }

    }

    public function update($attributes)
    {

        try {

            $section = Section::find($attributes->section_id);
            $section->update(
                [
                    'name' => $attributes->name,
                    'description' => $attributes->description,

                ]
                );

                session()->flash('edit');
                return redirect()->route('sections.index');
        } catch (\Exception $ex) {

            return redirect()->route('sections.index')->withErrors($ex->getMessage());
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
