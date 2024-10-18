<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'crud';
    $conn = new mysqli($server,$username,$password,$database);

    if(!$conn){
        die(mysqli_error($conn));
    }
?>