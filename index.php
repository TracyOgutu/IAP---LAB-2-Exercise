<?php

include_once 'user.php';
include_once 'db.php';

$con = new DBConnector();
$pdo = $con->connectToDB();

if (isset($_POST["register"])) {
    //Setting variables  $useremail;
    // protected $usercity;
    // protected $profile_photo;
    $fullName = $_POST["fullName"];
    $useremail = $_POST["email"];
    $usercity = $_POST["city"];
    $profile_photo = $_POST["photo"];
    $username = $_POST["username"];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //creating an object from the user class
    $person = new User($username, $password);
    $person->setFullName($fullName);
    $person->setEmail($useremail);
    $person->setCity($usercity);
    $person->setProfilePhoto($profile_photo);

    echo $person->register($pdo);
    header("Location: http://localhost/phplogin/login.php");
}

if(isset($_POST["loginuser"])){
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        $message = '<label>All fields are required</label>';
    } else {

    $username=$_POST["username"];
    $password=password_hash($_POST["password"],PASSWORD_DEFAULT);

    //Creating an object from the user class
    $person=new User($username,$password);
    $person->setUsername($username);
    $person->setPassword($password);
    echo $person->login($pdo);
    header("Location: http://localhost/phplogin/home.php"); 
        
    }
}



