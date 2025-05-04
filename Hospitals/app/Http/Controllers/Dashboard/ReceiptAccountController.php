<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\ReceiptAccounts\ReceiptAccountRepositoryInterface;
use App\Models\ReceiptAccount;
use Illuminate\Http\Request;
use App\http\Requests\ReceiptRequest;

class ReceiptAccountController extends Controller
{
    private $receiptAccounts;   
    public function __construct(ReceiptAccountRepositoryInterface $receiptAccounts)
    {
        $this->receiptAccounts= $receiptAccounts;
    }
    public function index()
    {
        return $this->receiptAccounts->index();
    }

   
    public function create()
    {
        return $this->receiptAccounts->create();
    }

   
    public function store(ReceiptRequest $request)
    {
       return $this->receiptAccounts->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReceiptAccount $Receipt)
    {
        return $this->receiptAccounts->edit($Receipt);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->receiptAccounts->update($request, $id);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request, string $id)
    {
        return $this->receiptAccounts->destroy($request);
    }
}
