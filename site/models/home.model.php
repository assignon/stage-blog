<?php

require "../stageBlog/site/core/model.php";

class Home_model extends Model
{

   private $blogs;
   public function __construct()
   {



   }

   public function cur_user()
   {

      $cur_user = $this->get_user();
      return $cur_user;

   }


   public function display_publish_blog()
   {

       $blogs = $this->prepare('SELECT title, blog_image, blog_content, favo_img, visited, publish, DATE_FORMAT(date_added,"%d/%m/%Y") AS date_added FROM blog WHERE publish=?', array(1));

       if($blogs->rowCount() > 0)
       {

         while($blog = $blogs->fetch())
         {

            require "../stageBlog/site/views/baseTemplates/blog.temp.php";

         }

       }


   }


   public function display_unpublish_blog()
   {

        $blogs = $this->prepare('SELECT title, blog_image, blog_content, favo_img, visited, publish, DATE_FORMAT(date_added,"%d/%m/%Y") AS date_added FROM blog WHERE publish=?', array(0));

        if($blogs->rowCount() > 0)
        {

          while($blog = $blogs->fetch())
          {

             require "../stageBlog/site/views/baseTemplates/blog.temp.php";

          }

      }

  }

}

 ?>
