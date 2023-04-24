<?php
include 'connection.php';

if (!array_key_exists('byId', $_POST)) unset($_POST['id']);
unset($_POST['byId']);
foreach ($_POST as $key => $value) if ($value === '') unset($_POST[$key]);
$query = 'update products set ';
if (array_key_exists('id', $_POST)) {
    $i = 0;
    foreach ($_POST as $key => $value) {
        if ($key === 'id') continue;
        if ($key === 'name' || $key === 'description') $value = '\'' . $value . '\'';
        if ($i === 0)
            $query .= $key . '=' . $value;
        else
            $query .= ', ' . $key . '=' . $value;
        $i++;
    }
    if ($query === 'update products set ') { echo 'Nenhum dado alterado'; return; }
    $query .= ' where id=' . $_POST['id'] . ';';
} else {
    $i = 0;
    foreach ($_POST as $key => $value) {
        if ($key === 'name') continue;
        if ($key === 'description') $value = '\'' . $value . '\'';
        if ($i === 0)
            $query .= $key . '=' . $value;
        else
            $query .= ', ' . $key . '=' . $value;
        $i++;
    }
    if ($query === 'update products set ') { echo 'Nenhum dado alterado'; return; }
    $query .= ' where name=\'' . $_POST['name'] . '\';';
}

if ($connection->query($query) === TRUE) {
    header('location:' . str_replace('update.php', 'view.php', $_SERVER['PHP_SELF']));
} else {
    echo 'Query error (' . $connection->errno . '): ' . $connection->error;
}
?>
