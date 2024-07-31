<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        if ($user->is_company) {
            $applications = Application::whereHas('vacancy', function ($query) use ($user) { // მოიძიე რას შვება ეს ლარაველის დოკუმეტაციაში
                $query->where('user_id', $user->id);
            })->with('vacancy', 'user')->get();
        } else {
            $applications = Application::where('user_id', $user->id)->get();
        }

        return view('applications.index', compact('applications'));
    }

    public function show(Application $application)
    {
        return view('applications.show', compact('application'));
    }


    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'vacancy_id' => 'required|exists:vacancies,id',
            'resume' => 'nullable|file',
        ]);

        // Store resume if provided
        $resumePath = $request->file('resume') ? $request->file('resume')->store('resumes', 'public') : null;

        // Create application
        Application::create([
            'vacancy_id' => $request->vacancy_id,
            'user_id' => Auth::id(), // Set the authenticated user's ID
            'status' => 'pending', // Default status
            'resume' => $resumePath,
        ]);

        return redirect()->back()->with('success', 'Application submitted successfully.');
    }
}
