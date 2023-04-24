<?php
include 'connection.php';

if (!array_key_exists('byId', $_POST)) unset($_POST['id']);
unset($_POST['byId']);
$query = 'delete from products where ';
if (array_key_exists('id', $_POST)) $query .= 'id=' . $_POST['id'] . ';';
else $query .= 'name=\'' . $_POST['name'] . '\';';
if ($query === 'delete from products where id=;' || $query === 'delete from products where name=\'\';') { echo 'Nenhum dado alterado'; return; }

if ($connection->query($query) === TRUE) {
    echo 'Database updated';
} else {
    echo 'Query error (' . $connection->errno . '): ' . $connection->error;
}
?>
