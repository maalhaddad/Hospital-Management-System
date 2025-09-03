<?php

use App\Models\Doctor;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/
$guards = ['web','admin','patient','doctor','ray_employee','laboratorie_employee', 'api'];
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
},['guards' => $guards]);

Broadcast::channel('App.Models.Doctor.{id}', function ($user, $id) {
    return auth()->guard('doctor')->check() && auth('doctor')->id() == $id;
},['guards' => $guards]);

// Admin channel
Broadcast::channel('App.Models.Admin.{id}', function ($user, $id) {
    return auth('admin')->check() && auth('admin')->id() == (int) $id;
},['guards' => $guards]);

// Patient channel
Broadcast::channel('App.Models.Patient.{id}', function ($user, $id) {
    return auth('patient')->check() && auth('patient')->id() == (int) $id;
},['guards' => $guards]);

// Ray Employee
Broadcast::channel('App.Models.RayEmployee.{id}', function ($user, $id) {
    return auth('ray_employee')->check() && auth('ray_employee')->id() == (int) $id;
},['guards' => $guards]);

// Laboratorie Employee
Broadcast::channel('App.Models.LaboratorieEmployee.{id}', function ($user, $id) {
    return auth('laboratorie_employee')->check() && auth('laboratorie_employee')->id() == (int) $id;
},['guards' => $guards]);

Broadcast::channel('App.Models.LaboratorieEmployee', function ($user) {
    return auth('laboratorie_employee')->check();
},['guards' => $guards]);


Broadcast::channel('RayEmployee', function ($user) {
    return $user instanceof \App\Models\RayEmployee;
},['guards' => $guards ]);

// Broadcast::channel('chat-Patient-{receiver_email}', function ($user, $receiver_email) {
//     return auth('patient')->check() && auth('patient')->user()->email == $receiver_email;
// },['guards' => $guards ]);

// Broadcast::channel('chat-Doctor-{receiver_email}', function ($user, $receiver_email) {
//     return auth('doctor')->check() && auth('doctor')->user()->email == $receiver_email;
// },['guards' => $guards ]);


Broadcast::channel('chat.{receiver_id}', function ($user, $receiver_id) {

    //  return $user->id == $receiver_id;
     return true;

},['guards' => $guards ]);

Broadcast::channel('chat-Doctor.{id}', function (Doctor $user, $id) {
    return (int) $user->id === (int) $id;
}, ['guards' => ['doctor']]);


