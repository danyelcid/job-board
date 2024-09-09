<?php

namespace App\Http\Controllers;

use App\Models\Opening;
use Illuminate\Http\Request;

class MyOpeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('my_opening.index', [
            'openings' => auth()->user()->employer
                                ->openings()
                                ->with(['employer', 'openingApplications', 'openingApplications.user'])
                                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('my_opening.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|min:5000',
            'description' => 'required|string',
            'experience' => 'required|in:'. implode(',', Opening::$experience),
            'category' => 'required|in:'. implode(',', Opening::$category),
        ]);

        auth()->user()->employer->openings()->create($validatedData);

        return redirect()->route('my_openings.index')
            ->with('success', 'You have successfully created a job opening.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
