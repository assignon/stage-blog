<?php
session_start();
   require '../stageBlog/site/core/controller.php';
   require '../stageBlog/site/libs/includes.php';
   class Routing extends Controller
   {

     public function __construct()
     {



     }


     public function login()
     {

         $login_ctrl = new Login_ctrl();
         $paths = $this->files_path();

         require "../stageBlog/site/views/login.temp.php";

     }


     public function home()
     {

        $users_ctrl = new Users_ctrl();
        if($users_ctrl->verify_user_data())
        {

            $paths = $this->files_path();
            $user_data = $users_ctrl->user_data();

            require "../stageBlog/site/views/home.temp.php";

        }else{

           $this->login();

        }


     }


     public function blog()
     {

        echo "vs etes sur la page blog...!";

     }


     public function log_out()
     {

       require "../stageBlog/site/views/log_out.php";

     }


     public function page_not_found()
     {

         echo "Page don't exist";

     }


   }

 ?>
