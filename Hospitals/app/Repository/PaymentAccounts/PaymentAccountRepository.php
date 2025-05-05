<?php

namespace App\Repository\PaymentAccounts;

use App\Interfaces\PaymentAccounts\PaymentAccountRepositoryInterface;
use App\Models\FundAccount;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\PaymentAccount;
use Illuminate\Support\Facades\DB;

class PaymentAccountRepository implements PaymentAccountRepositoryInterface
{
    public function index()
    {
        return view('Dashboard.payments.index', ['Payments' => PaymentAccount::all()]);
    }

    public function create()
    {

        return view('Dashboard.payments.add', ['Patients' => Patient::all()]);
    }

    public function show($id)
    {
        $PaymentAccount = PaymentAccount::find($id);
        return view('Dashboard.payments.print',['payment_account' => $PaymentAccount]);
    }

    public function store( $attributes)
    {
        DB::beginTransaction();
         try {

            $payment_accounts = new PaymentAccount();
            $payment_accounts->date =date('y-m-d');
            $payment_accounts->patient_id = $attributes->patient_id;
            $payment_accounts->amount = $attributes->amount;
            $payment_accounts->description = $attributes->description;
            $payment_accounts->save();

           // store fund_accounts
           $fund_accounts = new FundAccount();
           $fund_accounts->date =date('y-m-d');
           $fund_accounts->Payment_id = $payment_accounts->id;
           $fund_accounts->credit = $attributes->amount;
           $fund_accounts->Debit = 0.00;
           $fund_accounts->save();

           // store patient_accounts
           $patient_accounts = new PatientAccount();
           $patient_accounts->date =date('y-m-d');
           $patient_accounts->patient_id = $attributes->patient_id;
           $patient_accounts->Payment_id = $payment_accounts->id;
           $patient_accounts->Debit = $attributes->amount;
           $patient_accounts->credit = 0.00;
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

    public function edit(PaymentAccount $PaymentAccount, $id)
    {
        $payment = PaymentAccount::find($id);

        return view('Dashboard.payments.add', [
            'Patients' => Patient::all(),
            'Payment'  => $payment,
        ]);

    }

    public function update( $attributes, $id)
    {
        DB::beginTransaction();
        try {

            $PaymentAccount = PaymentAccount::findOrFail($id);
            $PaymentAccount->date =date('y-m-d');
            $PaymentAccount->patient_id = $attributes->patient_id;
            $PaymentAccount->amount = $attributes->amount;
            $PaymentAccount->description = $attributes->description;
            $PaymentAccount->save();

            // update fund_accounts
            $fund_accounts = FundAccount::where('Payment_id',$PaymentAccount->id)->first();
            $fund_accounts->date =date('y-m-d');
            $fund_accounts->Payment_id = $PaymentAccount->id;
            $fund_accounts->credit = $attributes->amount;
            $fund_accounts->Debit = 0.00;
            $fund_accounts->save();

            // update patient_accounts
            $patient_accounts = PatientAccount::where('Payment_id',$PaymentAccount->id)->first();
            $patient_accounts->date =date('y-m-d');
            $patient_accounts->patient_id = $attributes->patient_id;
            $patient_accounts->Payment_id = $PaymentAccount->id;
            $patient_accounts->Debit = $attributes->amount;
            $patient_accounts->credit = 0.00;
            $patient_accounts->save();

            DB::commit();


            session()->flash('edit');
            return redirect()->route('Payment.index');
        } catch (\Exception $ex) {

            DB::rollBack();
            return redirect()->route('Payment.index')->withErrors($ex->getMessage());
        }
    }

    public function destroy($request)
    {
         try {

            $PaymentAccount = PaymentAccount::find($request->Payment_id);
            $PaymentAccount->delete();
            session()->flash('delete');
            return redirect()->route('Payment.index');
        } catch (\Exception $ex) {

            return redirect()->route('payments.index')->withErrors($ex->getMessage());
        }
    }


    public function gitCredit($patient_id)
    {
        $Debit = PatientAccount::where('patient_id', $patient_id)->sum('Debit');
        $credit = PatientAccount::where('patient_id', $patient_id)->sum('credit');
        $creditBalance = $Debit - $credit;
         return $patient_id;
        return response()->json([
            'creditBalance' => $creditBalance
        ]);
    }
}
