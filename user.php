<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
interface Account{
    public function register($pdo);
    public function login($pdo);
    // public function changepassword($pdo);
    // public function logout($pdo);
}

class User implements Account{
        //properties 
        protected $username;
        protected $password;
        protected $fullName;
        protected $useremail;
        protected $usercity;
        protected $profile_photo;
        //class constructor 
        function __construct($user, $pass){
            $this->username =$user;
            $this->password = $pass;
        }

        //full name setter 
        public function setFullName ($name){
        	$this->fullName = $name;
        }
        //full name getter
        public function getFullName (){
        	return $this->fullName;
        }

        public function setEmail($email){
            $this->useremail=$email;

        }
        public function getEmail(){
            return $this->useremail;
        }

        public function setCity($city){
            $this->usercity = $city;

        }
        public function getCity(){
            return $this->usercity;
        }

        public function setProfilePhoto($photo){
            $this->profile_photo =$photo;
        }

        public function getProfilePhoto(){
            return $this->profile_photo;
        }

        /**
        * Create a new user
        * @param Object PDO Database connection handle
        * @return String success or failure message
        */
        public function register ($pdo){
            $passwordHash = password_hash($this->password,PASSWORD_DEFAULT);
            try {
                $stmt = $pdo->prepare ('INSERT INTO users (full_name,username,profile_photo,email,city,password) VALUES(?,?,?,?,?,?)');
                $stmt->execute([$this->getFullName(),$this->getEmail(),$this->getCity(),$this->getProfilePhoto(),$this->username,$passwordHash]);
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
        public function login ($pdo){
            try {
                $stmt = $pdo->prepare("SELECT password FROM users WHERE username=?");
                $stmt->execute([$this->username]);
                $row = $stmt->fetch();
                if($row == null){
                    return "This account does not exist";
                }
                if (password_verify($this->password,$row['password'])){
                	return "Correct password.Login successful";
                }
                else{
                    die("Your username or password is not correct") ;
                }
               
            } catch (PDOException $e) {
            	return $e->getMessage();
            }
        }

        
    }
    ?>