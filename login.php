<?php
    include 'Conn.php';
    
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($email != "" && $password != "") {
            $sql = "SELECT * FROM `user` WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);

            if($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                if($row['status'] == 'block') {
                    $error_message = "Your account has been blocked.";
                } 
                else if($password == $row['password']) {
                    header("Location: home.php");  
                    exit();
                } 
                else {
                    $error_message = "Password doesn't match.";
                }
            } 
            else {
                $error_message = "User doesn't exist.";
            }
        } 
        else {
            $error_message = "Please enter both email and password.";
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
                <img src="./image/Picsart_24-08-12_19-45-39-763.jpg" alt="" srcset="">
            </div>
            <div class="form_section text-center">
                <h2>Login</h2>
                <div>
                    <form method="post" id="LoginForm">
                        <input type="email" name="email" id="email" placeholder="Enter Email Address..."> <br>
                        <input type="password" name="password" id="password" placeholder="Enter Password..."> <br>
                        <br>
                        <a href="signup.php" class="text-decoration-none text-dark">
                            <p class="mt-2">If You Haven't Account....</p>
                        </a> <br>
                        <button class="btn btn-warning mt-2 w-25" type="submit" value="submit" name="submit">
                            Submit
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <?php if (isset($error_message)) : ?>
        <div class="error_message container alert alert-danger" style="display: block;">
            <div id="message_content"><?php echo $error_message; ?></div>
        </div>
    <?php endif; ?>
    <div class="error_message container alert alert-danger" style="display: none;">
        <div id="message_content">Error</div>
    </div>
    <script>
        function displayError(event, message) {
            event.preventDefault();
            const error_message = document.querySelector(".error_message");
            const message_content = document.getElementById("message_content");
            message_content.textContent = message;
            error_message.style.display = 'block';
            setTimeout(() => {
                error_message.style.display = 'none';
            }, 3000);
        }
        document.getElementById('LoginForm')?.addEventListener('submit', function (event) {
            const uemail = document.getElementById("email")?.value;
            const upassword = document.getElementById("password")?.value;

            const regex_pswd = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            const regex_email = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (!uemail || !upassword) {
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
        });

    </script>

</body>

</html>