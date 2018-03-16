$(function(){

  let tl = new TimelineLite();
  tl.to($(".header img"), 1.2, {scale: 1, ease: Bounce.easeOut}, 0.3, "#begin");
  tl.to($(".header h4"), 0.6, {left: 0, opacity: 1, ease: Elastic.easeInOut}, "#begin += 0.1");
  tl.to($(".body h1"), 1, {scale: 1, ease: Quad.easeInOut}, "#begin -=0.3");

  tl.to($(".header img"), 1.2, {left: 500, ease: Bounce.easeOut}, 3.3, "#end");
  tl.to($(".header h4"), 0.6, {left: 200, opacity: 0, ease: Elastic.easeInOut}, 2.8, "#textOut");
  tl.to($(".body h1"), 1, {scale: 0, ease: Quad.easeInOut}, "#textOut");
  tl.to($(".homeAnimation"), 1, {left: 1500, ease: Quad.easeInOut}, 3.4);
  tl.to($(".homeAnimation"), 1, {display: 'none', ease: Quad.easeInOut}, 3);
  //tl.to($(".logoContainer h2"), 1.2, {scale: 1.3, top: 20, ease: Quad.easeOut},"#logoScaling += 0.5");

  let xhr = Helper.initXhr();
  let addBlog = document.getElementById("addBlog");
  let publish = document.querySelectorAll(".publishCurBlog");
  let favos = document.querySelector("#favos");
  let updateblog = document.getElementById("updateBlog");
  let userData = document.getElementById('userData');
  let blogContent = document.querySelector('.content');
  let recent = document.querySelector('.recentPost');
  let blogContainer = document.querySelector('.blogImageCont');
  let users = document.querySelector('#users');
  let companyInfo = document.querySelector('.compagniInfo');


  addBlog.addEventListener('click', addNew);
  favos.addEventListener('click', displayFavos);
  $(".updateCurBlog").click(callUpdateForm);
  $(".deleteCurBlog").click(callDeleteForm);
  $("#closeAddForm").click(displayBlogs);
  userData.addEventListener('click', profile);
  recent.addEventListener('click', recentPost);
  users.addEventListener('click', displayUsers);
  companyInfo.addEventListener('click', aboutConpany);

  blogContainer.addEventListener('click', function(e){

     let userId = blogContent.id;
     let blogName = e.currentTarget.parentNode.childNodes[3].childNodes[1].childNodes[3].textContent;
     let blogImgSrc = e.currentTarget.parentNode.childNodes[1].childNodes[1].src;

     changeBanner(blogImgSrc);
    // blogVisited(blogName);
    // histories(userId, blogName);
     article(blogName, userId);

  })

  for (var i = 0; i < publish.length; i++)
  {

    publishArr = publish[i];
    publishArr.addEventListener('click', publishBlog);

  }


  $(".closeForm").click(Animation.closeForm);


  function addNew(e)
  {

     e.preventDefault();
     let addBlogForm = document.querySelector('.addBlogs');
     let blogInputs = document.querySelectorAll('.blogInput');

     let blogImage = document.getElementById('blogImg').files[0];
     let titel = document.getElementById('titel').value;
     let content = document.getElementById('blogContent').value;
     let formdata = new FormData();
     formdata.append('blogimage', blogImage);

     let notification = document.querySelector('.addBlogs p');

     xhr.onreadystatechange = function(){

        if(this.readyState ==  4 && this.status == 200)
        {

            notification.innerHTML = xhr.responseText;

        }

     }

     blogInputs.forEach(function(inputs)
     {

        let inputsVal = inputs.value;
        let inputsName = inputs.name;

        if(inputsVal != "")
        {

          xhr.open('POST',"../stageBlog/site/models/ajax_ctrl/add_blog.php?titel="+titel+'&content='+content,true);
          xhr.send(formdata);

       }else{

          notification.innerHTML = "The field(s) <<"+inputsName+">> is(are) empty...!";

        }

     })


  }



  function publishBlog(e)
  {

     let curBlogName = e.currentTarget.parentNode.parentNode.childNodes[1].childNodes[3].textContent;

     xhr.onreadystatechange = function(){

        if(this.readyState ==  4 && this.status == 200)
        {

            Animation.callNotification('../stageBlog/public/media/publish.svg', xhr.responseText);

        }

     }

     xhr.open('GET',"../stageBlog/site/models/ajax_ctrl/publish_blog.php?titel="+curBlogName,true);
     xhr.send();

  }



  function displayFavos()
  {

    let blogContent = document.querySelector(".content");
    let userId = blogContent.id;

    xhr.onreadystatechange = function(){

       if(this.readyState ==  4 && this.status == 200)
       {

         blogContent.innerHTML = xhr.responseText;

         let blogContainer = document.querySelector('.blogContainer');

         blogContainer.addEventListener('click', function(e){

            let userId = blogContent.id;
            let blogName = e.currentTarget.childNodes[3].childNodes[1].childNodes[3].textContent;
            let blogImgSrc = e.currentTarget.childNodes[1].childNodes[1].src;

            changeBanner(blogImgSrc);
          //  blogVisited(blogName);
          //  histories(userId, blogName);
            article(blogName, userId);

         })

       }

    }

    xhr.open('GET',"../stageBlog/site/models/ajax_ctrl/display_favos.php?userId="+userId,true);
    xhr.send();

  }



  function displayBlogs()
  {

    let blogContent = document.querySelector(".content");
    let userId = blogContent.id;

      xhr.onreadystatechange = function(){

         if(this.readyState ==  4 && this.status == 200)
         {

           $(".content").html(xhr.responseText);

         }

      }

      xhr.open('GET',"../stageBlog/site/models/ajax_ctrl/display_blog.php?userId="+userId,true);
      xhr.send();

  }



  function callUpdateForm(e)
  {

      Animation.callFormBack();
      let updateForm = document.querySelector('.updateBlogs');
      updateForm.style.display = "flex";

      let curBlogName = e.currentTarget.parentNode.parentNode.childNodes[1].childNodes[3].textContent;
      let updateTitel = document.getElementById('updateTitel');
      let updateContent = document.getElementById('updateContent');

      xhr.onreadystatechange = function()
      {

         if(this.readyState ==  4 && this.status == 200)
         {

             let blog_data = JSON.parse(xhr.responseText);
             updateTitel.value = blog_data.blogTitle;
             updateContent.value = blog_data.blogContent;

             let blogTitle = blog_data.blogTitle;

             updateblog.addEventListener('click', function(e)
             {

               e.preventDefault();
               updateBlog(e, blogTitle);

             });

         }

      }

      xhr.open('GET',"../stageBlog/site/models/ajax_ctrl/cur_blog_data.php?titel="+curBlogName,true);
      xhr.send();

  }



  function callDeleteForm(e)
  {

    Animation.callFormBack();
    let deleteForm = document.querySelector('.deleteBlogs');
    deleteForm.style.display = "flex";

    let deleteblog = document.getElementById("deleteBlog");
    let curBlogName = e.currentTarget.parentNode.parentNode.childNodes[1].childNodes[3];

    $(".notifications").html("You are about to delete the "+curBlogName.textContent+" blog...");

    deleteblog.addEventListener('click', function(e)
    {

      e.preventDefault();
      deleteBlog(curBlogName);

    });

  }



  function updateBlog(e,curBlogTitle)
  {

    let title = document.getElementById('updateTitel').value;
    let content = document.getElementById('updateContent').value;
    let updateImg = document.getElementById('updateImg').files[0];
    let formdata = new FormData();
    formdata.append('updateimage', updateImg);

    xhr.onreadystatechange = function()
    {

       if(this.readyState ==  4 && this.status == 200)
       {

          $('.notifications').html(xhr.responseText);

       }

    }

    xhr.open('POST',"../stageBlog/site/models/ajax_ctrl/update_blog.php?title="+title+'&content='+content+'&curBlogTitle='+curBlogTitle,true);
    xhr.send(formdata);

  }



  function deleteBlog(curBlogName)
  {

      let xhr = Helper.initXhr();
      let passwordBlog = document.getElementById("passwordBlog");
      let passwordVal = passwordBlog.value;
      let blogStatusVisit = curBlogName.parentNode.childNodes[7];
      let blogStatusUnVisit = curBlogName.parentNode.childNodes[9];

      xhr.onreadystatechange = function()
      {

         if(this.readyState ==  4 && this.status == 200)
         {

            $(".notifications").html(xhr.responseText);
            passwordBlog.value = "";

            if(xhr.responseText == "The "+curBlogName.textContent+" blog has been deleted...")
            {

              blogStatusVisit.style.backgroundColor = "#F3053B";
              blogStatusUnVisit.style.backgroundColor = "#F3053B";

            }

         }

      }

      if(passwordBlog.value != "")
      {

        xhr.open('GET',"../stageBlog/site/models/ajax_ctrl/delete_blog.php?curBlogName="+curBlogName.textContent+'&passwordVal='+passwordVal,true);
        xhr.send();

      }else{

        $(".notifications").html("Give the password...");

      }

  }



  function profile()
  {

    let userId = blogContent.id;

    xhr.onreadystatechange = function()
    {

       if(this.readyState == 4 && this.status == 200)
       {

          blogContent.innerHTML = xhr.responseText;

          let updateUserData = document.querySelector('#updateUserData');
          updateUserData.addEventListener('click', editProfile);

       }

    };
    xhr.open('GET','../stageBlog/site/models/ajax_ctrl/profile.php?userId='+userId, true);
    xhr.send();

  }


  function editProfile(e)
  {

     e.preventDefault();
     let userId = blogContent.id;
     let profileMsg = document.querySelector(".profileMsg");
     let username = document.getElementById('nUsername');
     let email = document.getElementById('nEmail');
     let npassword = document.getElementById('nPassword');
     let password = document.getElementById('userPassword');

     xhr.onreadystatechange = function()
     {

        if(this.readyState == 4 && this.status == 200)
        {

           profileMsg.innerHTML = xhr.responseText;
           username.value = "";
           email.value = "";
           npassword.value = "";
           password.value = "";

        }

     };
     if(password.value != "")
     {

       xhr.open('GET','../stageBlog/site/models/ajax_ctrl/edit_profile.php?userId='+userId+'&username='+username.value+'&email='+email.value+'&npassword='+npassword.value+'&password='+password.value, true);
       xhr.send();

     }else{

       profileMsg.innerHTML = "Geef je huidige wachtwoord aan...";

     }

  }


  function recentPost()
  {

     let userId = blogContent.id;

     xhr.onreadystatechange = function()
     {

        if(this.readyState == 4 && this.status == 200)
        {

           blogContent.innerHTML = xhr.responseText;
           let blogContainer = document.querySelector('.blogImageCont');
           blogContainer.addEventListener('click', function(e){

              let userId = blogContent.id;
              let blogName = e.currentTarget.parentNode.childNodes[3].childNodes[1].childNodes[3].textContent;
              let blogImgSrc = e.currentTarget.parentNode.childNodes[1].childNodes[1].src;

              changeBanner(blogImgSrc);
            //  blogVisited(blogName);
              //histories(userId, blogName);
              article(blogName, userId);

           })

        }

     };
     xhr.open('GET','../stageBlog/site/models/ajax_ctrl/recent_post.php?userId='+userId, true);
     xhr.send();

  }


  function changeBanner(blogImgSrc)
  {

      let banner = document.querySelector('.banner');
      banner.style.backgroundImage = "url("+blogImgSrc+")";

  }


  function blogVisited(blogName)
  {

      xhr.onreadystatechange = function()
      {

         if(this.readyState == 4 && this.status == 200)
         {



         }

      };
      xhr.open('GET','../stageBlog/site/models/ajax_ctrl/visited_blog.php?blogName='+blogName, true);
      xhr.send();

  }



  function histories(userId, blogName)
  {

      xhr.onreadystatechange = function()
      {

         if(this.readyState == 4 && this.status == 200)
         {

             console.log(xhr.responseText);

         }

      };
      xhr.open('GET','../stageBlog/site/models/ajax_ctrl/history.php?blogName='+blogName+'&userId='+userId, true);
      xhr.send();

  }



  function article(blogName, userId)
  {

      xhr.onreadystatechange = function()
      {

         if(this.readyState == 4 && this.status == 200)
         {

             blogContent.innerHTML = xhr.responseText;

             let sendComment = document.getElementById('sendComment');
             let comment = document.getElementById('comment');
             let reactionNotif = document.querySelector('.reactionNotif');
             let commentsCont = document.querySelector('.commentsContainer');
             let fovosStatus = document.querySelector('.fovosStatus');
            // let inFavo = document.getElementById('inFavo');
            // let outFavo = document.getElementById('outFavo');

            blogVisited(blogName);
            histories(userId, blogName);

             sendComment.addEventListener('click', function(e)
             {
                e.preventDefault();
                addComment(comment, reactionNotif, blogName, userId, commentsCont);

             })

             if(fovosStatus.id == "inFavo")
             {

               fovosStatus.addEventListener('click', function()
               {

                 inFavorite(blogName, userId);

               })

             }else if(fovosStatus.id == "outFavo"){

               fovosStatus.addEventListener('click', function()
               {

                  outFavorite(blogName, userId);

               })

             }

         }

      };
      xhr.open('GET','../stageBlog/site/models/ajax_ctrl/article.php?blogName='+blogName, true);
      xhr.send();

  }



  function addComment(comment, reactionNotif, blogName, userId, commentsCont)
  {

      xhr.onreadystatechange = function()
      {

         if(this.readyState == 4 && this.status == 200)
         {

            //reactionNotif.innerHTML = xhr.responseText;
            Animation.callNotification('../stageBlog/public/media/commentnotif.svg', xhr.responseText);
            displayComment(commentsCont, blogName);

         }

      };
      if(comment.value != "")
      {

        xhr.open('GET','../stageBlog/site/models/ajax_ctrl/add_comment.php?blogName='+blogName+'&comment='+comment.value+'&userId='+userId, true);
        xhr.send();

      }else{

        //reactionNotif.innerHTML = "De reactie veld is leeg...";
        Animation.callNotification('../stageBlog/public/media/commentnotif.svg', "De reactie veld is leeg...");

    }

  }



  function displayComment(commentsCont, blogName)
  {

      xhr.onreadystatechange = function()
      {

         if(this.readyState == 4 && this.status == 200)
         {

            commentsCont.innerHTML = xhr.responseText;

         }

      };
      xhr.open('GET','../stageBlog/site/models/ajax_ctrl/display_comment.php?blogName='+blogName, true);
      xhr.send();

  }



  function inFavorite(blogName, userId)
  {

      xhr.onreadystatechange = function()
      {

         if(this.readyState == 4 && this.status == 200)
         {

            Animation.callNotification('../stageBlog/public/media/favorite.svg', xhr.responseText);
            article(blogName, userId);

         }

      };
      xhr.open('GET','../stageBlog/site/models/ajax_ctrl/in_favorite.php?blogName='+blogName+'&userId='+userId, true);
      xhr.send();

  }



  function outFavorite(blogName, userId)
  {

      xhr.onreadystatechange = function()
      {

         if(this.readyState == 4 && this.status == 200)
         {

            Animation.callNotification('../stageBlog/public/media/favo.svg', xhr.responseText);
            article(blogName, userId);

         }

      };
      xhr.open('GET','../stageBlog/site/models/ajax_ctrl/out_favorite.php?blogName='+blogName+'&userId='+userId, true);
      xhr.send();

  }


  function displayUsers()
  {

      xhr.onreadystatechange = function()
      {

         if(this.readyState == 4 && this.status == 200)
         {

            blogContent.innerHTML = xhr.responseText;

            let addNewUser = document.getElementById('addNewUser');
            addNewUser.addEventListener('click', function()
            {

              Animation.callFormBack();
              let usersForm = document.querySelector('#usersPage');
              usersForm.style.display = "flex";

              $("#addUser").click(addUser);

           });

         }

      };
      xhr.open('GET','../stageBlog/site/models/ajax_ctrl/display_users.php', true);
      xhr.send();

  }


  function addUser(e)
  {

     e.preventDefault();
     let userName = document.getElementById('userName');
     let newUserEmail = document.getElementById('newUserEmail');
     let temporaryPassword = document.getElementById('temporaryPassword');

     xhr.onreadystatechange = function()
     {

        if(this.readyState == 4 && this.status == 200)
        {

           $(".notifications").html(xhr.responseText);
           displayUsers();

        }

     };
     if(userName.value != "" && newUserEmail.value != "" && temporaryPassword.value != "")
     {

       xhr.open('GET','../stageBlog/site/models/ajax_ctrl/add_users.php?userName='+userName.value+'&newUserEmail='+newUserEmail.value+'&temporaryPassword='+temporaryPassword.value, true);
       xhr.send();

     }else{

        $(".notifications").html("Een of meerdere velden is(zijn) leeg...");

     }

  }


  function aboutConpany()
  {

      xhr.onreadystatechange = function()
      {

         if(this.readyState == 4 && this.status == 200)
         {

            blogContent.innerHTML = xhr.responseText;

            let aboutMenuItems = document.querySelectorAll('.aboutMenuItems');

            for (var i = 0; i < aboutMenuItems.length; i++) {

              let aboutMenuItemsArr = aboutMenuItems[i];

              aboutMenuItemsArr.addEventListener('click', function(e)
             {

               let aboutContent = e.currentTarget.classList[0];

               tl.to('#'+aboutContent, 0.3, {display: 'flex'});

               if(aboutContent == 'me')
               {

                 $(".me").css('color','#C80128');
                 $(".me").css('fontSize','22px');

                 $(".redbutton").css('color','#040B27');
                 $(".redbutton").css('fontSize','20px');

                 $(".employes").css('color','#040B27');
                 $(".employes").css('fontSize','20px');

                 $("#employes").css('display','none');

                 $("#redbutton").css('display','none');

               }else if(aboutContent == "redbutton")
               {

                 $(".redbutton").css('color','#C80128');
                 $(".redbutton").css('fontSize','22px');

                 $(".me").css('color','#040B27');
                 $(".me").css('fontSize','20px');

                 $(".employes").css('color','#040B27');
                 $(".employes").css('fontSize','20px');

                 $("#employes").css('display','none');

                 $("#me").css('display','none');

               }else{

                 $(".employes").css('color','#C80128');
                 $(".employes").css('fontSize','22px');

                 $(".me").css('color','#040B27');
                 $(".me").css('fontSize','20px');

                 $(".redbutton").css('color','#040B27');
                 $(".redbutton").css('fontSize','20px');

                 $("#redbutton").css('display','none');

                 $("#me").css('display','none');

               }

            })

            }

         }

      };
      xhr.open('GET','../stageBlog/site/models/ajax_ctrl/company.php', true);
      xhr.send();

  }


})
