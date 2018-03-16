<?php

require 'db_connect.php';

$pdo = pdo();
$blog_name = htmlentities(htmlspecialchars($_GET['blogName']));
$user_id = htmlentities(htmlspecialchars($_GET['userId']));

$get_user = $pdo->prepare("SELECT username FROM users WHERE id=?");
$get_user->execute(array($user_id));
$cur_user = $get_user->fetch();

$get_blog = $pdo->prepare("SELECT title, blog_image FROM blog WHERE title=?");
$get_blog->execute(array($blog_name));
$cur_blog = $get_blog->fetch();

$insert_history = $pdo->prepare("INSERT INTO histories(blog_title, blog_img, date_visited, time_visited, user) VALUES(?,?,NOW(),NOW(),?)");
$insert_history->execute(array($cur_blog['title'], $cur_blog['blog_image'], $cur_user['username']));


 ?>
