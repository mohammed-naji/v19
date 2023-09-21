<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $sql = "SELECT * FROM posts";
        // $res = mysqli_query($conn, $sql);
        // while($row = mysqli_fetch_assoc($res)) {

        // }
        // $posts = Post::all();
        // $posts = Post::paginate(10);
        // $posts = Post::orderBy('id', 'DESC')->get();
        // $posts = Post::orderBy('id', 'DESC')->simplepaginate();
        // $posts = Post::orderBy('updated_at', 'DESC')->paginate();
        $posts = Post::latest('id')->paginate();

        // $page = 1;
        // $offset = ($page - 1) * 10
        // SELECT * FROM posts LIMIT 10 OFFSET 40

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);

        if(!$post) {
            // abort(404);
            return redirect()->back();
        }

        // $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
