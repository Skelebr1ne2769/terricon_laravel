<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class TestController extends Controller
{
    public function show($id){
        return $id;
    }

    public function getAllSkillsJson(){
        $skills = Skill::all();

        return response()->json($skills);
    }

    public function getAllSkills(){
        $title = 'Навыки';

        $skills = Skill::all();

        return view('skills')
            ->with('title', $title)
            ->with('skills', $skills);
    }

    public function getSkillsCategory($category){
        $title = "Навыки в категории: $category";

        $skills = Skill::where('category', $category)->get();

        return view('skills')
            ->with('title', $title)
            ->with('skills', $skills);
    }
}
