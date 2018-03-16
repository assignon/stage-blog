<?php

require 'db_connect.php';

$pdo = pdo();

  $blog_name = htmlentities(htmlspecialchars($_GET['curBlogTitle']));
  $new_blog_name = htmlentities(htmlspecialchars($_GET['title']));//e nm qui srafnalement enregstre ds la bd apres a mise a jour.
  $content = $_GET['content'];


  $blog_id = $pdo->prepare('SELECT id FROM blog WHERE title=?');
  $blog_id->execute(array($blog_name));
  $get_blog_id = $blog_id->fetch();


  $blog_data = $pdo->prepare('SELECT title FROM blog WHERE id=?');
  $blog_data->execute(array($get_blog_id['id']));
  $get_blog_data = $blog_data->fetch();


    if(!empty($new_blog_name))
    {

       $update_blog_name = $pdo->prepare("UPDATE blog SET title=? WHERE id=?");
       $update_blog_name->execute(array($new_blog_name, $get_blog_id['id']));

       echo "The blog name has been updated...";

    }else{

        echo "Thes title field is empty...";

    }


    if($content != "")
    {

       $update_blog_content = $pdo->prepare("UPDATE blog SET blog_content=? WHERE id=?");
       $update_blog_content->execute(array($content, $get_blog_id['id']));

       echo "The blog content has been updated... ";

    }else{

      echo "The field(s) is(are) empty...";

    }


    if(isset($_FILES['updateimage']) AND $_FILES['updateimage'] != "")
    {

      $blog_img = $_FILES['updateimage'];

      $blog_img_name = $blog_img['name'];
      $img_tmp = $blog_img['tmp_name'];
      $img_new_path = "../../../public/media/blogImg/".$blog_img_name;

      $valide_extentions = array(".png",".jpeg",".jpg");
      $upload_extention = strrchr($blog_img_name,".");

       if(in_array($upload_extention, $valide_extentions))
       {

          if(move_uploaded_file($img_tmp, $img_new_path))
          {

             $update_blog_img = $pdo->prepare("UPDATE blog SET blog_image=? WHERE id=?");
             $update_blog_img->execute(array($blog_img_name, $get_blog_id['id']));

             echo "The blog img has been updated...";

          }else{

             echo "Image was not uploaded (move or directory problem).";

          }

        }else
        {

           echo "The image extentention is not valide (png, jpeg and jpg are allowed).";

        }

    }


 ?>
