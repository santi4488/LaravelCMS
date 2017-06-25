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

    public function getPaddedTitleAttribute(){
      $depth = Page::withDepth()->find($this->id)->depth;
      return str_repeat('&nbsp;', $depth * 4) . $this->title;
    }

    public function updateOrder($order, $orderPage){
      $orderPage = $this->findOrFail($orderPage);
      if($order == 'before'){
        $this->insertBeforeNode($orderPage);
      }
      elseif($order == 'after'){
        $this->insertAfterNode($orderPage);
      }
      elseif ($order == 'childOf') {
        $this->appendToNode($orderPage)->save();
      }
      Log::info($this);
      return $this->hasMoved();
    }
}
