<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'likes'])->paginate(5);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        if ($request->user()) {
            $this->validate($request, [
                'body' => 'required'
            ]);

            $request->user()->posts()->create([
                'body' => $request->body
            ]);

            return back();
        } else {
            return redirect('login');
        }
    }
}
