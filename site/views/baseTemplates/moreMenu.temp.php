<div class="moremenu">

  <img src="<?php echo $paths['media'];?>menuIcons/close.svg" alt="" id="closeMoreMenu" class="moremenusitems">

  <div class="moremenuItems moremenusitems" id="userData">

     <div class="moremenuCont"><img src="<?php echo $paths['media'];?>menuIcons/user.svg" alt=""></div>
     <p>Profile</p>

  </div>

  <!--<div class="moremenuItems moremenusitems" id="filters">

     <div class="moremenuCont"><img src="<?php echo $paths['media'];?>menuIcons/filter.svg" alt=""></div>
     <p>Filter</p>

  </div>-->


  <div class="moremenuItems moremenusitems" id="favos">

     <div class="moremenuCont"><img src="<?php echo $paths['media'];?>menuIcons/favorites.svg" alt=""></div>
     <p>Favorites</p>

  </div>


  <!--<div class="moremenuItems moremenusitems" id="histories">

     <div class="moremenuCont"><img src="<?php echo $paths['media'];?>menuIcons/history.svg" alt=""></div>
     <p>Geschiedenis</p>

  </div>-->


  <a href="../stageBlog/index.php?req=log_out" class="moremenuItems moremenusitems" id="logOut" style="text-decoration: none;">

     <span class="moremenuCont"><img src="<?php echo $paths['media'];?>menuIcons/logout.svg" alt=""></span>
     <p>Loguit</p>

  </a>

</div>


<style media="screen">


.moremenu
{

  width: 170px;
  height: auto;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: flex-start;
  margin-top: 20px;
  position: relative;
  left: 170px/*125px*/;
  z-index: 5;

}


#closeMoreMenu
{

   width: 20px;
   height: 20px;
   margin-bottom: 5px;
   margin-right: 5px;
   cursor: pointer;
   position: relative;

}


#closeMoreMenu:hover
{

   transform: scale(1.1,1.1);

}


.moremenuItems
{

    width: 90%;
    height: 40px;
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: center;
    cursor: pointer;
    margin-top: 10px;
    position: relative;

}


.moremenuItems:hover
{

  -webkit-transition: left 1.0s linear 2s;
  transition: left 1.0s linear 2s;
  left: -150px;

}


.moremenuCont
{

   width: 45px;
   height: 40px;
   display: flex;
   justify-content: center;
   align-items: center;
   border-right: 1px solid white;
   background-color: #040B27;
   border-radius: 3px 0px 0px 3px;

}


.moremenuCont img
{

   width: 25px;
   height: 25px;

}



.moremenuItems p
{

   width: 100px;
   padding-top: 10px;
   padding-bottom: 10px;
   padding-left: 7px;
   text-align: left;
   color: white;
   background-color: #040B27;
   border: 1px solid #040B27;
   border-radius: 0px 3px 3px 0px;

}
</style>


<script type="text/javascript">


$(function(){

  let showMoremenu = document.querySelector(".moreMenuIcon");
  let hideMoremenu = document.querySelector("#closeMoreMenu");

  showMoremenu.addEventListener('click', function()
  {

     Animation.hideEditTools();
     Animation.callMoremenu();

  });
  hideMoremenu.addEventListener('click', Animation.hideMoremenus);


})

</script>
