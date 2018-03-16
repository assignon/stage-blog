<?php

require "db_connect.php";

$pdo = pdo();
$user_id = intval($_GET['userId']);
$username = htmlentities(htmlspecialchars($_GET['username']));
$email = htmlentities(htmlspecialchars($_GET['email']));
$npassword = $_GET['npassword'];
$password = $_GET['password'];

if($password !== "")
{

    $get_password = $pdo->prepare('SELECT password, username FROM users WHERE password=?');
    $get_password->execute(array(sha1($password)));
    $check_password = $get_password->fetch();

    if(!empty($username))
    {

        if(sha1($password) == $check_password['password'])
        {

          if($get_password->rowCount() == 0)
          {

            $update_username = $pdo->prepare("UPDATE users SET username=? WHERE id=? AND password=?");
            $update_username->execute(array($username, $user_id, sha1($password)));

            echo "Gebruikersnaam aangepast...";

          }else{

            echo 'Deze gebruikersnaam bestaat al...';

          }

        }else{

          echo 'Wachtwoord onjuist';

        }

    }


    if(!empty($email) AND sha1($password) == $check_password['password'])
    {

        if(sha1($password) == $check_password['password'])
        {

          $update_email = $pdo->prepare("UPDATE users SET email=? WHERE id=? AND password=?");
          $update_email->execute(array($email, $user_id, sha1($password)));

          echo "Email aangepast...";

        }else{

          echo 'Wachtwoord onjuist';

        }

    }


    if(!empty($npassword) AND sha1($password) == $check_password['password'])
    {

        if(sha1($password) == $check_password['password'])
        {

          $update_npassword = $pdo->prepare("UPDATE users SET password=? WHERE id=? AND password=?");
          $update_npassword->execute(array(sha1($npassword), $user_id, sha1($password)));

          echo "Wachtwoord aangepast...";

        }else{

          echo 'Wachtwoord onjuist';

        }

    }

}else{

  echo "Geef je huidige wachtwoord aan...";

}


 ?>
