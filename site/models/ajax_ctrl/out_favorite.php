<?php

require 'db_connect.php';

$pdo = pdo();
$blog_name = htmlentities(htmlspecialchars($_GET['blogName']));
$user_id = htmlentities(htmlspecialchars($_GET['userId']));

$out_favo = $pdo->prepare("DELETE FROM favorites WHERE blog_title=? AND user_id=?");
$out_favo->execute(array($blog_name, $user_id));

$update_blog_favo = $pdo->prepare("UPDATE blog SET favo_img=? WHERE title=?");
$update_blog_favo->execute(array('favo.svg', $blog_name));

echo $blog_name." is uit de favorites gehaald.";

 ?>
