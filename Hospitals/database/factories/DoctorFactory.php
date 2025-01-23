<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Doctor;
use App\Models\Appointment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     *
     */

     protected $model = Doctor::class;

    public function definition(): array
    {
        return [

            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'section_id' => Section::all()->random()->id,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone' => $this->faker->phoneNumber,
        ];
    }

    public function configure(): self
{
    return $this->afterCreating(function ($model) {
        $appointments = $this->getRandomExistingAppointments();
        $model->appointments()->attach($appointments);
    });
}

// Function to get random existing appointments
private function getRandomExistingAppointments()
{
    $appointmentIds = Appointment::pluck('id')->toArray(); // Get all appointment IDs
    $randomCount = rand(1, count($appointmentIds)); // Random number of appointments
    return array_rand(array_flip($appointmentIds), $randomCount); // Pick random appointments
}
}
