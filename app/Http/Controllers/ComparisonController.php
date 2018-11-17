<?php

namespace App\Http\Controllers;

use App\Models\Comparison;
use App\Models\Coincident;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ResponseHelper; 
use Illuminate\Support\Facades\Auth;
use JavaScript;

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

        $template = str_replace('public', 'storage', $request->template->store('public/images'));
        $query = str_replace('public', 'storage', $request->image->store('public/images'));
        
        exec('bin\Comparator2.exe '.$template.' '.$query, $output);
        if(sizeof($output) < 1) {
            return redirect()->back()->withErrors(['error', 'No fue posible analizar las imágenes.']);
        }

        $result = json_decode($output[0]);

        $comparison = Comparison::create([
            'template' => $template,
            'image' => $query,
            'hand' => $request->hand,
            'region' => $request->region,
            'match' => $result->Item1,
            'user_id' => Auth::user()->id,
        ]);

        foreach($result->Item2 as $coincident) {
            Coincident::createWithMinutae($coincident, $comparison->id);
        }
        
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
        JavaScript::put([
            'coincidents' => $comparison->coincidents()->with('minutias')->get(),
            'templateImg' => asset($comparison->template),
            'queryImg' => asset($comparison->image)
        ]);

        // dd(getimagesize($comparison->template));
        // dd(getimagesize($comparison->image));

        return view('comparisons.show', compact('comparison'));
    }
}
