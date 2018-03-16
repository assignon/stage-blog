<div class="avatarReaction">
  <div class="global">

    <div class="commentAvatarCont">

       <img src="../stageBlog/public/media/avatarComment.svg" alt="">

    </div>
    <h3><?php echo $display_comments['user'];?> <span style="font-size: 13px;"><?php echo $display_comments['date_added'];?></span></h3>

  </div>

  <div class="commentContent">

     <p><?php echo $display_comments['comment'];?></p>

  </div>
</div>

<style media="screen">

.avatarReaction
{

    width: 90%;
    height: auto;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    margin-bottom: 30px;

}


.global
{

  width: 100%;
  height: auto;
  display: flex;
  flex-direction: row;
  justify-content: flex-start;
  align-items: center;
  z-index: 3;

}


.commentAvatarCont
{

   width: 80px;
   height: 80px;
   border: 1px solid white;
   background-color: #040B27;
   border-radius: 3px 3px 0px 3px;
   display: flex;
   justify-content: center;
   align-items: center;

}

.commentAvatarCont img
{

   width: 50px;
   height: 50px;
   max-width: 100%;

}


.global h3
{

   text-align: left;
   color: #040B27;
   margin-left: 10px;
   position: relative;
   bottom: 10px;

}


.commentContent
{

   width: 90%;
   height: auto;
   display: flex;
   justify-content: flex-start;
   align-items: flex-start;
   padding: 10px;
   border: 1px solid #040B27;
   background-color: white;
   border-radius: 0px 3px 3px 3px;
   position: relative;
   left: 65px;
   bottom: 20px;

}


.commentContent p
{

   font-size: 16px;
   text-align: left;
   color: #040B27;
   margin-left: 10px;
   margin-top: 10px;

}

</style>
