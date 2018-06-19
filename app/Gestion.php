<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    // use Notifiable;
    protected $table = "gestions";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'start_date', 'end_date', 'name_gestion'];
}
