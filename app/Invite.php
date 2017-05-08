<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $fillable = [
       'email','project','manager','title','body','state',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
    
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function users()
    {
        return $this->belongsTo('App\User','email','email');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */
    public function getManagerAttribute($value)
    {
        return ucfirst(\App\User::find($value)->name);
    }

    public function getProjectAttribute($value)
    {
        return ucfirst(\App\Project::find($value)->title);
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

}
