<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use App\Models\User;

/**
 *
 */
class DashboardController extends Controller
{

  public function index(Post $posts, User $users){
    $posts = $posts->orderByRaw('updated_at DESC NULLS LAST')->take(5)->get();

    $users = $users->whereNotNull('last_login_at')->orderByRaw('last_login_at DESC NULLS LAST')->take(5)->get();

    return view('backend.dashboard', compact('posts', 'users'));
  }
}
