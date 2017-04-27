<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Log;

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

    public function setNameAttribute($value)
    {
      Log::info($value);
      $this->attributes['name'] = empty($value) ? $value : NULL;
    }
}
