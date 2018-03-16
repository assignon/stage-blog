<?php

require "db_connect.php";

$pdo = pdo();
$user_id = intval($_GET['userId']);
$get_user = $pdo->prepare("SELECT * FROM users WHERE id=?");
$get_user->execute(array($user_id));
$user_is_admin = $get_user->fetch();

/*$year_now = date('Y');
$month_now = date('n');
$day_now = date('j');

if($day_now < 10 AND $month_now < 10)
{

   $date_now = $year_now.'/'.'0'.$month_now.'/'.'0'.$day_now;

}else if($day_now < 10 AND $month_now >= 10){

  $date_now = $year_now.'/'.$month_now.'/'.'0'.$day_now;

}else if($day_now >= 10 AND $month_now < 10){

  $date_now = $year_now.'/'.'0'.$month_now.'/'.$day_now;

}else if($day_now >= 10 AND $month_now >= 10){

  $date_now = $year_now.'/'.$month_now.'/'.$day_now;

}*/

if($user_is_admin['user_is_admin'])
{

  $recent_blog = $pdo->prepare("SELECT title, blog_image, blog_content, favo_img, visited, publish, DATE_FORMAT(date_added,'%d/%m/%Y') AS date_added FROM blog WHERE visited=?");
  $recent_blog->execute(array(0));

  if($recent_blog->rowCount() > 0)
  {

    while($blog = $recent_blog->fetch())
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

  }else{

    ?>

      <div class="noRecentBlog" style="display: flex; flex-direction: column; justify-content: center; align-items: center; width: 100%; height: 60vh;">

         <img src="../stageBlog/public/media/recentblog.svg" alt="" style="width: 150px; height: 150px;">
         <h3 style="text-align: center; color: #040B27; margin-top: 20px;">Geen recent blog!!!</h3>

      </div>

    <?php

  }

}else{

  $recent_blog = $pdo->prepare("SELECT title, blog_image, blog_content, favo_img, visited, publish, DATE_FORMAT(date_added,'%d/%m/%Y') AS date_added FROM blog WHERE visited=? AND publish=?");
  $recent_blog->execute(array(0,1));

  if($recent_blog->rowCount() > 0)
  {

    while($blog = $recent_blog->fetch())
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

  }else{

    ?>

      <div class="noRecentBlog" style="display: flex; flex-direction: column; justify-content: center; align-items: center; width: 100%; height: 60vh;">

         <img src="../stageBlog/public/media/recentblog.svg" alt="" style="width: 150px; height: 150px;">
         <h3 style="text-align: center; color: #040B27; margin-top: 20px;">Geen recent blog!!!</h3>

      </div>

    <?php

  }

}

 ?>
