<?php

class controller
{

  public function __construct()
  {



  }


  protected function render($temp_name)
  {

      require "../stageBlog/site/views/".$temp_name.".php";

  }


  protected function include_ctrls()
  {

     $get_class_names = get_class_methods(new Routing());
     foreach ($get_class_names as $methods_name)
     {

        $ctrls_files = "../stageBlog/site/controllers/".$methods_name.".ctrl.php";
        if(file_exists($ctrls_files))
        {

           require $ctrls_files;

        }

     }

  }


  protected function files_path()
  {

      $path_arr = array(

        'main_path' => '../stageBlog/',
        'public' => '../stageBlog/public/',
        'js' => '../stageBlog/public/js/',
        'media' => '../stageBlog/public/media/',
        'styles' => '../stageBlog/public/styles/',
        'site' => '../stageBlog/site/',
        'controllers' => '../stageBlog/site/controllers/',
        'models' => '../stageBlog/site/models/',
        'core' => '../stageBlog/site/core/',
        'views' => '../stageBlog/site/views/',

      );

      return $path_arr;

  }

}

 ?>
