<?php


class Model
{

   private $pdo;

   public function __construct()
   {



   }


   protected function PDO()
   {

     if($this->pdo === null)
       {
         $this->pdo = new PDO("mysql:host=localhost;dbname=stage_blog",'root','');//localhost
         //$this->pdo = new PDO("mysql:host=localhost;dbname=id5072384_stageblog",'id5072384_yanick007','yanick@007');//000webhost
         $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       }
       return $this->pdo;

     }


     protected function prepare($statement,$data)
     {
          $prepare = $this->PDO()->prepare($statement);
          $prepare->execute($data);
          return $prepare;

      }


     protected function query($statement)
     {
          $query = $this->PDO()->query($statement);
          return $query;

       }


       protected function query_result($statement)
       {
            $query = $this->PDO()->query($statement);
            $results = $query->fetch();
            return $results;

         }


         protected function get_user()
         {

            $curId = intval($_GET['id']);
            $cur_user = $this->PDO()->prepare("SELECT * FROM users WHERE id=?");
            $cur_user->execute(array($curId));
            $get_user_grade = $cur_user->fetch();
            return $get_user_grade;

         }


}

 ?>
