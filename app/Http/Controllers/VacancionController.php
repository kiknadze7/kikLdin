<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckIfCompany;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancionController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckIfCompany::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index($vacancy)
    {
        $vacancions = Vacancy::all();
        return view('vacancion.index', compact('vacancions'));
    }

    public function create()
    {
        return view('vacancion.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'boolean|nullable',
            'is_resume_required' => 'boolean|nullable',
            'start_date' => 'date',
            'end_date' => 'date',
        ]);
        //  // change model to Vacancy->create 
        $vacancion = new Vacancy();
        $vacancion->user_id = Auth::id(); // Get the authenticated user's ID
        $vacancion->title = $request->title;
        $vacancion->description = $request->description;
        $vacancion->is_active = $request->is_active ?? true;
        $vacancion->start_date = $request->start_date;
        $vacancion->is_resume_required = $request->is_resume_required ?? true;
        $vacancion->end_date = $request->end_date;
        $vacancion->save();

        return redirect()->route('home')->with('success', 'Vacancion created successfully.');
    }

    public function show(Vacancy $vacancy)
    {
        return view('vacancion.show', compact('vacancy'));
    }


    public function edit(Vacancy $vacancy)
    {
        return view('vacancion.edit', compact('vacancy'));
    }

    public function update(Request $request, Vacancy $vacancion)
    {
        if (Auth::id() !== $vacancion->user_id) {
            return redirect()->route('vacancion.index')->with('error', 'You do not have permission to update this vacancy.');
        }
        // dd($request->all());
        // die();

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'is_active' => 'nullable',
            'is_resume_required' => 'nullable',
        ]);


        // შეცვალე მოდელის Vacancy->update ით
        $vacancion->title = $request->title;
        $vacancion->description = $request->description;
        $vacancion->is_active = $request->has('is_active');
        $vacancion->start_date = $request->start_date;
        $vacancion->is_resume_required = $request->has('is_resume_required');
        $vacancion->end_date = $request->end_date;
        $vacancion->save();

        return redirect()->route('welcome')->with('success', 'Vacancy updated successfully.');
    }

    public function destroy(Vacancy $vacancion)
    {
        $vacancion->delete();
        return redirect()->route('vacancion.index')->with('success', 'Vacancion deleted successfully.');
    }
}
