<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use App\Models\Minutia;

class Coincident extends Model
{
    const relations = ['template', 'query', 'comparison'];
    protected $fillable = ['percentage', 'comparison_id'];

   
    public function minutias(){
        return $this->hasMany('App\Models\Minutia');
    }

    public function comparison(){
        return $this->belongsTo('App\Models\Comparison');
    }

    public static function createWithMinutae($data, $comparison_id) {
        $coincident = Coincident::create([
            'percentage' => $data->MatchingValue,
            'comparison_id' => $comparison_id
        ]);

        $minutia = $data->TemplateMtia;
        Minutia::create([
            'x' => $minutia->X,
            'y' => $minutia->Y,
            'angle' => $minutia->Angle,
            'coincident_id' => $coincident->id
        ]);

        $minutia = $data->QueryMtia;
        Minutia::create([
            'x' => $minutia->X,
            'y' => $minutia->Y,
            'angle' => $minutia->Angle,
            'coincident_id' => $coincident->id
        ]);
    }
}
