<?php

namespace App\Http\Controllers;

use App\Models\Opening;
use Illuminate\Http\Request;

class OpeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filters = request()->only('search', 'min_salary', 'max_salary', 'experience', 'category');

        return view('opening.index',
            ['openings' => Opening::with('employer')
                ->filter($filters)->get( ) ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Opening $opening)
    {
        return view('opening.show', [
            'opening' => $opening->load('employer.openings')
        ]);
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
