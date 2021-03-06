<?php
interface Account
{
    public function register($pdo);
    public function login($pdo);
    public function changepassword($pdo);
    public function logout($pdo);
}
class User implements Account
{
    //properties 
    protected $username;
    protected $password;
    protected $newpassword;
    protected $fullName;
    protected $useremail;
    protected $usercity;
    protected $profile_photo;

    //class constructor 
    function __construct($user, $pass)
    {
        $this->username = $user;
        $this->password = $pass;
    }

    public static function create() {
        $reflection = new ReflectionClass("User");
        $instance = $reflection->newInstanceWithoutConstructor();
        return $instance;
    }

    public function setNewpassword($newpass)
    {
        $this->newpassword = $newpass;
    }
    public function getNewpassword()
    {
        return $this->newpassword;
    }
    public function setUsername($uname)
    {
        $this->username = $uname;
    }
    //full name getter
    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($upass)
    {
        $this->password = $upass;
    }
    //full name getter
    public function getPassword()
    {
        return $this->password;
    }

    //full name setter 
    public function setFullName($name)
    {
        $this->fullName = $name;
    }
    //full name getter
    public function getFullName()
    {
        return $this->fullName;
    }

    public function setEmail($email)
    {
        $this->useremail = $email;
    }
    public function getEmail()
    {
        return $this->useremail;
    }

    public function setCity($city)
    {
        $this->usercity = $city;
    }
    public function getCity()
    {
        return $this->usercity;
    }

    public function setProfilePhoto($photo)
    {
        $this->profile_photo = $photo;
    }

    public function getProfilePhoto()
    {
        return $this->profile_photo;
    }

    /**
     * Create a new user
     * @param Object PDO Database connection handle
     * @return String success or failure message
     */
    public function register($pdo)
    {
        $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);
        try {
            $stmt = $pdo->prepare('INSERT INTO users (full_name,email,city,profile_photo,username,password) VALUES(?,?,?,?,?,?)');
            $stmt->execute([$this->getFullName(), $this->getEmail(), $this->getCity(), $this->getProfilePhoto(), $this->username, $passwordHash]);
            return "Registration was successful";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    /**
     * Check if a user entered a correct username and password
     * @param Object PDO Database connection handle
     * @return String success or failure message
     */
    public function login($pdo)
    {
        try {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
            $stmt->execute([$this->username]);

            $row = $stmt->fetch();
            if ($row == null) {
                return "This account does not exist";
            } else {
                if (password_verify($this->password, $row['password'])) {
                   
                    session_start();
                    $_SESSION['username']=$row['username'];
                    $_SESSION['fullname']=$row['full_name'];
                    $_SESSION['email']=$row['email'];
                    $_SESSION['photo']=$row['profile_photo'];
                    header("Location: http://localhost/phplogin/home.php"); 
                    return "Correct password.Login successful";
                } else {
                    die("Your username or password is not correct");
                }
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function changepassword($pdo)
    {
        //Checking if the db has a user with that username
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
        $stmt->execute([$this->username]);
        $row = $stmt->fetch();
       
        if ($row == null) {
            return "This account does not exist";
        } else {
            //If the user exists 
            try {
                //Updating the db to the new password
                $hashed = password_hash($this->getNewpassword(), PASSWORD_DEFAULT);
                $info = [
                    'username' => $this->username,
                    'oldpass' => $this->password,
                    'newpass' => $hashed
                ];
                $stmt = $pdo->prepare("UPDATE users SET password=:newpass WHERE username=:username AND password=:oldpass");
                $stmt->execute($info);
                return "Your password has been changed";
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }
    }

    public function logout($pdo){
        session_start();
        unset($_SESSION['username'], $_SESSION['fullname'],  $_SESSION['email'],$_SESSION['photo']);
        session_destroy();
        header("Location:http://localhost/phplogin/login.php");

    }
}
