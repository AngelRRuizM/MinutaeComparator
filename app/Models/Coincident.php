<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Coincident extends Model
{
    const relations = ['template', 'query', 'comparison'];
    protected $fillable = ['percentage', 'type', 'comparison_id'];

   
    public function minutias(){
        return $this->hasMany('App\Models\Minutia');
    }

    public function comparison(){
        return $this->belongsTo('App\Models\Comparison');
    }

    public static function validate($data) {
        return Validator::make($data, [
            'percentage' => 'required|min:0|max:0',
            'comparison_id' => 'required|exists:comparison,id'
        ]);
    }
}
