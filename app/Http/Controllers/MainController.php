<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class MainController extends Controller
{
    function index() {
        $name = 'Mohammed';
        $age = 29;

        // return view('index')->with('name', $name)->with('age', $age);
        // return view('index', [
        //     'name' => $name,
        //     'age' => $age
        // ]);
        return view('index', compact('name', 'age'));
    }

    function about() {
        return 'about page';
    }

    function contact() {
        return 'contact page';
    }

    function services() {
        $services = [
            [1, 'Service Name 1', 100],
            [2, 'Service Name 2', 52],
            [3, 'Service Name 3', 150],
            [4, 'Service Name 4', 35],
        ];

        return view('services', compact('services'));
    }

    function post($id = null) {
        return $id;
    }
}


// user/name/age

// welcome $name
// your age in months 202

//
