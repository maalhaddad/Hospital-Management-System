<?php

namespace App\Repository\LaboratorieEmployeesDashboard\Invoices;

use App\Interfaces\LaboratorieEmployeesDashboard\Invoices\InvoiceRepositoryInterface;
use App\Models\Laboratorie;
use App\Traits\FileFunctionTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceRepository implements InvoiceRepositoryInterface
{

    use FileFunctionTrait;
    public function index()
    {
        $invoices = Laboratorie::where('case', 0)->get();
        return view('Dashboard.laboratorie-employee-dashboard.Invoices.index', compact('invoices'));
    }

    public function completedInvoices()
    {
        $invoices = Laboratorie::where('case', 1)->where('employee_id',auth()->user()->id)->get();
        return view('Dashboard.laboratorie-employee-dashboard.invoices.completed_invoices',compact('invoices'));
    }

    public function create()
    {
        //
    }

    public function show($id)
    {
         $laboratorie = Laboratorie::findOrFail($id);
         return view('Dashboard.laboratorie-employee-dashboard.Invoices.view_laboratorie',compact('laboratorie'));
    }

    public function store( $request)
    {
         try {



            session()->flash('add');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $invoice = Laboratorie::findOrFail($id);
        return view('Dashboard.laboratorie-employee-dashboard.Invoices.add_diagnosis',compact('invoice'));
    }

    public function update( $request, $id)
    {
        try {
            DB::beginTransaction();
            $Invoice = Laboratorie::findOrFail($id);
            $Invoice->employee_id = Auth::user()->id;
            $Invoice->description_employee = $request->description_employee;
            $Invoice->case = 1;
            $Invoice->save();
             if ($request->hasFile('attachments')) {
                $Files = $request->file('attachments');
                foreach ($Files as $file ) {
                    $Invoice->Images()->create(
                    [
                        'filename' => $this->SaveImage($file, 'Laboratories', 'upload_image')
                    ]
                );
                }

            }

            DB::commit();
            session()->flash('edit');
            return redirect()->route('laboratorie-employee.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    public function destroy($request)
    {
         try {

            $Invoice = Laboratorie::find($request->invoice_id);
            $Invoice->delete();
            session()->flash('delete');
            return redirect()->back();
        } catch (\Exception $ex) {

            return redirect()->back()->withErrors($ex->getMessage());
        }
    }
}
