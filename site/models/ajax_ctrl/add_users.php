<?php

require 'db_connect.php';
require 'send_mail.php';

$pdo = pdo();

$username = htmlentities(htmlspecialchars($_GET['userName']));
$email = htmlentities(htmlspecialchars($_GET['newUserEmail']));
$password = htmlentities(htmlspecialchars($_GET['temporaryPassword']));

$check_name_email = $pdo->prepare("SELECT username, email FROM users WHERE username=? AND email=?");
$check_name_email->execute(array($username, $email));

if($check_name_email->rowCount() == 0)
{

  $new_user = $pdo->prepare('INSERT INTO users(username, email, password, user_is_admin) VALUES(?,?,?,?)');
  $new_user->execute(array($username, $email, sha1($password), 0));

  send_mail(
    "U bent toegevoegd als gebruiker op mijn blog",
    "
    Onderin staan uw inlog gegevens en de link naar de blog"."<br/>
    Gebruikersnaam: ".$username."<br/>
    Wachtwoord: ".$password."<br/>
    Link: <br/>
    Ik adviseren u om uw wachtwoord zo snel mogelijk te wijzigen.<br/>
    Met vriendelijke groete,<br/>
    ",
    "Yanick Assignon",
    "21866@ma-web.nl",
    $email

  );

  echo 'New user is added';

}else{

   echo "This username or email already exist...";

}

 ?>
