<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
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
                <h5 class="card-title text-center">Register</h5>
                <form class="form-signin">
                  <div class="form-label-group">
                    <input type="text" id="firstname" name="fname" class="form-control" placeholder="First Name" required autofocus>
                    <label for="firstname">First Name</label>
                  </div>
                  <div class="form-label-group">
                    <input type="text" id="lastname" name="lname" class="form-control" placeholder="Last Name" required autofocus>
                    <label for="lastname">Last Name</label>
                  </div>
    
                  <div class="form-label-group">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required>
                    <label for="email">Email address</label>
                  </div>
                  <div class="form-label-group">
                    <input type="text" id="city" name="city" class="form-control" placeholder="City of Residence" required>
                    <label for="city">City</label>
                  </div>
                  <div class="form-label-group">
                    <input type="file" id="photo" name="photo" class="form-control" placeholder="Profile Photo" required>
                    <label for="photo">Profile Photo</label>
                  </div>
                 
                  <hr>
    
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    <label for="inputPassword">Password</label>
                  </div>
                  
                  <div class="form-label-group">
                    <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" required>
                    <label for="inputConfirmPassword">Confirm password</label>
                  </div>
    
                  <button class="btn btn-lg btn-info btn-block text-uppercase" type="submit">Register</button>
                 <li><a class="d-block text-center mt-2 small" href="http://localhost/phplogin/login.php">Log In</a></li> 
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