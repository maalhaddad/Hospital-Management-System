<?php

namespace App\Http\Controllers\Dashboard;

use App\Interfaces\Services\SingleServiceRepositoryInterface;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Notifications\GeneralNotification;

class SingleServiceController extends Controller
{

    protected mixed $SingleServiceRepository;

    public function __construct(SingleServiceRepositoryInterface $SingleServiceRepository)
    {

        $this->SingleServiceRepository = $SingleServiceRepository;
    }
    public function index()
    {
       
        return $this->SingleServiceRepository->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required|unique:service_translations,name',
            'price'       => 'required',
            'description' => 'nullable|string'
        ]);
        return $this->SingleServiceRepository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $this->validate($request, [
            'name'        => 'required',
            'price'       => 'required',
            'description' => 'nullable|string'
        ]);
        return $this->SingleServiceRepository->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request )
    {
       return $this->SingleServiceRepository->destroy($request);
    }
}
