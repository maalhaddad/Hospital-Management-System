<?php

namespace App\Interfaces\ReceiptAccounts;

use App\Models\ReceiptAccount;

interface ReceiptAccountRepositoryInterface
{
    public function index();

    public function create();

    public function show(ReceiptAccount $ReceiptAccount);

    public function store( $attributes);

    public function edit(ReceiptAccount $ReceiptAccount);

    public function update( $attributes, $id);

    public function destroy($id);
}
