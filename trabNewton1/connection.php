<?php
$connection = new mysqli('localhost', 'root', 'M4rcinho!', 'trabnewton1', '3306');

if ($connection->connect_errno) {
    die('Database Connection error (' . $connection->connect_errno . '): ' . $connection->connect_error);
}

?>
