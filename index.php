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
    $password = $_POST['password'];

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
    $username=$_POST["myusername"];
    $password=$_POST["mypassword"];
    $user = new User($username, $password);
    echo $user->login($pdo);
    
    
        
    }
// include_once 'user.php';
//     include_once 'db.php';

//     $con = new DBConnector();
//     $pdo = $con->connectToDB();

//     $event = $_POST['event'];
//     if($event == "register"){
//         //register
//         $fullName = $_POST['fullName'];
//         $useremail = $_POST["useremail"];
//         $usercity = $_POST["usercity"];
//         $profile_photo = $_POST["profile_photo"];
//         $username = $_POST['username'];
//         $password = $_POST['password'];
//         $user = new User($username, $password);
//         $user->setFullName($fullName);
//         $user->setEmail($useremail);
//         $user->setCity($usercity);
//         $user->setProfilePhoto($profile_photo);

//         echo $user->register($pdo);
//     }else {
//         //login
//         $username = $_POST['username'];
//         $password = $_POST['password'];
//         $user = new User($username, $password);
//         echo $user->login($pdo);
//     } 

?>



