<?php
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'trocdetrucs');
define('DB_DSN', 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';port=3306;charset=UTF8');

$dbh = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>