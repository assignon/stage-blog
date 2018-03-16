<div class="usersContainer">

   <div class="users">

     <?php
      while($display_users = $get_users->fetch())
      {
      ?>

        <div class="usersName">

           <div class="usersImg">

             <img src="../stageBlog/public/media/users_added.svg" alt="">

           </div>

           <h3><?php echo $display_users['username'];?></h3>

        </div>

     <?php } ?>


   </div>

   <div class="usersInfo">

     <div class="addUserImg" id="addNewUser">

        <img src="../stageBlog/public/media/addUsers.svg" alt="">

     </div>

   </div>

</div>


<style media="screen">

.usersContainer
{

   width: 100%;
   height: auto;
   display: flex;
   flex-direction: row;
   justify-content: center;
   align-items: flex-start;
   margin-top: 50px;

}


.users
{

   width: 80%;
   height: auto;
   display: flex;
   flex-direction: row;
   flex-wrap: wrap;
   justify-content: center;
   align-items: flex-start;
   margin-bottom: 50px;
   margin-top: 50px;

}


.usersName
{

   width: auto;
   height: auto;
   display: flex;
   flex-direction: column;
   justify-content: center;
   align-items: center;
   cursor: pointer;
   margin-bottom: 70px;
   margin-left: 70px;

}


.usersImg
{

   width: 150px;
   height: 150px;
   display: flex;
   justify-content: center;
   align-items: center;
   border: 2px solid #040B27;
   background-color: #ffffff;
   border-radius: 100%;

}


.usersImg:hover
{

   transform: scale(0.9,0.9);

}


.usersImg img
{

  width: 80px;
  height: 80px;

}


.usersImg h3
{

    color: #040B27;
    text-align: center;
    margin-top: 1px;

}


.addUserImg
{

   width: 70px;
   height: 70px;
   display: flex;
   justify-content: center;
   align-items: center;
   border: 2px solid #040B27;
   border-radius: 100%;
   cursor: pointer;
   margin-left: 100px;
   margin-right: 100px;

}


.addUserImg:hover
{

    transform: scale(0.9,0.9);

}


.addUserImg img
{

    width: 30px;
    height: 30px;
    max-width: 100%;

}


.usersInfo
{

  width: 20%;
  height: auto;
  min-height: 50vh;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: flex-start;

}

</style>
