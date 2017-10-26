<?php
namespace App\Templates;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\View\View;

/**
 *
 */
class BlogPostTemplate extends AbstractTemplate
{

  protected $view = 'blog.post';

  protected $posts;

  function __construct(Post $posts)
  {
    $this->posts = $posts;
  }

  public function prepare(View $view, array $parameters){
    $post = $this->posts->where('id', $parameters['id'])
                         ->where('slug', $parameters['slug'])
                         ->first();


    $view->with('post', $post);
  }
}
