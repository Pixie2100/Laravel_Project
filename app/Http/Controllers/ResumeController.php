<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\Objective;
use App\Models\Education;
use App\Models\Employment;
use App\Models\Skill;
use App\Models\Reference;

class ResumeController extends Controller
{
    public function show()
    {
        $information = Information::first();
        $objective = Objective::first();
        $education = Education::all();
        $employment = Employment::all();
        $skills = Skill::all();
        $references = Reference::all();

        return view('resume.show', compact('information', 'objective', 'education', 'employment', 'skills', 'references'));
    }
}
