<?php

use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// use , namespace

// Route::get('url', 'action');
// Route::post('url', 'action');
// Route::put('url', 'action');
// Route::patch('url', 'action');
// Route::delete('url', 'action');

// Route::get('', function() {
//     return 'Homepage';
// });

//


// $c = new Car();

// $c->getName();


// // home , about , contact
// Route::get('/', function() {
//     // mohamednaji.com/about
//     // $url = url('/about');
//     $url = route('about');
//     return '<a href="'.$url.'">About Us</a>';
// });

// Route::get('/about-us', function() {
//     return 'About Page';
// })->name('about');

// Route::get('/contact', function() {
//     return 'Contact Page';
// });

// http://127.0.0.1:8000/

// Route::get('/user/{name}/{age}', function($name, $age) {
//     return 'Welcome ' . $name . ', age is ' . $age;
// })
// // ->where('name', '[a-mA-M]+');
// ->whereAlpha('name')->whereNumber('age');



// class Person {

//     function getName() {
//         // return 'ddd';
//         return $this;
//     }

//     function getAge() {
//         // return 'eee';
//         return $this;
//     }

// }
// $p = new Person();
// $p->getName()->getAge();

// https://bakkah.com/sessions/agileshift
// https://bakkah.com/sessions/ecba
// https://bakkah.com/sessions/ecba/class-room
// https://bakkah.com/sessions/ecba/self-study

// Route::get('/sessions/{course}/{type?}', function($course, $type = 'live-online') {
//     return "Course : $course, Type : $type";
// });

// Route::match(['put', 'patch'], '/edit', function() {
//     return 'Edit page';
// });

// Route::any('/test', function() {
//     return 'test';
// })->name('test_route');

// Route::view('/welcome', 'welcome');
// Route::get('/welcome', function() {
//     return view('welcome');
// });

// Route::redirect('/', '/about');

//

// domain => mohamednaji.com
// subdomian => new.mohamednaji.com
// subdirectory => mohamednaji.com/new

// Route::get('calc/{n1}/{n2}/{op}', [TestController::class, 'calc']);


// index , about , contact , services
Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
Route::get('/services', [MainController::class, 'services'])->name('services');
Route::get('/post/{id?}', [MainController::class, 'post'])->name('post');

Route::get('export', ExportController::class);

Route::get('/user/{name}/{age}', [UserController::class, 'user']);




Route::prefix('personal')->name('personal.')->group(function() {
    Route::get('/', [ResumeController::class, 'index'])->name('index');
    Route::get('/contact', [ResumeController::class, 'contact'])->name('contact');
    Route::get('/projects', [ResumeController::class, 'projects'])->name('projects');
    Route::get('/resume', [ResumeController::class, 'resume'])->name('resume');
});


Route::prefix('coffee')->name('coffee.')->group(function() {
    Route::get('/', [CoffeeController::class, 'index'])->name('index');
    Route::get('/about', [CoffeeController::class, 'about'])->name('about');
    Route::get('/products', [CoffeeController::class, 'products'])->name('products');
    Route::get('/store', [CoffeeController::class, 'store'])->name('store');
});

Route::prefix('courses')->name('courses.')->group(function() {

    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::get('/about', [CourseController::class, 'about'])->name('about');
    Route::get('/blog', [CourseController::class, 'blog'])->name('blog');
    Route::get('/blog_details', [CourseController::class, 'blog_details'])->name('blog_details');
    Route::get('/contact', [CourseController::class, 'contact'])->name('contact');
    Route::get('/courses', [CourseController::class, 'courses'])->name('courses');
    Route::get('/login', [CourseController::class, 'login'])->name('login');
    Route::get('/register', [CourseController::class, 'register'])->name('register');

});


Route::get('form1', [FormController::class, 'form1'])->name('form1');
Route::post('form1', [FormController::class, 'form1_data']);

Route::get('form2', [FormController::class, 'form2'])->name('form2');
Route::post('form2', [FormController::class, 'form2_data'])->name('form2_data');

Route::get('form3', [FormController::class, 'form3'])->name('form3');
Route::post('form3', [FormController::class, 'form3_data'])->name('form3_data');

Route::get('form4', [FormController::class, 'form4'])->name('form4');
Route::post('form4', [FormController::class, 'form4_data'])->name('form4_data');

Route::get('contact', [FormController::class, 'contact'])->name('contact');
Route::post('contact', [FormController::class, 'contact_data'])->name('contact_data');


//

// CRUD routes for posts
// Route::get('posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::post('posts', [PostController::class, 'store'])->name('posts.store');

// Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::match(['put', 'patch'],'posts/{post}', [PostController::class, 'update'])->name('posts.update');

// Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::resource('posts', PostController::class);
Route::get('search-post', [PostController::class, 'search_post'])->name('search_post');
//
