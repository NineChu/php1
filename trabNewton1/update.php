<?php
include 'connection.php';

foreach ($_POST as $key => $value) if ($value === '') unset($_POST[$key]);
if (!array_key_exists('id', $_POST))
    header('location:' . str_replace('update.php', 'view.php', $_SERVER['PHP_SELF']));

$query = 'update products set ';
$i = 0;
foreach ($_POST as $key => $value) {
    if ($key === 'id') continue;
    if ($key === 'name' || $key === 'description') $value = '\'' . $value . '\'';
    if ($i !== 0)
        $query .= ', ' . $key . '=' . $value;
    else
        $query .= $key . '=' . $value;
    $i++;
}
if ($query === 'update products set ')
    header('location:' . str_replace('update.php', 'view.php', $_SERVER['PHP_SELF']));
$query .= ' where id=' . $_POST['id'] . ';';

if ($connection->query($query) === TRUE) {
    header('location:' . str_replace('update.php', 'view.php', $_SERVER['PHP_SELF']));
} else {
    echo 'Query error (' . $connection->errno . '): ' . $connection->error;
}
?>
