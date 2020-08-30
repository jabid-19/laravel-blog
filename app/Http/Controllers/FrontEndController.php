<?php

namespace App\Http\Controllers;

use App\Post;
use App\Forum;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */

    /**
     * Front home page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::with('user:id,name')->latest()->paginate(8);

        return view('welcome', compact('posts'));
    }

    public function publicForum()
    {
        $forums = Forum::with('user:id,name')->latest()->paginate(8);

        return view('forum', compact('forums'));
    }

    /**
     *
     *
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSinglePost(Post $post)
    {
//        $post->load('comments', 'comments.user');
        $post->load('comments');
//        dd($post);
        return view('single-post', compact('post'));
    }

    public function getSingleForum(Forum $forum)
    {
//        $post->load('comments', 'comments.user');
        $forum->load('comments');
//        dd($post);
        return view('single-forum', compact('forum'));
    }

}
