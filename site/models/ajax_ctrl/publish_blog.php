<?php

require 'db_connect.php';
require 'send_mail.php';

$pdo = pdo();
$title = htmlentities(htmlspecialchars($_GET['titel']));

$publish = $pdo->prepare("UPDATE blog SET publish=? WHERE title=?");
$publish->execute(array(1, $title));

$users_emails = $pdo->query('SELECT email FROM users');

while($fetch_emails = $users_emails->fetch())
{

   $emails = $fetch_emails['email'];

     send_mail(
       "Nieuw blog toegevoegd aan de site",
       "
       Een nieuw blog is gepubliceerd"."<br/>
       Blog naam: ".$title."<br/>
       Blog link: https://yanick-stageblog.000webhostapp.com/stageBlog/index.php?req=login<br/>
       Met vriendelijke groete,<br/>
       Yanick Assignon<br/>
       ",
       "yanick",
       "21866@ma-web.nl",
       $emails

     );

}

echo "blog published";

 ?>
