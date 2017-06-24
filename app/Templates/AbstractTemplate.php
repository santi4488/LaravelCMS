<?php
namespace App\Templates;

/**
 *
 */
abstract class AbstractTemplate
{

  protected $view;

  function __construct(argument)
  {
    # code...
  }

  abstract public function prepare(View $view, array $parameters);

  public function getView(){
    return $this->view;
  }

  
}

 ?>
