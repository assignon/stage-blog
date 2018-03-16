<?php

function pdo()
{

    $pdo = new PDO("mysql:host=localhost;dbname=stage_blog",'root','');
    //$pdo = new PDO("mysql:host=localhost;dbname=id5072384_stageblog",'id5072384_yanick007','yanick@007');//000webhost
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


     return $pdo;


}

 ?>
