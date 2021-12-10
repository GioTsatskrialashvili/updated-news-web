<?php

$serverName = 'localhost';
$username = 'root';
$password = '';
$dbname = 'news';

$conn = mysqli_connect($serverName, $username, $password, $dbname);
mysqli_set_charset($conn, 'utf8');
if(!$conn){
    echo "connection failed";
    exit;
}
function getAll($sql){
    global $conn;
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC); // [ [], [] ]
}


function getFirst($sql){
    global $conn;
    $result = mysqli_query($conn, $sql);
    if($result){
        return mysqli_fetch_assoc($result);
    }else{
        return null;
    }
     // []
}


function query($sql) {
    global $conn;
    return mysqli_query($conn, $sql);
}?>