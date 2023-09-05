<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    function index() {
        return view('courses.index');
    }

    function about() {
        return view('courses.about');
    }

    function blog() {
        return view('courses.blog');
    }

    function blog_details() {
        return view('courses.blog_details');
    }

    function contact() {
        return view('courses.contact');
    }

    function courses() {
        return view('courses.courses');
    }

    function login() {
        return view('courses.login');
    }

    function register() {
        return view('courses.register');
    }
}
