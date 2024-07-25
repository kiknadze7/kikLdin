<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    /**
     * Show the main page with job data.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $vacancies = Vacancy::all(); // Modify this query as needed

        return view('welcome', compact('vacancies'));
    }
}
