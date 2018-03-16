<?php

require 'db_connect.php';

$pdo = pdo();

$user_id = $_GET['userId'];

$get_user = $pdo->prepare("SELECT * FROM users WHERE id=?");
$get_user->execute(array($user_id));
$user_is_admin = $get_user->fetch();

   $pdo = pdo();
   $get_blogs = $pdo->query('SELECT title, blog_image, blog_content, favo_img, visited, publish, DATE_FORMAT(date_added,"%d/%m/%Y") AS date_added FROM blog');
   //$get_blogs->execute(array(1));

   while($blog = $get_blogs->fetch())
   {

      ?>

      <div class="blogContainer">

         <div class="blogImageCont">
           <img src="../stageBlog/public/media/blogImg/<?php echo $blog['blog_image'];?>" alt="" class="blogImge">
         </div>

         <div class="blogFooter">

            <div class="blogNameCont">

               <hr>
               <p><?php echo $blog['title'];?></p>
               <img src="../stageBlog/public/media/<?php echo $blog['favo_img'];?>" alt="" class="favorite">
               <?php
               if(!$blog['visited'])
               {

                 ?><span class="" style="background-color: blue;"></span><?php

               }else{

                 ?><span class="" style="background-color: gray;"></span><?php

               }
               ?>
               <hr>

            </div>

            <div class="toolsCont">

              <p><?php echo $blog['date_added'];?></p>
              <?php

                if($user_is_admin['user_is_admin'])
                {

                  ?>

                  <img src="../stageBlog/public/media/update.svg" alt="" class="updateCurBlog" style="transform:scale(0,0);">
                  <img src="../stageBlog/public/media/delete.svg" alt="" class="deleteCurBlog" style="transform:scale(0,0);">
                  <?php if(!$blog['publish']){?><img src="../stageBlog/public/media/publish.svg" alt="" class="publishCurBlog"><?php }?>

                  <?php

                }

               ?>

            </div>

         </div>

      </div>


      <?php

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


 ?>
