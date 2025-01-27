<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\sections\SectionRepositoryInterface;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    protected mixed $SectionRepository;

    public function __construct(SectionRepositoryInterface $SectionRepository )
    {

        $this->SectionRepository = $SectionRepository;
    }
    public function index()
    {
        return  $this->SectionRepository->index();
    }

    public function show(Section $section)
    {
        return $this->SectionRepository->show($section);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
         return $this->SectionRepository->store($request);
    }


    public function update(Request $request)
    {
        return $this->SectionRepository->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->SectionRepository->destroy($request);
    }
}
