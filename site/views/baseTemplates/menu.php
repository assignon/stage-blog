<nav class="menu">

   <ul class="menuItems">

     <li class="menuList">
        <a href="../stageBlog/index.php?req=home&id=<?php echo $_SESSION['id'];?>" class="menuLink">

           <img src="../stageBlog/public/media/menuIcons/all.svg" alt="" class="menuImg homelink">
           <p class="menuTxt">Alles</p>

        </a>
     </li>



     <!--<li class="menuList">
        <span class="menuLink">

           <img src="../stageBlog/public/media/menuIcons/all.svg" alt="" class="menuImg all">
           <p class="menuTxt">Alles</p>

        </span>
     </li>-->



      <li class="menuList recentPost">
         <span class="menuLink">

            <img src="../stageBlog/public/media/menuIcons/recent.svg" alt="" class="menuImg recent">
            <p class="menuTxt">Recent</p>

         </span>
      </li>


    <!--  <li class="menuList">
         <a href="" class="menuLink">

            <img src="" alt="" class="menuImg">
            <p class="menuTxt">Geschiedenis</p>

         </a>
      </li>-->


      <li class="menuList compagniInfo">
         <span class="menuLink">

            <img src="../stageBlog/public/media/menuIcons/about.svg" alt="" class="menuImg company">
            <p class="menuTxt">Over het bedrijf</p>

         </span>
      </li>


      <li class="menuList moreMenuIcon">
         <span class="menuLink">

            <img src="../stageBlog/public/media/menuIcons/more.svg" alt="" class="menuImg more">
            <p class="menuTxt">Meer</p>

         </span>
      </li>


      <!--<li class="menuList">
         <a href="" class="menuLink">

            <img src="" alt="" class="menuImg">
            <p class="menuTxt">Filter</p>

         </a>
      </li>-->


      <!--<li class="menuList">
         <a href="" class="menuLink">

            <img src="" alt="" class="menuImg">
            <p class="menuTxt">Favorite</p>

         </a>
      </li>-->


      <li class="menuList" id="searchContainer">

          <img src="../stageBlog/public/media/menuIcons/search.svg" alt="" class="menuImg" id="search">

      </li>
   </ul>


   <?php

   if(Globals::user_is_admin())
   {

      ?>
      <div class="adminbutt">

          <div class="hideTools">

             <img src="../stageBlog/public/media/menuIcons/close.svg" alt="">

          </div>

          <div class="showTools">

             <img src="../stageBlog/public/media/menuIcons/edit.svg" alt="">

          </div>

      </div>
      <?php

   }

  ?>

</nav>


<style media="screen" src="text/css">

 .menu
 {

   width: 100%;
   height: 50px;
   display: flex;
   flex-direction: row;
   justify-content: space-between;
   align-items: center;
   background-color: #040B27;

 }


 .menu ul
 {

   width: 85%;
   height: 100%;
   display: flex;
   flex-direction: row;
   justify-content: center;
   align-items: center;
   flex-direction: row;
   justify-content: center;
   align-items: center;

 }


 .menu ul li
 {

   width: auto;
   height: auto;
   display: flex;
   justify-content: center;
   align-items: center;
   margin-left: 40px;
   margin-right: 40px;
   cursor: pointer;

 }


 .menu ul li .menuLink
 {

   width: auto;
   height: auto;
   display: flex;
   flex-direction: row;
   justify-content: center;
   align-items: center;
   text-decoration: none;

 }


 .menu ul li .menuLink:hover .menuImg, #searchContainer:hover #search
 {

    transform: scale(1.3,1.3);

 }


 #searchContainer
 {

     cursor: pointer;

 }


 .menu ul li .menuLink img, #search
 {

    width: 25px;
    height: 25px;

 }


 .menu ul li .menuLink p
 {

    color: white;
    text-align: center;
    font-size: 16px;
    margin-left: 5px;

 }


 .adminbutt
 {

    width: 50px;
    height: 100%;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;

 }


 .adminbutt div
 {

   width: 50px;
   height: 48px;
   display: flex;
   justify-content: center;
   align-items: center;
   border: 1px solid #040B27/*#870E45/*28C87E*/;
   background-color: white/*#870E45/*28C87E*/;
   position: absolute;

 }


 .adminbutt div img
 {

    width: 30px;
    height: 30px;
    position: relative;

 }

</style>
