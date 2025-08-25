<?php


namespace App\Interfaces\PatientsDashboard;
use App\Models\Patient;

 interface  PatientRepositoryInterface
{
    public function invoices();
    public function payments();
    public function laboratories();
    public function rays();
    public function laboratoriesView($laboratorieId);
    public function raysView($raysId);
    public function doctorsList();
    public function chats();



}

