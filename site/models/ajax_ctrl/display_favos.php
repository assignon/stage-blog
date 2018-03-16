<?php

session_start();
require 'db_connect.php';

$pdo = pdo();
$user_id = $_GET['userId'];

$get_favos = $pdo->prepare("SELECT * FROM favorites WHERE user_id=?");
$get_favos->execute(array($user_id));

if($get_favos->rowCount() > 0)
{

  $cur_user = $pdo->prepare("SELECT user_is_admin FROM users WHERE id=?");
  $cur_user->execute(array($user_id));
  $user_is_admin = $cur_user->fetch();

  while($favos = $get_favos->fetch())
  {

    $blogs = $pdo->prepare("SELECT title, blog_image, blog_content, favo_img, visited, publish, DATE_FORMAT(date_added,'%d/%m/%Y') AS date_added FROM blog WHERE title=?");
    $blogs->execute(array($favos['blog_title']));
    while($blog = $blogs->fetch()){
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

               ?><span class="" style=" background-color: blue;"></span><?php

             }else{

               ?><span class="" style="background-color: gray;"></span><?php

             }
             ?>
             <hr>

          </div>

          <div class="toolsCont">

            <p><?php echo $blog['date_added'];?></p>
            <?php

              if($user_is_admin)
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

}


}else{

  ?>

    <div class="noFavos" style="display: flex; flex-direction: column; justify-content: center; align-items: center; width: 100%; height: 60vh;">

       <img src="../stageBlog/public/media/favorite.svg" alt="" style="width: 150px; height: 150px;">
       <h3 style="text-align: center; color: #040B27; margin-top: 20px;">Uw hebt geen blog opgeslagen als favorite!</h3>

    </div>

  <?php

}

 ?>
