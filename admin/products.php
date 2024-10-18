<?php
    include "../Conn.php";  
    $sql = "SELECT * FROM products ";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Art Gallary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="lists.css">
</head>

<body>
    <div class="list_section container">
        <div class="details mb-5">
            <a href="dashboard.php" class="text-decoration-none text-dark">Back</a>
            <h4 style="font-size: 20px;color: gray;" class="m-5">PRODCUTS'S INFORMATION</h4>
            <table border="1" align="center">
                <tr>
                    <th>No.</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Date</th>
                    <th>Operations</th>
                </tr>
                <?php
                    if ($result->num_rows > 0) {
                        $count = 1; 
                        while($row = $result->fetch_assoc()) {
                    ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><img src="<?php echo htmlspecialchars($row['image']); ?>" alt="" srcset="" style="width:80px;height:80px"></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['price']); ?></td>
                    <td><?php echo htmlspecialchars($row['qty']); ?></td>
                    <td><?php echo htmlspecialchars($row['added_at']); ?></td>
                    <td> 
                        <form action="get_item.php" method="get">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button class="btn btn-danger w-75 mt-2" type="submit">Edit</button>
                        </form>

                        <form action="delete_item.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <button class="btn btn-primary w-75 mt-2" type="submit">Delete</button>
                        </form>

                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
            </table>
        </div>
    </div>
</body>

</html>