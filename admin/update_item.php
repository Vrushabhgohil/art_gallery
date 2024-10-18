<?php
    include "../Conn.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $name = $_POST['pname'];
        $price = $_POST['pprice'];
        $qty = $_POST['pqty'];
        $ptype = $_POST['ptype'];

        $sql = "UPDATE products SET name = '$name', price = $price, qty = $qty, ptype='$ptype' WHERE id = $id";
        $result = mysqli_query($conn,$sql);

        if ($result) {
            header("Location: products.php");  
        } else {
            echo "Error updating product: " . $conn->error;
        }
    }
?>
