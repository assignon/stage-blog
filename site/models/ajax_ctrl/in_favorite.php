<?php

require 'db_connect.php';

$pdo = pdo();
$blog_name = htmlentities(htmlspecialchars($_GET['blogName']));
$user_id = htmlentities(htmlspecialchars($_GET['userId']));

$get_blog_name = $pdo->prepare("SELECT * FROM favorites WHERE blog_title=?");
$get_blog_name->execute(array($blog_name));
$cur_blog_name_check = $get_blog_name->rowCount();

if($cur_blog_name_check == 0)
{

  $in_favo = $pdo->prepare("INSERT INTO favorites(blog_title, user_id) VALUES(?,?)");
  $in_favo->execute(array($blog_name, $user_id));

  $update_blog_favo = $pdo->prepare("UPDATE blog SET favo_img=? WHERE title=?");
  $update_blog_favo->execute(array('favorite.svg', $blog_name));

  echo $blog_name." is in de favorites toegevoegd.";

}else{

  echo "Deze blog staat al in uw favorite";

}

 ?>
