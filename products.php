<?php
    include "Conn.php";  
    $sql = "SELECT * FROM products ORDER BY added_at DESC";
    $result = $conn->query($sql);
    if (isset($_POST['add_cart'])) {
        $productName = $_POST['product_name'];
        echo "<div class='alert alert-success text-center'>{$productName} has been added to the cart successfully!</div>";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="home.css">
    <style>
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            background-color: rgba(0, 0, 0, 0.5); 
            overflow: auto;  
            padding: 10px; 
        }

    .modal-content {
        background-color: #fff;
        margin: 7%; 
        padding: 25px;
        border-radius: 10px; 
        width: 60%; 
        max-width: 600px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 6px 20px rgba(0, 0, 0, 0.1); 
        position: relative;
    }
    .close {
        color: #aaa;
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover, .close:focus {
        color: black;
    }

    .modal-content img {
        width: 100%; 
        max-height: 300px;
        object-fit: contain; 
        margin-bottom: 15px;
    }

    .modal-content h4 {
        margin-top: 0;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .modal-content p {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .modal-content button {
        background-color: dodgerblue;
        color: white;
        padding: 10px 20px;
        border: none;
        margin:0 25%;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .modal-content button:hover {
        background: transparent;
        border:1px solid dodgerblue;
        color:dodgerblue;
    }
    @media (max-width:770px) {
        .modal-content{
            width: 85%;
        }  
    }


    </style>
    <title>Products</title>
</head>

<body>
    <div class="main_products_section container">
        <div class="header">
            <div class="logo">
                <a href="home.php">
                   <img src="image\logo.png"
                        alt="" srcset="">
                </a>
            </div>
            <div class="menu">
                <div>
                    <a href="products.php" class="text-decoration-none text-dark">Products</a>
                </div>
                <div>
                    <a href="aboutsus.html" class="text-decoration-none text-dark">About Us</a>
                </div>
                <div>
                    <a href="profile.php" class="text-decoration-none text-dark">Profile</a>
                </div>
            </div>
        </div>

        <div class="new_product_section">
            <h3 class="mt-5">Newly Added</h3>
            <p>Here are the newly added products*</p>
            <div class="product_section">
                <?php
                    if ($result->num_rows > 0) {
                        $newly_added_products = array();
                        $index = 0;
                        while($row = $result->fetch_assoc()) {
                            $newly_added_products[] = $row;
                            if(count($newly_added_products) == 4) break;
                        }
                        foreach($newly_added_products as $product) {
                ?>
                <div class="product" data-index="<?php echo $index; ?>">
                    <img src="admin/<?php echo $product['image']; ?>" alt="Product Image" onclick="openModal(<?php echo $index; ?>)">
                </div>
                <div class="modal" id="modal-<?php echo $index; ?>">
                    <div class="modal-content">
                        <img src="admin/<?php echo $product['image']; ?>" alt="Product Image" class="pimage">
                        <h4><?php echo $product['name']; ?></h4>
                        <p>Price: Rs <?php echo $product['price']; ?></p>
                        <form method="post">
                            <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
                            <button name="add_cart" type="submit">Add to Cart</button>
                        </form>
                    </div>
                </div>
                <?php
                            $index++;
                        }
                    }
                ?>
            </div>
        </div>


        <div class="new_product_section">
            <h3 class="mt-5">Paintings</h3>
            <p>Here are the paintings*</p>
            <div class="product_section">
                <?php
                    $painting_products = array();
                    $result->data_seek(0); // reset the result pointer
                    while($row = $result->fetch_assoc()) {
                        if($row['ptype'] == 'paintings') {
                            
                ?>
               <div class="product" data-index="<?php echo $index; ?>">
                    <img src="admin/<?php echo $row['image']; ?>" alt="Product Image" onclick="openModal(<?php echo $index; ?>)">
                </div>
                <div class="modal" id="modal-<?php echo $index; ?>">
                    <div class="modal-content">
                        <img src="admin/<?php echo $row['image']; ?>" alt="Product Image" class="pimage">
                        <h4><?php echo $row['name']; ?></h4>
                        <p>Price: Rs <?php echo $row['price']; ?></p>
                        <form method="post">
                            <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                            <button name="add_cart" type="submit">Add to Cart</button>
                        </form>
                    </div>
                </div>
                <?php
                            $index++;
                        }
                    }
                ?>
                
            </div>
        </div>

        <div class="new_product_section">
            <h3 class="mt-5">Statues</h3>
            <p>Here are the statues*</p>
            <div class="product_section">
                <?php
                    $statue_products = array();
                    $result->data_seek(0); // reset the result pointer
                    while($row = $result->fetch_assoc()) {
                        if($row['ptype'] == 'statues') {
                            $statue_products[] = $row;
                            if(count($statue_products) == 4) break;
                        }
                    }
                    foreach($statue_products as $row) {
                ?>
                <div class="product" data-index="<?php echo $index; ?>">
                    <img src="admin/<?php echo $row['image']; ?>" alt="Product Image" onclick="openModal(<?php echo $index; ?>)">
                </div>
                <div class="modal" id="modal-<?php echo $index; ?>">
                    <div class="modal-content">
                        <img src="admin/<?php echo $row['image']; ?>" alt="Product Image" class="pimage">
                        <h4><?php echo $row['name']; ?></h4>
                        <p>Price: Rs <?php echo $row['price']; ?></p>
                        <form method="post">
                            <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                            <button name="add_cart" type="submit">Add to Cart</button>
                        </form>
                    </div>
                </div>
                <?php
                            $index++;
                        }
                ?>
            </div>
        </div>

        <div class="new_product_section">
            <h3 class="mt-5">Home Decoration</h3>
            <p>Here are the Home Decoration*</p>
            <div class="product_section">
                <?php
                    $statue_products = array();
                    $result->data_seek(0); // reset the result pointer
                    while($row = $result->fetch_assoc()) {
                        if($row['ptype'] == 'Home Decoration') {
                            $statue_products[] = $row;
                            if(count($statue_products) == 4) break;
                        }
                    }
                    foreach($statue_products as $row) {
                ?>
                <div class="product" data-index="<?php echo $index; ?>">
                    <img src="admin/<?php echo $row['image']; ?>" alt="Product Image" onclick="openModal(<?php echo $index; ?>)">
                </div>
                <div class="modal" id="modal-<?php echo $index; ?>">
                    <div class="modal-content">
                        <img src="admin/<?php echo $row['image']; ?>" alt="Product Image" class="pimage">
                        <h4><?php echo $row['name']; ?></h4>
                        <p>Price: Rs <?php echo $row['price']; ?></p>
                        <form method="post">
                            <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                            <button name="add_cart" type="submit">Add to Cart</button>
                        </form>
                    </div>
                </div>
                <?php
                            $index++;
                        }
                ?>
            </div>
        </div>

    </div>
    <hr>
<div class="footer_section">
    <div class="logo_section">
        <div class="logo">
        <img src="image\logo.png"
        alt="" srcset="">
        </div>
        <p>The Gallery is a cutting-edge art gallery management system designed to streamline the operation and
            enhance the experience of art galleries of all sizes. Whether you are a small boutique gallery or a
            large institution, our platform provides the tools you need to manage your exhibitions, collections,
            and visitor interactions seamlessly.</p>
    </div>
    <div class="menu_section">
        <h3>Menus</h3><br>
        <a href="products.php" class="text-decoration-none text-dark">Products</a> <br>
        <a href="aboutsus.html" class="text-decoration-none text-dark">About Us</a><br>
        <a href="signup.html" class="text-decoration-none text-dark">Signup</a><br>
    </div>
    <div class="details_section">
        <h3>Contact Details</h3> <br>
        <div class="details mt-4">
        <p>Email </p>
        <h6>thegallary@gmail.com</h6><br>
        <p>Tel </p>
        <h6>+9112345 67890</h6><br>
        
    </div>
    </div>
</div>
<script>
    function openModal(index) {
    var modal = document.getElementById('modal-' + index);
    modal.style.display = "block";
    }

    // Function to close a specific modal based on index
    function closeModal(index) {
        var modal = document.getElementById('modal-' + index);
        modal.style.display = "none";
    }

    // Close the modal if the user clicks anywhere outside of the modal content
    window.onclick = function(event) {
        var modals = document.getElementsByClassName('modal');
        for (var i = 0; i < modals.length; i++) {
            if (event.target == modals[i]) {
                modals[i].style.display = "none";
            }
        }
    }
</script>
</body>

</html>