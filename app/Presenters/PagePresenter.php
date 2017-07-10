<?php

  namespace App\Presenters;

  use Laracasts\Presenter\Presenter;
  use App\Models\Page;
  use GrahamCampbell\Markdown\Facades\Markdown;
  use Log;

  /**
   *
   */
  class PagePresenter extends Presenter
  {
    public function prettyUri(){
      return '/' . ltrim($this->uri, '/');
    }

    public function linkToPaddedTitle($link){
      $depth = Page::withDepth()->find($this->id)->depth;
      $padding = str_repeat('&nbsp;', $depth * 4);

      return $padding . link_to($link, $this->title);
    }

    public function paddedTitle(){
      $depth = Page::withDepth()->find($this->id)->depth;
      return str_repeat('&nbsp;', $depth * 4) . $this->title;
    }

    public function uriWildcard(){
      return $this->uri . '*';
    }

    public function contentHtml(){
      return Markdown::convertToHtml($this->content);
    }
  }
