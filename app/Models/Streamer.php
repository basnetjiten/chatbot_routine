<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Streamer extends Model
{
    protected $guarded = ['id'];

    public function donor()
    {
        return $this->hasOne('App\Models\Donors', 'donor_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


}
