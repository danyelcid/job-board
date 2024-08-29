<?php

namespace App\Http\Controllers;

use App\Models\Opening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OpeningApplicationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Opening $opening)
    {
        Gate::authorize('apply', $opening);

        return view('opening_application.create', compact('opening'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Opening $opening)
    {
        Gate::authorize('apply', $opening);

        $validatedData = $request->validate([
            'expected_salary' => 'required| min:1| max:1000000',
            'cv'=> 'required|file|mimes:pdf,docx,doc|max:2048',
        ]);

        $file = $request->file('cv');
        $path = $file->store('cvs', 'private');

        $opening->openingApplications()->create([
            'user_id' => auth()->id(),
            'expected_salary' => $validatedData['expected_salary'],
            'cv_path' => $path,
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
