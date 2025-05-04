<?php

namespace App\Repository\ReceiptAccounts;

use App\Interfaces\ReceiptAccounts\ReceiptAccountRepositoryInterface;
use App\Models\FundAccount;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\ReceiptAccount;
use Illuminate\Support\Facades\DB;

class ReceiptAccountRepository implements ReceiptAccountRepositoryInterface
{
    public function index()
    {
        return view('Dashboard.receipts.index', ['receipts' => ReceiptAccount::all()]);

        // $Debit = PatientAccount::where("patient_id","=","1")->sum("Debit");
        // $credit = PatientAccount::where("patient_id","=","1")->sum("credit");
        // return $Debit-$credit;

    }

    public function create()
    {
        return view('Dashboard.receipts.add', ['Patients' => Patient::all()]);
        
    }

    public function show(ReceiptAccount $ReceiptAccount)
    {
        
    }

    public function store( $attributes)
    {
        // return $attributes;
        DB::beginTransaction();
         try {

            $ReceiptAccount = new ReceiptAccount();
            $ReceiptAccount->date = date('Y-m-d');
            $ReceiptAccount->patient_id = $attributes->patient_id;
            $ReceiptAccount->Debit = $attributes->Debit;
            $ReceiptAccount->description = $attributes->description;
            $ReceiptAccount->save();
            // store fund_accounts
            $fund_accounts = new FundAccount();
            $fund_accounts->date =date('y-m-d');
            $fund_accounts->receipt_id = $ReceiptAccount->id;
            $fund_accounts->Debit = $attributes->Debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->save();
            // store patient_accounts
            $patient_accounts = new PatientAccount();
            $patient_accounts->date =date('y-m-d');
            $patient_accounts->patient_id = $attributes->patient_id;
            $patient_accounts->receipt_id = $ReceiptAccount->id;
            $patient_accounts->Debit = 0.00;
            $patient_accounts->credit =$attributes->Debit;
            $patient_accounts->save();
            DB::commit();
            session()->flash('add');
            return redirect()->back();
        }

        catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(ReceiptAccount $Receipt)
    {
        return view('Dashboard.receipts.add', [
            'Patients' => Patient::all(),
            'Receipt'  => $Receipt,
        ]);
      
    }

    public function update( $attributes, $id)
    {
        DB::beginTransaction();
        try {
            $ReceiptAccount = ReceiptAccount::findOrFail($id);
            $ReceiptAccount->date = date('Y-m-d');
            $ReceiptAccount->patient_id = $attributes->patient_id;
            $ReceiptAccount->Debit = $attributes->Debit;
            $ReceiptAccount->description = $attributes->description;
            $ReceiptAccount->save();

             // store fund_accounts
             $fund_accounts = FundAccount::where('receipt_id',$ReceiptAccount->id)->first();
             $fund_accounts->date =date('y-m-d');
             $fund_accounts->receipt_id = $ReceiptAccount->id;
             $fund_accounts->Debit = $attributes->Debit;
             $fund_accounts->credit = 0.00;
             $fund_accounts->save();
             // store patient_accounts
             $patient_accounts = PatientAccount::where('receipt_id',$ReceiptAccount->id)->first();
             $patient_accounts->date =date('y-m-d');
             $patient_accounts->patient_id = $attributes->patient_id;
             $patient_accounts->receipt_id = $ReceiptAccount->id;
             $patient_accounts->Debit = 0.00;
             $patient_accounts->credit =$attributes->Debit;
             $patient_accounts->save();

             DB::commit();
            session()->flash('edit');
            return redirect()->route('Receipts.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('Receipts.index')->withErrors($ex->getMessage());
        }
    }

    public function destroy($request)
    {
        
         try {

            $ReceiptAccount = ReceiptAccount::find($request->Receipt_id);
            $ReceiptAccount->delete();
            session()->flash('delete');
            return redirect()->route('Receipts.index');
        } catch (\Exception $ex) {

            return redirect()->route('Receipts.index')->withErrors($ex->getMessage());
        }
    }
}
