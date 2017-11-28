<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use App\Models\User;
use GrahamCampbell\Markdown\Facades\Markdown;

/**
 *
 */
class DashboardController extends Controller
{

  public function index(Post $posts, User $users){
    $posts = $posts->orderByRaw('updated_at DESC NULLS LAST')->take(5)->get();

    $users = $users->whereNotNull('last_login_at')->orderByRaw('last_login_at DESC NULLS LAST')->take(5)->get();
    foreach ($posts as $post) {
      $post['route'] = route('backend.blog.edit', $post->id);
      $post['excerpt'] = $post['excerpt'] ? Markdown::convertToHtml($post['excerpt']) : null;
      $post['body'] = $post['body'] ? Markdown::convertToHtml($post['body']) : null;
    }

    return view('backend.dashboard', compact('posts', 'users'));
  }
}
