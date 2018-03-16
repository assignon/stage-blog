<?php
session_start();
require 'db_connect.php';
require 'send_mail.php';

$pdo = pdo();
//$curId = intval($_GET['id']);


/*function get_user()
{

   $pdo = pdo();
   $cur_user = $pdo->prepare("SELECT user_is_admin FROM users WHERE id=?");
   $cur_user->execute(array($curId));
   $get_user_grade = $cur_user->fetch();
   return $get_user_grade;

}*/



function display_blog()
{

   $pdo = pdo();
   $get_blogs = $pdo->query('SELECT * FROM blog');

   while($blog = $get_blogs->fetch())
   {

      require "../../views/baseTemplates/blog.temp.php";

   }

}


/*function display_unpublish_blog()
{

   $pdo = pdo();
   $get_blogs = $pdo->prepare('SELECT * FROM blog WHERE publish=?');
   $get_blogs->execute(array(0));

   while($blogs = $get_blogs->fetch())
   {

      require "../stageBlog/site/views/baseTemplates/blog.temp.php";

   }

}*/



if(!empty($_GET['titel']) AND !empty($_GET['content']) AND isset($_FILES['blogimage']) AND $_FILES['blogimage'] != "")
{

  $title = htmlentities(htmlspecialchars($_GET['titel']));
  $content = $_GET['content'];
  $blog_img = $_FILES['blogimage'];

  $check_name = $pdo->prepare('SELECT * FROM blog WHERE title=?');
  $check_name->execute(array($title));
  $blog_name_count = $check_name->rowCount();

  if($blog_name_count == 0)
  {

     $blog_img_name = $blog_img['name'];
     $img_tmp = $blog_img['tmp_name'];
     $img_new_path = "../../../public/media/blogImg/".$blog_img_name;

     $valide_extentions = array(".png",".jpeg",".jpg");
     $upload_extention = strrchr($blog_img_name,".");

      if(in_array($upload_extention, $valide_extentions))
      {
            if(move_uploaded_file($img_tmp, $img_new_path))
            {

                $insert_blog = $pdo->prepare("INSERT INTO blog(title, blog_image, blog_content, favo_img, visited, date_added) VALUES(?,?,?,?,?,NOW())");
                $insert_blog->execute(array($title, $blog_img_name, $content, "favo.svg", 0));

                $cur_blog = $pdo->prepare("SELECT * FROM blog WHERE title=?");
                $cur_blog->execute(array($title));
                $cur_blog_published = $cur_blog->fetch();

                echo "Blog succesfully added.";

            }else{

               echo "Image was not uploaded (move or directory problem).";

            }


      }else
      {

         echo "The image extentention is not valide (png, jpeg and jpg are allowed).";

      }

  }else{

      echo "This blog name already exist.";

  }


}else{

  echo "One of more field are empty.";

}

 ?>
