<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auxi extends Model
{
    protected $table='auxis';

    protected $fillable = ['name', 'email', 'password','surname','phone', 'user_id'];
}
