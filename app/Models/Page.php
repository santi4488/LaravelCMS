<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Page extends Model
{
  use PresentableTrait;

  protected $presenter = 'App\Presenters\PagePresenter';

    protected $fillable = [
      'title',
      'name',
      'uri',
      'content',
    ];


}
