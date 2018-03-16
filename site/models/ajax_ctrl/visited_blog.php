<?php

require 'db_connect.php';

$pdo = pdo();
$blog_name = htmlentities(htmlspecialchars($_GET['blogName']));

$visited_blog = $pdo->prepare("UPDATE blog SET visited=? WHERE title=?");
$visited_blog->execute(array(1,$blog_name));

 ?>
