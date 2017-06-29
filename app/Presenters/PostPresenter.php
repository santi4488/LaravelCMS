<?php

  namespace App\Presenters;

  use Laracasts\Presenter\Presenter;
  use App\Models\Page;
  use League\CommonMark\CommonMarkConverter;
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
      // Log::info(empty($this->excerpt));
      return (!empty($this->excerpt)) ? $this->markdown->convertToHtml($this->excerpt) : null;
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
