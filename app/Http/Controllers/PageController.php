<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function show(Page $page, array $parameters){
      return view('page', compact('page'));
    }
}
