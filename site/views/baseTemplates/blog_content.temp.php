<div class="articleContainer">

   <h2 class="articleTitle"><?php echo $cur_blog_content['title'];?></h2>
   <div class="articleContentContainer">

      <div class="articleContent"><?php echo $cur_blog_content['blog_content'];?></div>

      <div class="favoComment">

          <div class="favoCont">

             <?php

                if($cur_blog_content['favo_img'] == "favo.svg")
                {

                  ?> <img src="../stageBlog/public/media/favo.svg" alt="" class="fovosStatus" id="inFavo" style="cursor: pointer;"> <p class="favoNotif">Zet in favorite</p><?php


                }else{

                   ?> <img src="../stageBlog/public/media/favorite.svg" alt="" class="fovosStatus" id="outFavo" style="cursor: pointer;"> <p class="favoNotif">Uit favorite halen</p><?php

                }

              ?>

          </div>

          <div class="commentCont">

             <img src="../stageBlog/public/media/comment.svg" alt="">
             <h3><?php echo $comment_count;?></h3>
             <p>Reatie(s)</p>

          </div>

      </div>

   </div>

   <div class="articleSeparator">

      <hr>
      <p class="reactionNotif">Reageren op het artikel</p>
      <hr>

   </div>


   <form class="articleComment" action="" method="">

     <textarea name="" rows="8" cols="80" id="comment" placeholder="Schrijf je reactie hier"></textarea>
     <input type="submit" name="" value="Plaatsen" id="sendComment">

   </form>

   <div class="articleSeparator">

      <hr>
      <p>Artikel Reacties</p>
      <hr>

   </div>


   <div class="commentsContainer">

     <?php

        while($display_comments = $get_comment->fetch())
        {

          require "comment.temp.php";

        }

      ?>

   </div>

</div>


<style media="screen">

 .articleContainer
 {

    width: 100%;
    height: auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 50px;

 }


 .articleTitle
 {

    text-align: center;
    color: #040B27;
    text-decoration: underline;

 }


 .articleContentContainer
 {

    width: 100%;
    height: auto;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: flex-start;
    margin-top: 30px;

 }


 .articleContent
 {

    width: 70%;
    height: auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-left: 30px;

 }


 .favoComment
 {

   width: 10%;
   height: auto;
   display: flex;
   flex-direction: column;
   justify-content: flex-start;
   align-items: center;
   margin-left: 30px;

 }


 .favoCont, .commentCont
 {

   width: auto;
   height: auto;
   display: flex;
   flex-direction: column;
   justify-content: center;
   align-items: center;
   margin-bottom: 30px;

 }


 .favoCont img, .commentCont img
 {

    width: 50px;
    height: 50px;
    margin-bottom: 1px;

 }


 #inFavo:hover, #outFavo:hover
 {

    transform: scale(0.9,0.9);

 }

 .favoCont p
 {

    color: #040B27;
    text-align: center;
    font-size: 16px;
    position: relative;
    bottom: 7px;

 }


 .commentCont h3
 {

    position: relative;
    bottom: 57px;
    color: #040B27;
    text-align: center;

 }


 .commentCont p
 {

   position: relative;
   bottom: 70px;
   color: #040B27;
   text-align: center;

 }

 .articleSeparator
 {

     width: 80%;
     height: auto;
     display: flex;
     flex-direction: row;
     justify-content: center;
     align-items: center;
     margin-top: 30px;

 }


 .articleSeparator hr
 {

   width: 40%;
   border: 1px solid #040B27;

 }


 .articleSeparator p
 {

    color: #040B27;
    font-size: 20px;
    text-align: center;
    width: 20%;

 }


 .articleComment
 {

    width: 70%;
    height: auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 30px;

 }


 .articleComment textarea
 {

    width: 100%;
    height: 150px;
    padding-left: 10px;
    padding-top: 10px;
    font-size: 18px;
    border: 1px solid #040B27;
    border-radius: 3px 3px 0px 0px;
    color: #040B27;
    text-align: left;

 }


 .articleComment #sendComment
 {

    width: 101.2%;
    height: 35px;
    border: 1px solid #040B27;
    border-radius: 0px 0px 3px 3px;
    background-color: #040B27;
    cursor: pointer;
    text-align: center;
    color: white;
    font-size: 18px;

 }


 .articleComment #sendComment:hover
 {

     background-color: white;
     color: #040B27;
     border-top: 0px;

 }


 .commentsContainer
 {

    width: 70%;
    height: auto;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    margin-top: 30px;
    margin-bottom: 30px;

 }

</style>
