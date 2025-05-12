<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\DoctorLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class DoctorController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(DoctorLoginRequest $request)
    {
         if($request->authenticate())
        {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::DOCTOR);
        }

        return redirect()->back()->withErrors(['name'=> 'hhhhhhhhhhhhhhhhhh']);
    }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
          Auth::guard('doctor')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
