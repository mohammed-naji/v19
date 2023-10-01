<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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

        if($request->has('q')) {
            $posts = Post::where('title', 'like', '%'.$request->q.'%')
            ->latest('id')
            ->paginate(10);
        }else {
            $posts = Post::latest('id')->paginate(10);
        }



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
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg',
            'body' => 'required'
        ]);

        // upload file
        $img = $request->file('image');
        $img_name = rand().time().$img->getClientOriginalName();
        $img->move(public_path('images'), $img_name);


        // Store in database
        // 1. using model object
        // $post = new Post();
        // $post->title = $request->title;
        // $post->image = $img_name;
        // $post->body = $request->body;
        // $post->save();


        // 2. using eloquent
        $data = $request->except('_token');
        $data['image'] = $img_name;

        $post = Post::create($data);


        // redirect to another page
        return redirect()
        ->route('posts.index')
        ->with('msg', 'Post added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $post = Post::find($id); // SELECT * FROM posts WHERE id = $id

        // dd($post);
        // if(!$post) {
        //     abort(404);
        //     // return redirect()->back();
        // }

        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validation
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg',
            'body' => 'required'
        ]);

        $post = Post::findOrFail($id);
        $data = $request->except('_token', 'image');

        if($request->hasFile('image')) {
            // upload file
            File::delete(public_path('images/'.$post->image));
            $img = $request->file('image');
            $img_name = rand().time().$img->getClientOriginalName();
            $img->move(public_path('images'), $img_name);
            $data['image'] = $img_name;
        }

        $post->update($data);


        // redirect to another page
        return redirect()
        ->route('posts.index')
        ->with('msg', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        // File::delete(public_path('images/'.$post->image));
        $post->delete();
        // Post::destroy($id);

        return redirect()
        ->route('posts.index')
        ->with('msg', 'Post deleted successfully');
    }

    function search_post(Request $request) {
        $posts = Post::where('title', 'like', '%'.$request->q.'%')
            ->latest('id')
            ->limit(8)
            ->get();

        return $posts;
    }

    function trash() {
        // $posts = Post::latest('id')->whereNotNull('deleted_at')->get();
        $posts = Post::onlyTrashed()->latest('id')->paginate(10);
        return view('posts.trash', compact('posts'));
    }

    function restore($id) {
        // $post = Post::onlyTrashed()->findOrFail($id)->update([
        //     'deleted_at' => null
        // ]);
        Post::onlyTrashed()->findOrFail($id)->restore();

        return redirect()
        ->route('posts.trash')
        ->with('msg', 'Post restored successfully');
    }

    function forcedelete($id) {
        $post = Post::onlyTrashed()->findOrFail($id);
        File::delete(public_path('images/'.$post->image));
        $post->forceDelete();

        return redirect()
        ->route('posts.trash')
        ->with('msg', 'Post deleted permanently successfully');
    }
}


// SELECT * FROM posts WHERE title like '%new%'

//

// class Person
// {
//     public $name;
// }

// $p = new Person();

// $p->name
