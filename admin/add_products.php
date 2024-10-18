<?php
include '../Conn.php';
if (isset($_POST['submit'])) {
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pqty = $_POST['pqty'];
    $ptype = $_POST['ptype'];

    if ($pname != "" && $pqty != "" && $pprice != "" && $ptype != "" && isset($_FILES['pimage'])) {
        $targetDir = "product_img/"; 
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $imageName = basename($_FILES["pimage"]["name"]);
        $targetFilePath = $targetDir . $imageName;
        $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif','webp','avif');
        if (in_array($imageFileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["pimage"]["tmp_name"], $targetFilePath)) {
                $sql = "INSERT INTO products (name, price, qty, ptype, image) VALUES ('$pname', '$pprice', '$pqty', '$ptype', '$targetFilePath')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header("Location: dashboard.php");
                    exit();
                } else {
                    die(mysqli_error($conn));
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
        }
    } else {
        echo "Please fill in all fields and upload an image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
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
                <img src="https://d3zr9vspdnjxi.cloudfront.net/sites/karenma1/bgr/7152541_P1007213-JPG.jpg?34d924eb8e4eabcbdec6eef56d35c087" alt="" srcset="">
            </div>
            <div class="form_section text-center">
                <h2>Add Product</h2>
                <div>
                    <form action="" method="post" id="ProductForm" enctype="multipart/form-data">
                        <input type="file" name="pimage" id="pimage" accept="image/*" required> <br>
                        <input type="text" name="pname" id="pname" placeholder="Enter Product Name..."> <br>
                        <input type="number" name="pprice" id="pprice" placeholder="Enter Product Price..."> <br>
                        <input type="number" name="pqty" id="pqty" placeholder="Enter Product Quantity..."> <br>
                        <select name="ptype" id="ptype" style=" width: 80%;padding: 10px;margin: 10px 0;">
                            <option value="" disable selected>Select</option>
                            <option value="paintings">Paintings</option>
                            <option value="statues">Statues</option>
                            <option value="Home Decoration">Home Decoration</option>
                        </select><br>
                        <button class="btn btn-warning mt-2 w-25 mb-4" name="submit" type="submit">Add One</button>
                    </form>
                </div>
                <a href="dashboard.php" class="text-decoration-none text-dark">Cancel and Go Back</a>
            </div>
        </div>
    </div>
    <div class="error_message container alert alert-danger" style="display: none;">
        <div id="message_content">Error</div>
    </div>

    <script>
        function displayError(event, message) {
            event.preventDefault();
            const error_message = document.querySelector(".error_message");
            const message_content = document.getElementById("message_content");
            error_message.style.display = 'block';
            message_content.textContent = message;
            setTimeout(() => {
                error_message.style.display = 'none';
            }, 3000);
        }
        
        document.getElementById('ProductForm')?.addEventListener('submit', function (event) {
            const uname = document.getElementById("pname")?.value;
            const uprice = document.getElementById("pprice")?.value;
            const uqty = document.getElementById("pqty")?.value;

            if (!uname || !uprice || !uqty) {
                displayError(event, "Fill All The Data");
                return;
            }
            if (uprice < 0) {
                displayError(event, "Invalid Price!! Please Enter a Valid Price");
                return;
            }
            if (uqty < 0) {
                displayError(event, "Invalid Qty!! Please Enter a Valid Quantity");
                return;
            }
        });
    </script>
</body>
</html>
