<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResumeController extends Controller
{
    function index() {
        return view('resume.index');
    }

    function contact() {
        return view('resume.contact');
    }

    function projects() {
        return view('resume.projects');
    }

    function resume() {
        return view('resume.resume');
    }
}
