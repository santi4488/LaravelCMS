<?php

namespace App\View\Composers;

use App\Models\Page;
use Illuminate\View\View;
use Log;

/**
 *
 */
class InjectPages
{
  protected $pages;

  function __construct(Page $pages)
  {
    $this->pages = $pages;
  }

  public function compose(View $view){
    $pages = $this->pages->defaultOrder()->where('hidden', false)->get()->toTree();
    $view->with('pages', $pages);
  }
}


 ?>
