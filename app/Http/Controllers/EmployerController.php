<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EmployerController extends Controller
{

    public function create()
    {
        Gate::authorize('create', Employer::class);

        return view('employer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

}
