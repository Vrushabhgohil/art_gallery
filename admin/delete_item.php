<?php
    include "../Conn.php";
    if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $sql = "DELETE FROM products WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: products.php");
    } 
    mysqli_close($conn);
} 
?>