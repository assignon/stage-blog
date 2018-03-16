<!DOCTYPE html>
<html>
    <head>
      <?php require '../stageBlog/site/views/baseTemplates/head.php';?>
      <link rel="stylesheet" type="text/css" href="<?php echo $paths['styles'];?>home.css"/>
      <link href="https://fonts.googleapis.com/css?family=Amita" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Arbutus+Slab" rel="stylesheet">
      <script type="text/javascript" src="<?php echo $paths['js'];?>home.js"></script>
      <title>Home</title>
    </head>
    <body>

        <header>

           <div class="homeCore">

              <?php require '../stageBlog/site/views/baseTemplates/editForms.php';?>

                <div class="homeContainer">
                   <?php require '../stageBlog/site/views/baseTemplates/notifications.temp.php';?>
                   <div class="bannerMenu">

                      <div class="banner">

                      </div>

                      <?php require '../stageBlog/site/views/baseTemplates/menu.php';?>

                   </div>


                   <div class="blogContent">

                      <div class="content" id="<?php echo $_GET['id'];?>">

                        <?php $users_ctrl->display_blog();?>

                      </div>

                      <?php require '../stageBlog/site/views/baseTemplates/editTools.php';?>

                      <?php require '../stageBlog/site/views/baseTemplates/moreMenu.temp.php';?>

                   </div>

                </div>

                <div class="homeAnimation">

                   <div class="header">

                      <h4>YANICK STAGE BLOG</h4>
                      <img src="<?php echo $paths['media'];?>blogging.svg" alt="">

                   </div>

                   <div class="body">

                      <h1>Welkom</h1>
                      <h1><?php echo $user_data['username'];?></h1>

                   </div>

                </div>

           </div>

        </header>

        <footer></footer>

    </body>

</html>
