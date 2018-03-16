<?php

require 'db_connect.php';

$pdo = pdo();

$get_users = $pdo->query('SELECT * FROM users');

require '../../views/baseTemplates/users.temp.php';

 ?>
