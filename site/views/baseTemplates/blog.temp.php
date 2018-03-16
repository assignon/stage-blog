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

           ?><span class="blogStatus" style="background-color: blue;"></span><?php

         }else{

           ?><span class="" style="background-color: gray;"></span><?php

         }
         ?>
         <hr>

      </div>

      <div class="toolsCont">

        <p><?php echo $blog['date_added'];?></p>
        <?php

          if(Globals::user_is_admin())
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
