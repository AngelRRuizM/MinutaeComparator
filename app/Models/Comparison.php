<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comparison extends Model
{

    protected $fillable = ['template', 'image', 'hand', 'region', 'match', 'uder_id'];

    public function coincidents(){
        return $this->hasMany('App\Models\Coincident');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
