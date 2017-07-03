<?php

  namespace App\Presenters;

  use Laracasts\Presenter\Presenter;
  use League\CommonMark\CommonMarkConverter;
  use GrahamCampbell\Markdown\Facades\Markdown;
  use Log;

  /**
   *
   */
  class PostPresenter extends Presenter
  {
    public function __contruct($object, CommonMarkConverter $markdown){
      $this->markdown = $markdown;

      parent::__contruct($object);
    }

    public function excerptHtml(){
      // $excerpt = $this->excerpt;
      return $this->excerpt ? Markdown::convertToHtml($this->excerpt) : null;

      // return (!isset($excerpt) || trim($excerpt) === '') ? null : Markdown::convertToHtml($excerpt);
    }

    public function bodyHtml(){
      return $this->body ? $this->markdown->convertToHtml($this->body) : null;
    }

    public function publishedDate(){
      if($this->published_at){
        return $this->published_at->toFormattedDateString();
      }

      return 'Not Published';
    }

    public function publishedHighlight(){
      if($this->published_at && $this->published_at->isFuture()){
        return 'info';
      }
      elseif (!$this->published_at){
        return 'warning';
      }
    }
  }
