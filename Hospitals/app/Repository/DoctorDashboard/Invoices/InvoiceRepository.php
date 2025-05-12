<?php

namespace App\Repository\DoctorDashboard\Invoices;

use App\Interfaces\DoctorDashboard\Invoices\InvoiceRepositoryInterface;
use App\Models\Doctor;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;

class InvoiceRepository implements InvoiceRepositoryInterface
{
    public function index()
    {
        $Invoice = Doctor::find(auth()->user()->id)->Invoices();
        return view('Dashboard.doctor-dashboard.invoices.index', ['invoices' => $Invoice]);

    }

    public function create()
    {
        //
    }

    public function show(Model $Invoice)
    {
        //
    }

    public function store(array $attributes)
    {
         try {



            session()->flash('add');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(Model $Invoice)
    {

    }

    public function update(array $attributes, $id)
    {
        try {

            $Invoice = Model::findOrFail($id);


            session()->flash('edit');
            return redirect()->route('view.index');
        } catch (\Exception $ex) {

            return redirect()->route('view.index')->withErrors($ex->getMessage());
        }
    }

    public function destroy($request)
    {
         try {

            $Invoice = Model::find($request->Invoice_id);
            $Invoice->delete();
            session()->flash('delete');
            return redirect()->route('view.index');
        } catch (\Exception $ex) {

            return redirect()->route('view.index')->withErrors($ex->getMessage());
        }
    }
}
