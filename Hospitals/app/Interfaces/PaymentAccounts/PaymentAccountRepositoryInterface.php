<?php

namespace App\Interfaces\PaymentAccounts;

use App\Models\PaymentAccount;

interface PaymentAccountRepositoryInterface
{
    public function index();

    public function create();

    public function show($id);

    public function store( $attributes);

    public function edit(PaymentAccount $PaymentAccount , $id);

    public function update( $attributes, $id);

    public function destroy($id);

    public function gitCredit($patient_id);
}
