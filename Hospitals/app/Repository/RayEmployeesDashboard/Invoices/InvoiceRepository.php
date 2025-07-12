<?php

namespace App\Repository\RayEmployeesDashboard\Invoices;

use App\Interfaces\RayEmployeesDashboard\Invoices\InvoiceRepositoryInterface;
use App\Models\Ray;
use App\Traits\FileFunctionTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceRepository implements InvoiceRepositoryInterface
{
    use FileFunctionTrait;
    public function index()
    {
        $invoices = Ray::where('case', 0)->get();
        return view('Dashboard.rayemployee-dashboard.invoices.index',compact('invoices'));

    }

    public function completedInvoices()
    {
        $invoices = Ray::where('case', 1)->where('employee_id',auth()->user()->id)->get();
        return view('Dashboard.rayemployee-dashboard.invoices.completed_invoices',compact('invoices'));
    }

     public function show($id)
    {
        $ray = Ray::findOrFail($id);
        if(  $ray->employee_id == auth()->user()->id)
        {
          return view('dashboard.rayemployee-dashboard.invoices.view_rays',compact('ray'));        
        }
        return redirect()->back();
    }


    public function edit( $id)
    {
        $invoice = Ray::findOrFail($id);
        return view('Dashboard.rayemployee-dashboard.invoices.add_diagnosis',compact('invoice'));
    }

    public function update( $attributes, $id)
    {
        try {
            DB::beginTransaction();
            $Invoice = Ray::findOrFail($id);
            $Invoice->employee_id = Auth::user()->id;
            $Invoice->description_employee = $attributes->description_employee;
            $Invoice->case = 1;
            $Invoice->save();
             if ($attributes->hasFile('attachments')) {
                $Files = $attributes->file('attachments');
                foreach ($Files as $file ) {
                    $Invoice->Images()->create(
                    [
                        'filename' => $this->SaveImage($file, 'Rays', 'upload_image')
                    ]
                );
                }
               
            }

            DB::commit();
            session()->flash('edit');
            return redirect()->route('ray_employee.invoices.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors($ex->getMessage());
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
