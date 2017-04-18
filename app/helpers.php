<?php

if(! function_exists('theme')){
  function theme($path){
    $config = config('cms.theme');

    return url($config['folder'] . '/' . $config['active'] . '/assets' . $path);
  }
}
