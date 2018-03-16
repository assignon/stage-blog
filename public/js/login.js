$(function(){

    let tl = new TimelineLite();
    tl.to($("#logo"), 1.2, {scale: 1.5, ease: Quad.easeOut}, 0.3, "#logoDisplay");
    tl.to($(".logoContainer"), 1, {left: 280, top: 70, scale: 0.7, ease: Quad.easeOut}, "#logoDisplay += 0.3", "#logoScaling");
    tl.to($("#illustratedImg"), 1, {left: 0, ease: Quad.easeOut}, "#logoScaling -= 1");
    tl.to($(".logoContainer h2"), 1.2, {scale: 1.3, top: 20, ease: Quad.easeOut},"#logoScaling += 0.5");

    tl.staggerTo($(".loginData"), 1, {scale: 1, ease: Quad.easeInOut},0.3, "#logoScaling += 0.1");
    tl.to($("#login"), 1, {opacity: 1, ease: Quad.easeInOut},4, "#logoScaling");
    tl.to($("#forgotPass"), 1, {opacity: 1, ease: Quad.easeInOut},4, "#logoScaling");
    tl.to($("#notification"), 1, {opacity: 1, ease: Quad.easeInOut},4, "#logoScaling");


    let login = document.getElementById('login');
    login.addEventListener('click', connection);


    function connection(e)
    {

       e.preventDefault();
       let xhr = Helper.initXhr();

       let inlogData = document.querySelectorAll('.loginData');
       let notification = document.getElementById('notification');

       let username = inlogData[0].value;
       let password = inlogData[1].value;

       xhr.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {

              notification.innerHTML = xhr.responseText;
              let user = JSON.parse(xhr.responseText);

              if(user.logged)
              {
                
                 window.location.href = "index.php?req=home&id="+user.session;

              }

          }

        };

        if(username != "" && password != "")
        {

          xhr.open("GET","../stageBlog/site/models/ajax_ctrl/connection.php?username="+username+"&password="+password,true);
          xhr.send();

        }else{

           notification.innerHTML = "Geef een gebruikersnaam en een wachtwoord...";

        }


    }

})
