<?php

require "db_connect.php";

$pdo = pdo();
$cur_blog_name = htmlentities(htmlspecialchars($_GET['curBlogName']));
$admin_pass = sha1($_GET['passwordVal']);

if(!empty($admin_pass))
{

   $chek_password = $pdo->prepare("SELECT password FROM users WHERE password=?");
   $chek_password->execute(array($admin_pass));

   if($chek_password->rowCount() > 0)
   {

        $delete_blog = $pdo->prepare("DELETE FROM blog WHERE title=?");
        $delete_blog->execute(array($cur_blog_name));

        $delete_blog_favo = $pdo->prepare("DELETE FROM favorites WHERE blog_title=?");
        $delete_blog_favo->execute(array($cur_blog_name));

        echo "The ".$cur_blog_name." blog has been deleted...";

   }else{

    echo "Wrong password...";

   }

}

 ?>
