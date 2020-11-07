<?php
include 'index.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Dashboard</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
</head>

<body class="home">

    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h2 class="card-title text-center">Welcome Home</h2><br>
                <h3>Session:<?php
                    echo $_SESSION['username'];
                    ?></h3>
                <h3>Name:<?php echo $_SESSION['fullname']; ?></h3>
                <h3>Email:<?php echo $_SESSION['email']; ?></h3>
                <h3><?php echo $_SESSION['photo']; ?></h3>
                <img src="images/<?php echo $_SESSION['photo']; ?>" alt= "photo" >
            </div><br>
            <div class="col-lg-3">
                <form method="POST" action="index.php">
                <button class="btn btn-lg btn-primary btn-block text-uppercase" id="logoutbutton" type="submit" name="logout">
                    <a href="http://localhost/phplogin/login.php">Log out</a>
                </button>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" id="logoutbutton" type="submit" name="resetpassword">
                    <a href="http://localhost/phplogin/changepassword.php">Change password</a>
                </button>

                </form>
               
            </div>


        </div>
    </div>
    </div>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>

</html>