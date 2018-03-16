<?php
/**
 *
 */
class Login_ctrl
{

  function __construct()
  {



  }


  public function connection()
  {

     if(isset($_GET['username']) AND isset($_GET['password']))
     {

       $username = htmlentities(htmlspecialchars($_GET['username']));
       $password = sha1($_GET['password']);

       echo $password;

     }


  }

}


 ?>
