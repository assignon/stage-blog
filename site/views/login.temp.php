<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8" />
      <meta name="keywords" content=""/>
      <meta name="description" content="my stage blog"/>
      <meta name="author" content="Yanick 007"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="<?php echo $paths['styles'];?>login.css"/>
      <link href="https://fonts.googleapis.com/css?family=Amita" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Arbutus+Slab" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
      <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
      <script type="text/javascript" src="<?php echo $paths['js'];?>jsLibs/helpers.js"></script>
      <script type="text/javascript" src="<?php echo $paths['js'];?>login.js"></script>
      <title>Login</title>
    </head>
    <body>

        <header>

           <div class="loginCore">

              <div class="loginContainer">

                 <div class="loginForm">

                    <form class="" action="" method="">

                       <p id="notification">Log in</p>

                       <input type="text" name="" placeholder="Gebruikersnaam" class="loginData">
                       <input type="email" name="" placeholder="Email" class="resetData" id="email" style="display: none">
                       <input type="password" name="" placeholder="Wachtwoord" class="loginData">
                       <input type="submit" name="" value="Inloggen" id="login">
                       <input type="submit" name="" value="Sturen" id="resetPass" class="resetData" style="display: none">

                    </form>

                    <p id="forgotPass">Wachtwoord vergeten?</p>

                 </div>

                 <div class="blogImg">

                    <img src="<?php echo $paths['media'];?>Blogintro.jpg" alt="" id="illustratedImg">

                 </div>

              </div>

              <div class="logoContainer">

                <img src="" alt="" id="logo">
                <h2></h2>

              </div>

           </div>

        </header>

        <footer></footer>

    </body>

</html>
