<?php

  namespace App\Presenters;

  use Laracasts\Presenter\Presenter;
  use Log;

  /**
   *
   */
  class UserPresenter extends Presenter
  {
    public function lastLoginDifference(){

      return $this->last_login_at->diffForHumans();
    }
  }
