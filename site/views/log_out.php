<?php
//session_start();
   $_SESSION = array();
   session_destroy();

    header('Location: ../stageBlog/index.php?req=login');

 ?>
