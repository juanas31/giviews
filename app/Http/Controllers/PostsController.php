<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;

class PostsController extends Controller
{
    public function store(Request $request)
    {
      return Post::create([
        'user_id' => Auth::id(),
        'content' => $request->content
      ]);
    }
}
