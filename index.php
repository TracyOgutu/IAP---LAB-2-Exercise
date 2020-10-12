<?php
    // include_once 'user.php';
    // include_once 'db.php';
    

    // $con = new DBConnector();
    // $pdo = $con->connectToDB();

    // $event = isset($_POST['event']);
    // if($event == "register"){
    //     //register
    //     $fullName = $_POST['fullName'];
    //     $username = $_POST['username'];
    //     $password = $_POST['password'];
    //     $user = new User($username, $password);
    //     $user->setFullName($fullName);
    //     echo $user->register($pdo);
    // }else {
    //     //login
    //     $username = isset($_POST['username']);
    //     $password = isset($_POST['password']);
    //     $user = new User($username, $password);
    //     echo $user->login($pdo);
    // } 

    include_once 'user.php';
    include_once 'db.php';
    

    $con = new DBConnector();
    $pdo = $con->connectToDB();
    if(isset($_POST["register"])){
        //Setting variables
        $fullName=$_POST['fullName'];
        $username=$_POST['username'];
        $password=password_hash($_POST['password'],PASSWORD_DEFAULT);

        //creating an object from the user class
        $person=new User($username,$password);
        $person->setFullName($fullName);

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