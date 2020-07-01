<?php

namespace App;

use App\Models\Routine;
use Illuminate\Database\Eloquent\Model;

class MyRoutine extends Model
{
    protected $guarded = ['id'];

    public function routine(){

        return $this->belongsTo(Routine::class,'module_code');

    }
}
