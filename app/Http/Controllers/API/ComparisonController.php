<?php

namespace App\Http\Controllers\API;

use App\Models\Comparison;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ResponseHelper; 

class ComparisonController extends Controller
{
    /**
     * Create new comparison
     */
    public function create(){
        return view('');
    }
    
    /**
     * Store a newly created comparison in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Comparison::validate($request->all());
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
        $comparison = Comparison::create($request->all());
        return redirect(route(''));
    }
    /**
     * Display the specified compasrison
     *
     * @param  \App\Models\Comparison  $comparison
     * @return \Illuminate\Http\Response
     */
    public function show(Comparison $comparison)
    {   
        if($comparison == null){
            return redirect()->back()->withErrors(['The requested element does not exists']);
        }
        return view('', compact['comparison']);
    }
}
