<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createAppointment = [
            ['name' => 'السبت'],
            ['name' => 'ألاحد'],
            ['name' => 'ألاثنين'],
            ['name' => 'الثلثاء'],
            ['name' => 'ألاربعاء'],
            ['name' => 'الخميس'],
            ['name' => 'الجمعة'],
        ];

        foreach ($createAppointment as $Appointment) {

            Appointment::create($Appointment);
        }
    }
}
