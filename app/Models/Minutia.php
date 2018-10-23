<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Minutia extends Model
{
    const relations = ['coincident'];
    protected $fillable = ['x', 'y', 'angle', 'coincident_id'];

    public function coincident(){
        return $this->belongsTo('App\Models\Coincident');
    }
}
