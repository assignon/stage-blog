<div class="userDataCont">

   <div class="dataAvatar">

     <div class="userAvatar">
        <img src="../stageBlog/public/media/avatar.svg" alt="">
     </div>

     <div class="data">

       <p><?php echo $user_data['username'];?></p>
       <p><?php echo $user_data['email'];?></p>

     </div>

   </div>

   <div class="userDataSeparator">

     <hr>
     <p class="profileMsg">Pas je gegevens aan</p>
     <hr>

   </div>

   <form class="userDataForm" action="" method="">
     <?php if($user_data['user_is_admin']){ ?>
     <input type="text" name="" placeholder="Nieuw Gebruikersnaam" id="nUsername">
     <?php } ?>
     <input type="text" name="" placeholder="Nieuw Email" id="nEmail">
     <input type="password" name="" placeholder="Nieuw Wachtwoord" id="nPassword">
     <input type="password" name="" placeholder="Huidige Wachtwoord" id="userPassword">
     <input type="submit" name="" value="Aanpassen" id="updateUserData">

   </form>

</div>

<style media="screen">

  .userDataCont
  {

     width: 100%;
     height: auto;
     display: flex;
     flex-direction: column;
     justify-content: center;
     align-items: center;
     margin-top: 70px;

  }


  .dataAvatar
  {

     width: auto;
     height: auto;
     display: flex;
     flex-direction: row;
     justify-content: flex-end;
     align-items: center;
     margin-bottom: 30px;

  }


  .userAvatar
  {

     width: 150px;
     height: 150px;
     border: 2px solid #040B27;
     border-radius: 3px;
     display: flex;
     justify-content: center;
     align-items: center;

  }


  .userAvatar img
  {

      width: 120px;
      height: 120px;
      max-width: 100%;

  }


  .data
  {

    width: auto;
    height: 50px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;

  }


  .data p
  {

     color: #040B27;
     text-align: left;
     font-size: 18px;
     width: auto;
     margin-left: 10px;
     margin-bottom: 0px;
     position: relative;
     top: 20px;

  }


  .userDataSeparator
  {

    width: 90%;
    height: auto;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    margin-bottom: 30px;

  }


  .userDataSeparator hr
  {

     color: #040B27;
     width: 70%;
     border: 1px solid #040B27;

  }


  .userDataSeparator p
  {

     font-size: 15px;
     color: #040B27;
     text-align: center;
     width: 20%;

  }


  .userDataForm
  {

    width: auto;
    height: auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-bottom: 30px;

  }


  .userDataForm input
  {

      width: 500px;
      height: 30px;
      border: 1px solid #040B27;
      border-radius: 3px;
      color: #040B27;
      text-align: left;
      font-size: 17px;
      padding-left: 15px;
      margin-bottom: 10px;

  }


  #updateUserData
  {

    width: 515px;
    height: 35px;
    padding-left: 0px;
    background-color: #040B27;
    color: white;
    cursor: pointer;
    text-align: center;

  }


  #updateUserData:hover
  {

    background-color: white;
    color: #040B27;

  }



</style>
