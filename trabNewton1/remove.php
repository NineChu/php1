<?php
include 'connection.php';

foreach ($_POST as $key => $value) if ($value === '') unset($_POST[$key]);
if (!array_key_exists('id', $_POST))
    header('location:' . str_replace('remove.php', 'view.php', $_SERVER['PHP_SELF']));

$query = 'delete from products where ' . 'id=' . $_POST['id'] . ';';
if ($query === 'delete from products where id=;') { echo 'Nenhum dado alterado'; return; }

if ($connection->query($query) === TRUE) {
    header('location:' . str_replace('remove.php', 'view.php', $_SERVER['PHP_SELF']));
} else {
    echo 'Query error (' . $connection->errno . '): ' . $connection->error;
}
?>
