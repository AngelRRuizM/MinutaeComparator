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

    public static function validate($data) {
        return Validator::make($data, [
            'x' => 'required|min:0',
            'y' => 'required|min:0',
            'angle' => 'required|min:0',
            'coincident_id' => 'required|exists:coincident,id'
        ]);
    }
}
