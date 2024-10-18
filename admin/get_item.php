<?php
    include "../Conn.php";

    // Check if 'id' is set in the GET request
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Fetch the product data using the ID
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);  // 'i' specifies that $id is an integer
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Check if the product exists
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "No product found!";
            exit();
        }
    } else {
        echo "Invalid request!";
        exit();
    }
?>

<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../form.css">
    <title>Art Gallery</title>
</head>
<body>
<div class="login_section container">
        <div class="login_form">
            <div class="img_section">
                <img src="<?php echo $row['image']?>" alt="" srcset="" style="object-fit:contain;padding:5px 0;">
            </div>
            <div class="form_section text-center">
                <h2>Add Product</h2>
                <div>
                <form action="update_item.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="text" name="pname" id="pname" placeholder="Enter Product Name..."  value="<?php echo $row['name']; ?>"> <br>
                    <input type="number" name="pprice" id="pprice" placeholder="Enter Product Price..." value="<?php echo $row['price']; ?>"> <br>
                    <input type="number" name="pqty" id="pqty" placeholder="Enter Product Quantity..." value="<?php echo $row['qty']; ?>"> <br>
                    <select name="ptype" id="ptype" style=" width: 80%;padding: 10px;margin: 10px 0;">
                        <option value="" disable selected>Select</option>
                        <option value="paintings" <?php if ($row['ptype'] == 'paintings') echo 'selected'; ?>>Paintings</option>
                        <option value="statues" <?php if ($row['ptype'] == 'statues') echo 'selected'; ?>>Statues</option>
                        <option value="Home Decoration" <?php if ($row['ptype'] == 'Home Decoration') echo 'selected'; ?>>Home Decoration</option>
                    </select><br>
                    <button class="btn btn-warning mt-2 w-25 mb-4" name="submit" type="submit"><i class="mdi mdi-update:"></i>Update</button>
                </form>
                </div>
                <a href="dashboard.php" class="text-decoration-none text-dark">Cancel and Go Back</a>
            </div>
        </div>
    </div>
    
</form>
</body>
</html>