<?php
   require '../stageBlog/site/models/ajax_ctrl/db_connect.php';
   class Globals
   {
      private $pdo;
      public function __construct()
      {



      }


      public static function user_is_admin()
      {

          $pdo = pdo();
          $current_id = htmlentities(htmlspecialchars($_GET['id']));
          $current_user = $pdo->prepare("SELECT user_is_admin FROM users WHERE id=?");
          $current_user->execute(array($current_id));
          $result = $current_user->fetch();

          return $result['user_is_admin'];


      }

   }

 ?>
