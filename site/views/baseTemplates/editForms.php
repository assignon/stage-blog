<div class="formsCont">

   <div class="formBack">

   </div>


   <div class="forms <?php echo $_GET['req'];?>">

     <form id="homePage" action="" method="" class="addBlogs" style="display: none;">

       <img src="../stageBlog/public/media/closeForms.svg" alt="" class="closeForm" id="closeAddForm">

       <p class="notifications">Error and succes notification</p>

       <input type="text" name="titel" value="" placeholder="Blog Titel" id="titel" class="blogInput">
       <input type="file" name="blogimage" value="" placeholder="" id="blogImg" class="blogInput">
       <textarea name="blogcontent" rows="8" cols="80" id="blogContent" class="blogInput"></textarea>
       <input type="submit" name="sub" value="Add blog" id="addBlog">

     </form>


     <form id="usersPage" action="" method="" class="addUsers" style="display: none;">

       <img src="../stageBlog/public/media/closeForms.svg" alt="" class="closeForm">

       <p class="notifications">Add new user</p>

       <input type="text" name="username" value="" placeholder="username" id="userName">
       <!--<input type="file" name="profile" value="" placeholder="" id="avatar">-->
       <input type="email" name="" placeholder="email" id="newUserEmail">
       <input type="text" name="" placeholder="New user password" id="temporaryPassword">
       <input type="submit" name="sub" value="Add user" id="addUser">

     </form>


     <form  action="" method="" class="updateBlogs" style="display: none;">

       <img src="../stageBlog/public/media/closeForms.svg" alt="" class="closeForm">

       <p class="notifications">Error and succes notification</p>

       <input type="text" name="updatetitel" value="" placeholder="" id="updateTitel">
       <input type="file" name="updateimage" value="" placeholder="" id="updateImg">
       <textarea name="contentupdate" rows="8" cols="80" id="updateContent"></textarea>
       <input type="submit" name="sub" value="Update blog" id="updateBlog">

     </form>


     <form  action="" method="" class="updateUsers" style="display: none;">

       <img src="../stageBlog/public/media/closeForms.svg" alt="" class="closeForm">

       <p class="notifications">Error and succes notification</p>

       <input type="text" name="updateuser" value="" placeholder="username" id="updateUserName">
       <input type="file" name="updateuserprofile" value="" placeholder="" id="updateAvatar">
       <input type="submit" name="sub" value="Add user" id="updateUser">

     </form>


     <form  action="" method="" class="deleteBlogs" style="display: none;">

       <img src="../stageBlog/public/media/closeForms.svg" alt="" class="closeForm">

       <p class="notifications">Error and succes notification</p>

       <input type="password" name="deleteblog" value="" placeholder="Admin password" id="passwordBlog">
       <input type="submit" name="sub" value="Delete blog" id="deleteBlog">

     </form>


     <form  action="" method="" class="deleteUsers" style="display: none;">

       <img src="../stageBlog/public/media/closeForms.svg" alt="" class="closeForm">

       <p class="notifications">Error and succes notification</p>

       <input type="password" name="deleteblog" value="" placeholder="Admin password" id="passwordUser">
       <input type="submit" name="sub" value="Delete user" id="deleteUser">

     </form>

   </div>

</div>


<style media="screen">

.formsCont
{

   width: 100%;
   height: 100vh;
   max-height: 100vh;
   display: flex;
   justify-content: center;
   align-items: center;
   position: absolute;
   opacity: 0;

}


.formBack
{

   width: 100%;
   height: 100vh;
   background-color: #040B2A;
   position: fixed;
   opacity: 0.9;

}


.forms
{

   width: 100%;
   height: 100%;
   display: flex;
   flex-direction: column;
   justify-content: center;
   align-items: center;
   position: absolute;

}


.forms form
{

  position: absolute;
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;

}


.closeForm
{

   width: 20px;
   height: 20px;
   cursor: pointer;

}


.closeForm:hover
{

   transform: scale(1.2,1.2);

}


.forms form p
{

  width: 70%;
  height: auto;
  color: white;
  font-size: 17px;
  text-align: center;

}

.forms form input
{

    width: 70%;
    height: 35px;
    border: 1px solid white;
    background-color: white;
    color: #040B2A;
    border-radius: 3px;
    margin-top: 7px;
    padding-left: 10px;
    font-size: 17px;

}


.forms form  textarea
{

   width: 70%;
   height: 60%;
   border: 1px solid white;
   border-radius: 3px;
   padding-left: 10px;
   padding-top: 10px;
   margin-top: 10px;

}


#addBlog, #addUser
{

   background-color: #00D078;
   border: 1px solid #00D078;
   color: white;
   cursor: pointer;
   width: 70.5%

}


#addBlog:hover, #addUser:hover
{

   border: 1px solid white;
   background-color: white;
   color: #00D078;
   cursor: pointer;
   width: 70.5%

}


#updateBlog, #updateUser
{

   background-color: blue;
   border: 1px solid blue;
   color: white;
   cursor: pointer;
   width: 70.5%

}


#updateBlog:hover, #updateUser:hover
{

   border: 1px solid white;
   background-color: white;
   color: blue;
   cursor: pointer;
   width: 70.5%

}


#deleteBlog, #deleteUser
{

   background-color: #D00636;
   border: 1px solid #D00636;
   color: white;
   cursor: pointer;
   width: 70.5%

}


#deleteBlog:hover, #deleteUser:hover
{

   border: 1px solid white;
   background-color: white;
   color: #D00636;
   cursor: pointer;
   width: 70.5%

}

</style>
