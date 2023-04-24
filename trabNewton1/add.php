<?php
include 'connection.php';

foreach ($_POST as $key => $value) if ($value === '') unset($_POST[$key]);
$query = 'insert into products (';
$i = 0;
foreach ($_POST as $key => $value) {
    if ($i === 0)
        $query .= $key;
    else
        $query .= ', ' . $key;
    $i++;
}
$query .= ') values (';
$i = 0;
foreach ($_POST as $key => $value) {
    if ($key === 'name' || $key === 'description') $value = '\'' . $value . '\'';
    if ($i === 0)
        $query .= $value;
    else
        $query .= ', ' . $value;
    $i++;
}
$query .= ');';

if ($connection->query($query) === TRUE) {
    echo 'Database updated';
} else {
    echo 'Query error (' . $connection->errno . '): ' . $connection->error;
}
?>
