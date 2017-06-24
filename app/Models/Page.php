<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Kalnoy\Nestedset\NodeTrait;
use Log;

class Page extends Model
{
  use PresentableTrait, NodeTrait;

  protected $presenter = 'App\Presenters\PagePresenter';

    protected $fillable = [
      'title',
      'name',
      'uri',
      'content',
      'template',
    ];

    public function setNameAttribute($value)
    {
      Log::info($value);
      $this->attributes['name'] = empty($value) ? NULL : $value;
    }

    public function setTemplateAttribute($value)
    {
      Log::info($value);
      $this->attributes['template'] = empty($value) ? NULL : $value;
    }

    public function getPaddedTitle(){
      return $this->presenter()->paddedTitle;
    }
}
