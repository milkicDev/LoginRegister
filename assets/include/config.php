<?php 
//define('db_host', 'localhost');
//define('db_user', 'milkicin_test');
//define('db_password', 'MP1FRc#?OrXP');
//define('db_name', 'milkicin_test');

define('db_host', 'localhost');
define('db_user', 'root');
define('db_password', 'root');
define('db_name', 'newsite');

$conn = new mysqli(db_host, db_user, db_password, db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>