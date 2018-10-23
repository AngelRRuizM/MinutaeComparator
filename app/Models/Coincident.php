<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coincident extends Model
{
    const relations = ['template', 'query', 'comparison'];
    protected $fillable = ['percentage', 'minutia1_id', 'minutia2_id', 'comparison_id'];

   
    public function minutias(){
        return $this->hasMany('App\Models\Minutia');
    }

    public function comparison(){
        return $this->belongsTo('App\Models\Comparison');
    }
}
