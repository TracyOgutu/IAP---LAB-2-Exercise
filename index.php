<?php
    include_once 'user.php';
    include_once 'db.php';

    $con = new DBConnector();
    $pdo = $con->connectToDB();
    if(isset($_POST["register"])){
        //Setting variables  $useremail;
        // protected $usercity;
        // protected $profile_photo;
        $fullName=$_POST['fullName'];
        $username=$_POST['username'];
        $useremail=$_POST['email'];
        $usercity=$_POST['city'];
        $profile_photo=$_POST['photo'];
        $password=password_hash($_POST['password'],PASSWORD_DEFAULT);

        //creating an object from the user class
        $person=new User($username,$password);
        $person->setFullName($fullName);
        $person->setEmail($useremail);
        $person->setCity($usercity);
        $person->setProfilePhoto($profile_photo);


        echo $person->register($pdo);
        header("Location: http://localhost/phplogin/login.php"); 

    }

    if(isset($_POST["login"])){
        //Setting variables
        $username=$_POST['username'];
        $password=$_POST['password'];

        //Creating an object from the user class
        $person=new User($username,$password);
        echo $person->login($pdo);
        header("Location: http://localhost/phplogin/home.php"); 
    }

?>