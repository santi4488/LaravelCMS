<?php

namespace App\Http\Controllers\Backend;

/**
 *
 */
class DashboardController extends Controller
{

  function __construct(argument)
  {
    # code...
  }

  public function index(){
    return view('backend.dashboard');
  }
}
