<?php

namespace App\Http\Controllers\API;

use App\Models\Comparison;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ResponseHelper; 

class ComparisonController extends Controller
{
    /**
     * Returns a list of comparizons
     */
    public function index() {
        return view('comparisons.list');
    }

    /**
     * Create new comparison
     */
    public function create(){
        return view('comparisons.create');
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
        
        return redirect(route('comparisons.show', $comparison->id));
    }
    /**
     * Display the specified compasrison
     *
     * @param  \App\Models\Comparison  $comparison
     * @return \Illuminate\Http\Response
     */
    public function show(Comparison $comparison)
    {
        return view('comparisons.show', compact('comparison'));
    }
}
