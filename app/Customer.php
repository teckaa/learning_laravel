<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phonenumber',
        'country',
        'created_datetime',
        'created_date',
        'created_time',
        'user_id'
    ];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = ucfirst($name);
    }

    public function getNameAttribute($name)
    {
        return ucwords($name);
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id')->withDefault([
            'user_id' => '2'
        ]);
    }
}
