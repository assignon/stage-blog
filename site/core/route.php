<?php
require "../stageBlog/site/controllers/routeController.php";
class Route
{

    public function __construct()
    {

        $this->routing();

    }


    public function routing()
    {

       $routeController = new Routing();

       if(isset($_GET['req']) AND $_GET['req'] != "")
       {

           $request = $_GET['req'];
           $page_name = $request;

           if($page_name == $request)
           {

              if(method_exists($routeController, $page_name))
              {

                  $routeController->$page_name();

              }else{

                  $routeController->page_not_found();

              }

           }

       }else if(!isset($_GET['req']))
       {

          $routeController->login();

       }

    }

}

 ?>
