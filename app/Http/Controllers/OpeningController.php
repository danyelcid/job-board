<?php

namespace App\Http\Controllers;

use App\Models\Opening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OpeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Opening::class);
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
        Gate::authorize('view', $opening);
        return view('opening.show', [
            'opening' => $opening->load('employer.openings')
        ]);
    }

}
