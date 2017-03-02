<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

class FeedsController extends Controller
{
    public function feed()
    {
      $friends = Auth::user()->all();

      $feed = array();

      foreach ($friends as $friend):
        foreach($friend->posts as $post):
          array_push($feed, $post);
        endforeach;
      endforeach;

      foreach(Auth::user()->posts as $post):
        array_push($feed, $post);
      endforeach;

      usort($feed, function($p1, $p2) {
        return $p1->id < $p2->id;
      });

      return $feed;
    }
}
