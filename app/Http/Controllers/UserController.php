<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function user($name, $age) {
        return view('user', compact('name', 'age'));
    }
}
