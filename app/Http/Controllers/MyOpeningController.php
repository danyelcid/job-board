<?php

namespace App\Http\Controllers;

use App\Http\Requests\OpeningRequest;
use App\Models\Opening;
use Illuminate\Support\Facades\Gate;

class MyOpeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAnyEmployer', Opening::class);

        return view('my_opening.index', [
            'openings' => auth()->user()->employer
                                ->openings()
                                ->with(['employer', 'openingApplications', 'openingApplications.user'])
                                ->withTrashed()
                                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Opening::class);
       return view('my_opening.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OpeningRequest $request)
    {
        auth()->user()->employer->openings()->create($request->validated());

        return redirect()->route('my_openings.index')
            ->with('success', 'You have successfully created a job opening.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Opening $myOpening)
    {
        Gate::authorize('update', $myOpening);
        return view('my_opening.edit', ['opening' => $myOpening]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OpeningRequest $request, Opening $myOpening)
    {
        Gate::authorize('update', $myOpening);
        $myOpening->update($request->validated());

        return redirect()->route('my_openings.index')
            ->with('success', 'You have successfully updated the opening: ' .$myOpening->title . '.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Opening $myOpening)
    {
        $myOpening->delete();
        return redirect()->route('my_openings.index')
            ->with('success', 'You have deleted the opening.');
    }
}
