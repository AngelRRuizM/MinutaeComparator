<?php

namespace App\Http\Controllers;

use App\Models\Comparison;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ResponseHelper; 
use Illuminate\Support\Facades\Auth;

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
        $this->validate($request, Comparison::$rules);

        $template = $request->template->store('/images');
        $query = $request->template->store('/images');

        $comparison = Comparison::create([
            'template' => $template,
            'image' => $query,
            'hand' => $request->hand,
            'region' => $request->region,
            'match' => true,
            'user_id' => Auth::user()->id,
        ]);
        
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
