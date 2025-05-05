<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\PaymentAccounts\PaymentAccountRepositoryInterface;
use App\Models\PaymentAccount;
use Illuminate\Http\Request;

class PaymentAccountController extends Controller
{

    protected $payment;

    public function __construct(PaymentAccountRepositoryInterface $payment)
    {
           $this->payment= $payment;
    }
    public function index()
    {
        return $this->payment->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->payment->create();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->payment->store($request);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        return $this->payment->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentAccount $payment, $id)
    {
        return $this->payment->edit($payment , $id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->payment->update($request , $id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->payment->destroy($request);

    }

    public function gitCredit(Request $request)
    {
        return $this->payment->gitCredit($request->patient_id);
    }
}
