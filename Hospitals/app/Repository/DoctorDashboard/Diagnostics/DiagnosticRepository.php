<?php

namespace App\Repository\DoctorDashboard\Diagnostics;

use App\Interfaces\DoctorDashboard\Diagnostics\DiagnosticRepositoryInterface;
use App\Models\Diagnostic;
use App\Models\Invoice;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class DiagnosticRepository implements DiagnosticRepositoryInterface
{
    public function index($id)
    {
        return view('Dashboard.view.index', ['Diagnostics' => Diagnostic::all()]);
    }

    public function create()
    {
        //
    }

    public function show( $id)
    {
        $patient = patient::find($id);
        return view('Dashboard.doctor-dashboard.invoices.patient_record', ['patient' => $patient]);
    }

    public function store( $attributes)
    {
        DB::beginTransaction();
         try {

            $Diagnostic = new Diagnostic();
            $Diagnostic->date = date('Y-m-d');
            $Diagnostic->diagnosis = $attributes->diagnosis;
            $Diagnostic->medicine = $attributes->medicine;
            $Diagnostic->doctor_id = $attributes->doctor_id;
            $Diagnostic->patient_id = $attributes->patient_id;
            $Diagnostic->invoice_id = $attributes->invoice_id;
            $Diagnostic->save();
            $invoice = Invoice::find($Diagnostic->invoice_id);
            $invoice->invoice_status = 3;
            $invoice->save();

            DB::commit();
            session()->flash('add');
            return redirect()->back();
        }

        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

     public function addReview( $attributes)
    {
        DB::beginTransaction();
         try {

            $Diagnostic = new Diagnostic();
            $Diagnostic->date = date('Y-m-d');
            $Diagnostic->review_date = $attributes->review_date;
            $Diagnostic->diagnosis = $attributes->diagnosis;
            $Diagnostic->medicine = $attributes->medicine;
            $Diagnostic->doctor_id = $attributes->doctor_id;
            $Diagnostic->patient_id = $attributes->patient_id;
            $Diagnostic->invoice_id = $attributes->invoice_id;
            $Diagnostic->save();
            $invoice = Invoice::find($Diagnostic->invoice_id);
            $invoice->invoice_status = 2;
            $invoice->save();

            DB::commit();
            session()->flash('add');
            return redirect()->back();
        }

        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(Diagnostic $Diagnostic)
    {

    }

    public function update(array $attributes, $id)
    {
        try {

            $Diagnostic = Diagnostic::findOrFail($id);


            session()->flash('edit');
            return redirect()->route('view.index');
        } catch (\Exception $ex) {

            return redirect()->route('view.index')->withErrors($ex->getMessage());
        }
    }

    public function destroy($request)
    {
         try {

            $Diagnostic = Diagnostic::find($request->Diagnostic_id);
            $Diagnostic->delete();
            session()->flash('delete');
            return redirect()->route('view.index');
        } catch (\Exception $ex) {

            return redirect()->route('view.index')->withErrors($ex->getMessage());
        }
    }
}
