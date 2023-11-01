<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    public function create()
    {
        return view('grade_create');
    }

    public function store(Request $request)
    {
    Grade::create($request->all());
    return redirect('/grade_create');
    }
}
