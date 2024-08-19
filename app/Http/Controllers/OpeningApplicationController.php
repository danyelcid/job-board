<?php

namespace App\Http\Controllers;

use App\Models\Opening;
use Illuminate\Http\Request;

class OpeningApplicationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Opening $opening)
    {
        return view('opening_application.create', compact('opening'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Opening $opening)
    {
        $opening->openingApplications()->create([
            'user_id' => auth()->id(),
            ...$request->validate([
                'expected_salary' => 'required| min:1| max:1000000'
            ]),
        ]);

        return redirect()->route('openings.show', $opening)
            ->with('success', 'Opening Application submitted successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
