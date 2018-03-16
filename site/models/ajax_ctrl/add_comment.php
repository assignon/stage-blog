<?php

require 'db_connect.php';

$pdo = pdo();
$blog_name = htmlentities(htmlspecialchars($_GET['blogName']));
$comment = htmlentities(htmlspecialchars($_GET['comment']));
$user_id = htmlentities(htmlspecialchars($_GET['userId']));

$get_user = $pdo->prepare("SELECT username FROM users WHERE id=?");
$get_user->execute(array($user_id));
$cur_user = $get_user->fetch();

$insert_comment = $pdo->prepare("INSERT INTO comments(blog_title, comment, user, date_added) VALUES(?,?,?,NOW())");
$insert_comment->execute(array($blog_name, $comment, $cur_user['username']));

echo 'Reactie toegevoegd...';

 ?>
