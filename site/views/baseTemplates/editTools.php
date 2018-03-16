<div class="editCont">

   <div class="editItems" id="add">

      <div class="toolImgCont toolImgContadd"><img src="<?php echo $paths['media'];?>/add.svg" alt=""></div>
      <p>ADD POST</p>

   </div>


   <div class="editItems" id="update">

      <div class="toolImgCont toolImgContupdate"><img src="<?php echo $paths['media'];?>/update.svg" alt=""></div>
      <p>UPDATE</p>

   </div>


   <div class="editItems" id="delete">

      <div class="toolImgCont toolImgContdelete"><img src="<?php echo $paths['media'];?>/delete.svg" alt=""></div>
      <p>DELETE</p>

   </div>


   <div class="editItems" id="users">

      <div class="toolImgCont toolImgContusers"><img src="<?php echo $paths['media'];?>/users.svg" alt=""></div>
      <p>USERS</p>

   </div>

</div>


<style media="screen">

   .editCont
   {

     width: auto;
     height: auto;
     display: flex;
     flex-direction: column;
     justify-content: flex-start;
     align-items: center;
     position: absolute;
     right: -200px;

   }


   .editItems
   {

     width: auto;
     height: auto;
     display: flex;
     flex-direction: row;
     justify-content: flex-start;
     align-items: center;
     cursor: pointer;
     position: relative;

   }


   .toolImgCont
   {

     width: 40px;
     height: 40px;
     display: flex;
     justify-content: center;
     align-items: center;

   }


   .toolImgContadd
   {

     border: 1px solid #28C47D;

   }


   .toolImgContupdate
   {

      border: 1px solid #009BFC;

   }


   .toolImgContdelete
   {

     border: 1px solid #F3053B;

   }


   .toolImgContusers
   {

     border: 1px solid #040B27;

   }


   .editItems img
   {

     width: 30px;
     height: 30px;

   }


   .editItems:hover
   {

     -webkit-transition: left 1.0s linear 1s;
     transition: left 1.0s linear 1s;
     left: -200px;

   }


   .editItems p
   {

      text-align: center;
      width: 100px;
      height: auto;
      padding-top: 10px;
      padding-bottom: 10px;
      border: 1px solid black;
      font-size: 17px;
      color: white;
      background-color: #040B27;


   }



</style>

<?php

if(Globals::user_is_admin())

{?>

<script type="text/javascript">

 $(function(){

   let showTools = document.querySelector(".showTools");
   let hideTools = document.querySelector(".hideTools");
   let tl = new TimelineLite();

   showTools.addEventListener('click', function(){

      Animation.hideMoremenus();
       Animation.callEditTools();

   });
   hideTools.addEventListener('click', Animation.hideEditTools);


   $("#update").click(function(){

     tl.to('.updateCurBlog', 0.5, {scale: 1, ease: Back.easeOut});
     tl.to('.deleteCurBlog', 0.5, {scale: 0, ease: Back.easeInOut}, '-=0.5');

   })


   $("#delete").click(function(){

     tl.to('.deleteCurBlog', 0.5, {scale: 1, ease: Back.easeOut});
     tl.to('.updateCurBlog', 0.5, {scale: 0, ease: Back.easeInOut}, '-=0.5');

   })

 })

</script>

<?php } ?>
