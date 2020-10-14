<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card card-signin flex-row my-5">
              <div class="card-img-left d-none d-md-flex">
                 <!-- Background image for card set in CSS! -->
              </div>
              <div class="card-body">
                <h5 class="card-title text-center">Change Password</h5>
                <form class="form-signin" >               
                  <hr>

                  <div class="form-label-group">
                    <input type="password" id="inputPassword" name ="password" class="form-control" placeholder="Password" required>
                    <label for="inputPassword">Password</label>
                  </div>   
                  <div class="form-label-group">
                    <input type="password" id="inputConfirmPassword" name="confirmpassword" class="form-control" placeholder="Password" required>
                    <label for="inputConfirmPassword">Confirm password</label>
                  </div>
                  <button class="btn btn-lg btn-warning btn-block text-uppercase" type="submit"name="resetpassword" >Change Password</button>
                 
                  <a class="d-block text-center mt-2 small" href="http://localhost/phplogin/login.php">Log in</a>
                  <hr class="my-4">
                  <!-- <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign up with Google</button>
                  <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign up with Facebook</button> -->
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
</html>
