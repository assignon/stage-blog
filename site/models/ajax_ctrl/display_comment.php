<?php

require "db_connect.php";

$pdo = pdo();
$blog_name = htmlentities(htmlspecialchars($_GET['blogName']));

$get_comment = $pdo->prepare("SELECT * FROM comments WHERE blog_title=? ORDER BY id DESC");
$get_comment->execute(array($blog_name));

while($display_comments = $get_comment->fetch())
{

  require "../../views/baseTemplates/comment.temp.php";

}

 ?>
