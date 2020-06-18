<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'amount', 'message', 'streamer_id', 'donor_id','phone'
    ];

    public function donor()
    {
        return $this->belongsTo('App\Models\Donor', 'donor_id');
    }

    public function streamer()
    {
        return $this->belongsTo('App\User', 'streamer_id');
    }


}
