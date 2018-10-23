<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Coincident;
use App\Http\Controllers\Controller;
use App\Helpers\ResponseHelper;

class CoincidentController extends Controller
{
    /**
     * Store a newly created event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Coincident::validate($request->all());
        if($validator->fails()){
            return ResponseHelper::validationErrorResponse($validator->errors());
        }
        $coincident = Coincident::create($request->all());
        return response()->json($coincident, 201);
    }
    /**
     * Display the specified coincident
     *
     * @param  \App\Models\Coincident  $coincident
     * @return \Illuminate\Http\Response
     */
    public function show(Coincident $coincident)
    {   
        return response()->json(Coincident::with(['minutias', 'comparison'])->get()->find($coincident->id), 200);
    }
}
