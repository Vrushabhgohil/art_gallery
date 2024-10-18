<?php
    include 'Conn.php';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        if ($name !="" && $password != "" && $email != ""){
            $sql = "insert into `user`(name,email,password) values ('$name','$email','$password')";
            $result = mysqli_query($conn,$sql);
            if($result){
                header("Location: login.php");  
                exit();
            }
            else{
                die(mysqli_error($conn));
            }
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Art Gallary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="form.css">
</head>

<body>
<div class="login_section container">
        <div class="login_form">
            <div class="img_section">
                <img src="./image/signup_img.jpg" alt="" srcset="">
            </div>
            <div class="form_section text-center">
                <h2>Signup</h2>
                <div>
                    <form method="post" id="SignupForm">
                        <input type="text" name="name" id="name" placeholder="Enter Username..."> <br>
                        <input type="email" name="email" id="email" placeholder="Enter Email Address..."> <br>
                        <input type="password" name="password" id="password" placeholder="Enter Password..."> <br>
                        <input type="password" name="cpassword" id="cpassword" placeholder="Enter Confirm Password...">
                        <br>
                        <a href="login.php" class="text-decoration-none text-dark">
                            <p class="mt-2">If You Have Account....</p>
                        </a> <br>
                        <button class="btn btn-warning mt-2 w-25" type="submit" value="submit" name="submit">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
            
                    </div>
                </div>
            <div class="error_message container alert alert-danger">
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
        document.getElementById('SignupForm')?.addEventListener('submit', function (event) {
            const uname = document.getElementById("name")?.value;
            const uemail = document.getElementById("email")?.value;
            const upassword = document.getElementById("password")?.value;
            const ucpassword = document.getElementById("cpassword")?.value;

            const regex_pswd = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            const regex_email = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (!uname || !uemail || !upassword || !ucpassword) {
                displayError(event, "Fill All The Data");
                return;
            }
            if (!regex_pswd.test(upassword)) {
                displayError(event, "Invalid Password!! Please Enter a Strong Password");
                return;
            }
            if (!regex_email.test(uemail)) {
                displayError(event, "Invalid Email!!");
                return;
            }
            if (upassword !== ucpassword) {
                displayError(event, "Password and Confirm Password Don't Match");
                return;
            }
        });

    </script>

</body>

</html> 