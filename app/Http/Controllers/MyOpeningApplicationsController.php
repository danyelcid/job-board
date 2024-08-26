<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyOpeningApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('my-opening-applications.index',
        [
            'applications' => auth()->user()
                ->openingApplications()->with([
                    'opening' => fn($query) => $query
                        ->withCount('openingApplications')
                        ->withAvg('openingApplications', 'expected_salary'),
                    'opening.employer'])
                ->latest()
                ->get()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
