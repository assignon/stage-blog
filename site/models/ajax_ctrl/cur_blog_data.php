<?php

require "db_connect.php";

$pdo = pdo();

$titel = htmlentities(htmlspecialchars($_GET['titel']));

$get_data = $pdo->prepare("SELECT * FROM blog WHERE title=?");
$get_data->execute(array($titel));

$blog_data = $get_data->fetch();

$blog_data_arr = array('blogTitle'=>$blog_data['title'], 'blogContent'=> $blog_data['blog_content']);
echo json_encode($blog_data_arr);


 ?>
