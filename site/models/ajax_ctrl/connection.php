<?php
session_start();
  require "db_connect.php";

    $pdo = pdo();

    if(isset($_GET['username']) AND isset($_GET['password']))
    {

      $username = htmlentities(htmlspecialchars($_GET['username']));
      $password = sha1($_GET['password']);

      $check_loginData = $pdo->prepare("SELECT * FROM users WHERE username=? AND password = ?");
      $check_loginData->execute(array($username, $password));

      $get_user_data = $check_loginData->fetch();

      $user_exist = $check_loginData->rowCount();

      if($user_exist > 0)
      {

         $_SESSION['id'] = $get_user_data['id'];
         $_SESSION['username'] = $get_user_data['username'];
         $_SESSION['password'] = $get_user_data['password'];
         $_SESSION['email'] = $get_user_data['email'];
         $_SESSION['user_is_admin'] = $get_user_data['user_is_admin'];
        // header('Location: ../../../index.php?req=home&id='.$_SESSION['id']);

         $current_user_data = array('logged'=>true, 'session'=>$_SESSION['id']);

        // echo "Vous ete connecte";
         echo json_encode($current_user_data);

      }else{

         echo "Gebruikersnaam of wachtwoord onjust..!";

      }

    }



 ?>
