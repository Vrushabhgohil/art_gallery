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
    <link rel="stylesheet" href="profile.css">
</head>

<body>
    <div class="one container">
        <a href="home.php" class="text-decoration-none text-dark" style="font-size: 18px;">Back</a>
        <div class="profile_logo mt-4">
            <img src="https://cdn-icons-png.flaticon.com/512/6596/6596121.png" alt="" srcset="">
        </div>

        <div class="profile_details">
            <h4 style="font-size: 20px;color: gray;" class="mt-5">PERSONAL INFORMATION</h4>
            <form action="">
                <div class="input-field mt-4">
                    <label>* Username</label> <br>
                    <input type="text" name="" id="" value="Vrushabh" disabled>
                </div>
                <div class="input-field mt-4">
                    <label>phone number</label> <br>
                    <input type="tel" name="" id="" value="+91 12345 67890" disabled>
                </div>
                <div class="input-field mt-4">
                    <label>* email</label> <br>
                    <input type="email" name="" id="" value="vrushabh@gmail.com" disabled>
                </div>
                <div class="input-field mt-4">
                    <label>Password</label> <br>
                    <input type="password" name="" id="" value="*******" disabled>
                </div>

                <button class="form_submit btn btn-danger"><a href="login.php" class="text-decoration-none text-light">Logout</a></button>
            </form>
        </div>
    </div>
</body>

</html>