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

    public static function validate($data) {
        return Validator::make($data, [
            'template' => 'required|max:500',
            'image' => 'required|max:500',
            'hand' => 'required',
            'region' => 'required',
            'match' => 'required',
            'user_id' => 'required|exists:user,id'
        ]);
    }
}
