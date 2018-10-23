<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Minutia;
use App\Http\Controllers\Controller;
use App\Helpers\ResponseHelper;

class MinutiaController extends Controller
{
    /**
     * Store a newly created event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Minutia::validate($request->all());
        if($validator->fails()){
            return ResponseHelper::validationErrorResponse($validator->errors());
        }
        $minutia = Minutia::create($request->all());
        return response()->json($minutia, 201);
    }
    /**
     * Display the specified minutia
     *
     * @param  \App\Models\Minutia  $minutia
     * @return \Illuminate\Http\Response
     */
    public function show(Minutia $minutia)
    {   
        return response()->json(Minutia::with(['coincident'])->get()->find($minutia->id), 200);
    }
}
