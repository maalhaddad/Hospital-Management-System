<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class LaboratorieEmployee extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    public $fillable= ['email','name','email_verified_at','password'];

}
