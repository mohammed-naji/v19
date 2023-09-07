<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    function form1() {
        return view('forms.form1');
    }

    function form1_data(Request $request) {
        // dd($request->all());
        // dd($request->except('_token'));
        // dd($request->only('name', 'age'));
        // dd($request->input('name));

        $name = $request->name;
        $email = $request->email;
        $age = $request->age;
        $gender = $request->input('gender', 'Male' );

        // return $gender;

        return "Welcome $name, your age is $age, your email is $email";
    }

    function form2() {
        return view('forms.form2');
    }

    function form2_data (Request $request) {
        // dd($request->all());

        $request->validate([
            'name' => 'required|min:4|max:20',
            // 'email' => 'required|email|ends_with:@gmail.com'
            'email' => ['required', 'email', 'ends_with:@gmail.com']
        ]);

        dd($request->all());

        $name = $request->name;
        $email = $request->email;

        return view('forms.form2_info', compact('name', 'email'));
    }
}
