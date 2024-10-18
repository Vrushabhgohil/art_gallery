<?php
    include "Conn.php";  
    $sql = "SELECT * FROM products ORDER BY added_at DESC";
    $result = $conn->query($sql);
    $sql1 = "SELECT * FROM products ORDER BY price DESC";
    $result1 = $conn->query($sql1);
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
    <title>Art Gallary</title>
</head>

<body>
    <div class="top_section container">
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

        <div class="main_section">
            <div class="slider-container">
                <button class="arrow" id="prev"><i class="fa-solid fa-less-than"></i></button>
                <button class="arrow" id="next"><i class="fa-solid fa-greater-than"></i></button>
                <div class="slider">
                    <div class="slides">
                        <div class="slide">
                            <img src="https://gaurangacreativearts.com/wp-content/uploads/2023/12/The-Role-of-Art-in-Social-Change-and-Awareness-min.png" alt=""
                                srcset="">
                        </div>
                        <div class="slide">
                            <img src="https://www.himanshuartinstitute.com/art-and-craft-workshops/drawing-painting-art-and-craft-workshop-for-adults/art-and-craft-workshops-for-adults/thumbs/art-of-waste-material-workshop-online-art-and-craft-classes.jpg"
                                alt="" srcset="">
                        </div>
                        <div class="slide">
                            <img src="https://i.ytimg.com/vi/U5h1VNX64Dg/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLBijNBydwQGgW7wQKjRArxDjvi0DA" alt="" srcset="">
                        </div>
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
                        while($row = $result->fetch_assoc()) {
                            $newly_added_products[] = $row;
                            if(count($newly_added_products) == 4) break;
                        }
                        foreach($newly_added_products as $product) {
                ?>
                <div class="product">
                    <img src="admin/<?php echo $product['image']; ?>" alt="">
                </div>
                <?php
                        }
                    }
                ?>
            </div>
        </div>

        <div class="new_product_section">
            <h3 class="mt-5">Premium Products</h3>
            <p>Here are the most expensive products*</p>
            <div class="product_section">
                <?php
                    if ($result1->num_rows > 0) {
                        $newly_added_products = array();
                        while($row1 = $result1->fetch_assoc()) {
                            $newly_added_products[] = $row1;
                            if(count($newly_added_products) == 4) break;
                        }
                        foreach($newly_added_products as $product1) {
                ?>
                <div class="product">
                    <img src="admin/<?php echo $product1['image']; ?>" alt="">
                </div>
                <?php
                        }
                    }
                ?>
            </div>
        </div>

        </div>
    </div>
    <div class="bottom_section">
        <div class="contect_us_section text-center mt-5">
            <h3 class="mt-5 mb-4">Contect Us</h3>
            <div class="form">
                <form action="#" method='post'>
                <input type="text" name="uname" id="" placeholder="username"><br>
                <input type="email" name="uemail" id="" placeholder="email address"><br>
                <textarea name="description" id="" placeholder="Enter Your Query"></textarea><br>

                <button class="btn btn-warning mt-4">Submit</button>
                </form>
            </div>
        </div>

        <div class="footer_section">
            <div class="logo_section">
                <div class="logo">
                   <img src="image\logo.png"
                        alt="" srcset="">
                </div>
                <p>Synergy Sports Shop is a cutting-edge sports shop management system designed to 
                    streamline the operations and enhance the experience of sports retailers of all sizes. 
                    Whether you are a small boutique sports store or a large chain, our platform provides
                    the tools you need to manage your inventory, sales, and customer interactions seamlessly</p>
            </div>
            <div class="menu_section">
                <h3>Menus</h3><br>
                <a href="products.php" class="text-decoration-none text-dark">Products</a> <br>
                <a href="aboutsus.html" class="text-decoration-none text-dark">About Us</a><br>
                <a href="profile.html" class="text-decoration-none text-dark">Profile</a><br>
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
    </div>
    <script src="slider.js"></script>
</body>


</html>