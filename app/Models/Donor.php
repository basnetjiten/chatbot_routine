<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'name', 'email', 'phone'
    ];


    public function hasTransaction()
    {
        return $this->hasOne('App\Models\Transaction', 'donor_id');
    }


}
