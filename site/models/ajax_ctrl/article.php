<?php

require 'db_connect.php';

$pdo = pdo();
$blog_name = htmlentities(htmlspecialchars($_GET['blogName']));

$get_blog_content = $pdo->prepare("SELECT * FROM blog WHERE title=?");
$get_blog_content->execute(array($blog_name));
$cur_blog_content = $get_blog_content->fetch();

$get_comment = $pdo->prepare("SELECT * FROM comments WHERE blog_title=? ORDER BY id DESC");
$get_comment->execute(array($blog_name));
$comment_count = $get_comment->rowCount();

require '../../views/baseTemplates/blog_content.temp.php';

 ?>
