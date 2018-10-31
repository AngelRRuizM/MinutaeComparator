<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Minutia;
use App\Http\Controllers\Controller;
use App\Helpers\ResponseHelper;

class MinutiaController extends Controller
{
    /**
     * Create new comparison
     */
    public function create(){
        return view('');
    }

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
            return redirect()->back()->withErrors($validator->errors());
        }
        $minutia = Minutia::create($request->all());
        return redirect(route(''));
    }
    /**
     * Display the specified minutia
     *
     * @param  \App\Models\Minutia  $minutia
     * @return \Illuminate\Http\Response
     */
    public function show(Minutia $minutia)
    {   
        if($minutia == null){
            return redirect()->back()->withErrors(['The requested element does not exists']);
        }
        return view('', compact['minutia']);
    }
}
