<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\TestMail;
use App\Rules\WordCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    function form3() {
        return view('forms.form3');
    }

    function form3_data(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|ends_with:@gmail.com,@hotmail.com',
            'password' => 'required|min:8|confirmed',
            'dob' => 'required|before:'.now()->subYears(18),
            'gender' => 'required',
            'education_level' => 'required',
            'hobbies' => 'required',
            'bio' => ['required', new WordCount(20)],
        ]);

        dd($request->all());
    }

    function form4() {
        return view('forms.form4');
    }

    function form4_data(Request $request) {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,gif|max:512'
        ]
        // , [
        //     'name.required' => ' اخوي الاسم مطلوب الله يجوزك ',
        //     'mimes' => 'هذا الامتداد غير مدعوم'
        // ]
    );
        // dd($request->all());

        // public_path('images') => c:\wamp64\www\v19\public\images
        // asset('images') => https://127.0.0.1/images

        // $img_name = $_FILES['image']['name'];

        // dd($_FILES['image']['name']);

        // zina.png => 64646496564987zina.png

        $img_name = rand() . time() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $img_name);
        // move_uploaded_file('tmp', 'images');

        return view('forms.form4_image', compact('img_name'));
    }

    function contact() {
        return view('forms.contact');
    }

    function contact_data(Request $request) {
        // dd($request->all());
        $request->validate([
            "name" => "required",
            "email" => "required",
            "phone" => "required",
            "subject" => "required",
            "message" => "required",
        ]);

        $data = $request->except('_token');
        // Mail::to('admin@gmail.com')->send(new TestMail());
        Mail::to('maramhania29@gmail.com')->send(new ContactMail($data));
    }
}


//
