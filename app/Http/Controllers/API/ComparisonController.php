<?php

namespace App\Http\Controllers\API;

use App\Models\Comparison;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ResponseHelper; 

class ComparisonController extends Controller
{
    
    /**
     * Store a newly created event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Comparison::validate($request->all());
        if($validator->fails()){
            return ResponseHelper::validationErrorResponse($validator->errors());
        }
        $comparison = Comparison::create($request->all());
        return response()->json($comparison, 201);
    }
    /**
     * Display the specified compasrison
     *
     * @param  \App\Models\Comparison  $comparison
     * @return \Illuminate\Http\Response
     */
    public function show(Comparison $comparison)
    {   
        return response()->json(Comparison::with(['user', 'coincidents'])->get()->find($comparison->id), 200);
    }
}
