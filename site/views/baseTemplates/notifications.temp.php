<div class="notifs">

   <div class="notifImg">
      <img src="" alt="">
   </div>

   <div class="notifContentContainer">

      <p class="notifContentContainer">



      </p>

   </div>

</div>

<style media="screen">

.notifs
{

   width: 300px;
   height: auto;
   display: flex;
   flex-direction: row;
   justify-content: center;
   align-items: center;
   position: fixed;
   z-index: 5;
   right: -300px;
   top: 10px;

}


.notifImg
{

   width: 55px;
   height: 50px;
   border: 1px solid #1EA36C;
   border-radius: 3px 0px 0px 3px;
   background-color: #1EA36C;
   display: flex;
   justify-content: center;
   align-items: center;

}


.notifImg img
{

   width: 35px;
   height: 35px;
   max-width: 100%;

}


.notifContentContainer
{

   width: 250px;
   height: auto;
   min-height: 50px;
   display: flex;
   justify-content: center;
   align-items: center;
   border: 1px solid #1EA36C;
   border-radius: 0px 3px 3px 0px;
   background-color: #1EA36C;
   position: relative;
   right: 5px;

}


.notifContentContainer
{

   text-align: left;
   font-size: 16px;
   color: white;
   margin-left: 10px;
   width: 90%;
   height: auto;

}

</style>
