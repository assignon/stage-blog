<?php
require '../stageBlog/site/models/home.model.php';
class Users_ctrl
{

    private $user_data_check;
    private $home_model;
    function __construct()
    {

       $this->home_model = new Home_model();

    }

    /*
    *
      Function controllant si
      les donnees de l utlisateurs
      lui appartiennent et s il a entre
      sn non d util. et sn mdp avant de se connecter

    */
    public function verify_user_data()
    {

        if(isset($_SESSION['id']) AND $_SESSION['id'] == $_GET['id'])
        {

            $this->user_data_check = true;

        }else{

          $this->user_data_check = false;

        }

        return $this->user_data_check;

    }


    public function user_data()
    {

       $user_data = array('username'=>$_SESSION['username'], 'email'=>$_SESSION['email'], 'user_grade'=>$_SESSION['user_is_admin']);
       return $user_data;

    }


    public function display_blog()
    {

          $cur_user = $this->home_model->cur_user();
          //$blogs = $this->home_model->display_blogs();

          if($cur_user['user_is_admin'])
          {

             $this->home_model->display_publish_blog();
             $this->home_model->display_unpublish_blog();

          }else{

            $this->home_model->display_publish_blog();

          }


      }

}

 ?>
