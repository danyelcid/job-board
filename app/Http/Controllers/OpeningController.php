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
            ['openings' => Opening::with('employer')->latest()
                ->filter($filters)->get( ) ]);
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

}
