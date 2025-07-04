<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class RayEmployee extends Authenticatable
{
    use HasFactory;
    public $fillable= ['email','name','email_verified_at','password'];

}
