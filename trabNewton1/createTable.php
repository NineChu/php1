<?php
include 'connection.php';

$query = 'create table products(
    id int auto_increment not null unique,
    name varchar(60) not null unique,
    description varchar(120) not null default \'\',
    quantity int not null default 0,
    price float(2) not null default 0.00,
    created_at timestamp default current_timestamp,
    updated_at datetime default current_timestamp on update current_timestamp,
    primary key(id)
    );';
if ($connection->query($query) === TRUE) {
    echo 'Database updated';
} else {
    echo 'Query error (' . $connection->errno . '): ' . $connection->error;
}
?>
