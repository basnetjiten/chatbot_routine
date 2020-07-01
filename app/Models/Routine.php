<?php

namespace App\Models;

use App\MyRoutine;
use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'day', 'time', 'class_type', 'module_code','module_title',
        'lecturer','group','block','room'
    ];


    public function iroutine()
    {

        return $this->hasOne(MyRoutine::class,'routine_code');

    }

}
