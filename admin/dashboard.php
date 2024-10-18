<?php
    include "../Conn.php";  
    $sql = "SELECT * FROM user LIMIT 4";
    $count_sql = "SELECT COUNT(*) as total FROM user";
    $count_result = $conn->query($count_sql);
    $total_users = 0;

    if ($count_result->num_rows > 0) {
        $row = $count_result->fetch_assoc();
        $total_users = $row['total'];
    }
    $count_sql = "SELECT COUNT(*) as total FROM products";
    $count_result = $conn->query($count_sql);
    $total_products = 0;

    if ($count_result->num_rows > 0) {
        $row = $count_result->fetch_assoc();
        $total_products = $row['total'];
    }
    $sql2 = "SELECT * FROM products LIMIT 4";
    $result2 = $conn->query($sql2);
    $result = $conn->query($sql);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Art Gallary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../home.css">
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <div class="main container">
        <div class="header">
            <div class="logo">
                <a href="dashboard.php">
                   <img src="../image/logo.png"
                        alt="" srcset="">
                </a>
            </div>
            <div class="menu">
                <div>
                    <a href="products.php" class="text-decoration-none text-dark">Products List</a>
                </div>
                <div>
                    <a href="users.php" class="text-decoration-none text-dark">Users List</a>
                </div>
                <div>
                    <a href="add_products.php" class="text-decoration-none text-dark">Add Product</a>
                </div>
            </div>
        </div>
        <div class="short_details">
            <div class="one">
                <p>
                    <?php echo $total_users?><br>Customers
                </p>
            </div>
            <div class="one">
                <p>
                <?php echo $total_products?><br>Products
                </p>
            </div>
            <div class="one">
                <p>
                    50 + <br>Stores
                </p>
            </div>
        </div>

        <div class="users_details">
            <div class="details">
                <h4 style="font-size: 20px;color: gray;" class="mb-3">USER'S INFORMATION</h4>
                <table border="1" align="center">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    <?php
                    if ($result->num_rows > 0) {
                        $count = 1; 
                        while($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                </tr>
                <?php
                        }
                    }
                ?>
                </table>
            </div>
            <div class="details_img">
                <img src="https://codedthemes.com/wp-content/uploads/edd/2024/04/img.webp" alt="" srcset=""
                    class="w-100">
            </div>
        </div>
        <div class="users_details">

            <div class="details_img">
                <img src="https://cdni.iconscout.com/illustration/premium/thumb/admin-login-illustration-download-in-svg-png-gif-file-formats--analytics-logo-action-people-illustrations-4297423.png?f=webp"
                    alt="" srcset="" class="w-100">
            </div>
            <div class="details">
                <h4 style="font-size: 20px;color: gray;text-align: right;" class="mt-5">PRODUCT'S INFORMATION</h4>
                <table border="1" align="center">
                    <tr>
                        <th>No.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                    </tr>
                    <?php
                    if ($result2->num_rows > 0) {
                        $count = 1; 
                        while($row = $result2->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><img src="<?php echo htmlspecialchars($row['image']); ?>" alt="" srcset="" style="width:80px;height:80px"></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['price']); ?></td>
                        <td><?php echo htmlspecialchars($row['qty']); ?></td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>