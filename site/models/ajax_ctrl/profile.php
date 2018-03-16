<?php

require "db_connect.php";

$pdo = pdo();
$user_id = intval($_GET['userId']);

$get_user_data = $pdo->prepare("SELECT * FROM users WHERE id=?");
$get_user_data->execute(array($user_id));

$user_data = $get_user_data->fetch();

require "../../views/baseTemplates/user_profile.temp.php";
 ?>
