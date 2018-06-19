<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use DB;

class Area extends Model{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'areas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nameare','area_id'];


    public function profesionals()
    {
        return $this->belongsToMany('Profesional');
    }

    public function childrenAreas()
    {
        return $this->hasMany('Account', 'act_parent', 'act_id');
    }

    public function allChildrenAccounts()
    {
        return $this->childrenAreas()->with('allChildrenAccounts');
    }

    public static function getAreas() {
        return DB::table('areas')
            ->whereNull('area_id')
            ->get();
    }

    public static function getSubAreas($area) {
        return DB::table('areas')->where('area_id', '=', $area)->get();
    }
}
