<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comparison extends Model
{

    protected $fillable = ['template', 'image', 'hand', 'region', 'match', 'user_id'];

    static $rules = [
        'hand' => 'required|string',
        'region' => 'required|string',
        'template' => 'required|file|image|mimes:png|max:5120',
        'image' => 'required|file|image|mimes:png|max:5120'
    ];

    public function coincidents(){
        return $this->hasMany('App\Models\Coincident');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public static function validate($data) {
        return Validator::make($data, [
            'hand' => 'required',
            'region' => 'required'
        ]);
    }
}
