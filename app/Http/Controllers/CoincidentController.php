<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coincident;
use App\Http\Controllers\Controller;
use App\Helpers\ResponseHelper;

class CoincidentController extends Controller
{
    /**
     * Create new coincident
     */
    public function create(){
        return view('');
    }

    /**
     * Store a newly created coincident in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Coincident::validate($request->all());
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
        $coincident = Coincident::create($request->all());
        return redirect(route(''));
    }
    /**
     * Display the specified coincident
     *
     * @param  \App\Models\Coincident  $coincident
     * @return \Illuminate\Http\Response
     */
    public function show(Coincident $coincident)
    {   
        if($coincident == null){
            return redirect()->back()->withErrors(['The requested element does not exists']);
        }
        return view('', compact['coincident']);
    }
}
