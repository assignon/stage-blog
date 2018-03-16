<?php
echo $_GET['req'];
   if(isset($_GET['req']) AND $_GET['req'] != "")
   {

      $page_name = $_GET['req'];
      echo $page_name;

   }

 ?>
