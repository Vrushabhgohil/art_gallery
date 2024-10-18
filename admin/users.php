<?php
    include "../Conn.php";  

    // Handle POST request when block button is clicked
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['block_id'])) {
        $id = $_POST['block_id'];  

        $sql = "UPDATE user SET status = 'block' WHERE id = $id";
        $result = mysqli_query($conn,$sql);

        if ($result) {
            echo "<div class='alert alert-success text-center'>User Blocked Successfully!</div>";
        } else {
            echo "<div class='alert alert-danger text-center'>Error: User Is Not Blocked</div>";
        }
    }
    // Handle POST request when block button is clicked
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['unblock_id'])) {
        $id = $_POST['unblock_id'];  

        $sql = "UPDATE user SET status = 'In Use' WHERE id = $id";
        $result = mysqli_query($conn,$sql);

        if ($result) {
            echo "<div class='alert alert-success text-center'>User Unblocked Successfully!</div>";
        } else {
            echo "<div class='alert alert-danger text-center'>Error: User Is Blocked</div>";
        }
    }

    // Fetch all users
    $sql = "SELECT * FROM user";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Art Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="lists.css">
</head>

<body>
    <div class="list_section container">
        <div class="details">
            <a href="dashboard.php" class="text-decoration-none text-dark">Back</a>
            <h4 style="font-size: 20px;color: gray;" class="m-5">USER'S INFORMATION</h4>
            <table border="1" align="center">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Operations</th>
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
                    <td><?php echo htmlspecialchars($row['password']); ?></td>
                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                    <td>
                        <?php
                            $status = htmlspecialchars($row['status']); 
                            if($status == "In Use"){ 
                        ?>
                        <!-- Form to block the user -->
                        <form method="post">
                            <input type="hidden" name="block_id" value="<?php echo $row['id']; ?>">  <!-- Pass the user ID -->
                            <button class="btn btn-primary" type="submit">Block User</button>
                        </form>
                        <?php
                            } else {
                        ?>
                        <form method="post">
                            <input type="hidden" name="unblock_id" value="<?php echo $row['id']; ?>">  <!-- Pass the user ID -->
                            <button class="btn btn-secondary">Blocked User</button>
                        </form>
                        <?php
                            }
                        ?>
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
