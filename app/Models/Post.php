<?php

namespace App\Models;

use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;
use Log;

class Post extends Model
{
  use PresentableTrait;
  protected $presenter = 'App\Presenters\PostPresenter';

    protected $fillable = [
      'author_id',
      'title',
      'slug',
      'body',
      'excerpt',
      'published_at',
    ];

    protected $dates = ['published_at'];

    public function setPublishedAtAttribute($value){
      $this->attributes['published_at'] = $value ?: null;
    }

    public function author(){
      return $this->belongsTo(User::class);
    }
}
