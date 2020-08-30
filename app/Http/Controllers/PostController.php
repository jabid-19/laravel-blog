<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $posts = Post::with(['category'=>function($query){
//            $query->select('id', 'name');
//        }])->orderBy('id', 'desc')->get();

//        $posts = Post::with('category')->orderBy('id', 'desc')->get();

//        $posts = Post::with('category:id,name')->orderBy('id', 'desc')->get();

        $user = Auth::user();
        $user->load('posts');
        $posts = $user->posts;

//        dd($posts);

//        return view('admin.post.index', compact('posts'));

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Category::all();
        return view('admin.post.create', compact('categories', 'posts','tags'))->with('status', 'Created');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
            'title' => 'required|max:255',
            'image' => 'mimes:png|max:400',

        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension(); //getting the extension
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $data['image'] = $name;
        }

        $data['user_id'] = auth()->user()->id;

        Post::create($data);
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
//        $this->validate($request, [
//            'name' => 'required|max:255'
//        ]);
//
//        $post->update($request->all());
//        return redirect('/posts')->with('status', 'Updated');

        $this->validate($request, ['title' => 'required']);
        $data = $request->all();


        if ($request->has('image')) {

            $file_path = public_path('/images/' . $post->image);

            unlink($file_path);

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); //getting file extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/', $filename);
            $data['image'] = $filename;
        }


        $post->update($data);
        return redirect('/posts')->with('status', "Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts')->with('status', 'Deleted');
    }
}
