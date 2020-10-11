<?php

class User {
        //properties 
        protected $username;
        protected $password;
        protected $fullName;
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

        /**
        * Create a new user
        * @param Object PDO Database connection handle
        * @return String success or failure message
        */
        public function register ($pdo){
            $passwordHash = password_hash($this->password,PASSWORD_DEFAULT);
            try {
                $stmt = $pdo->prepare ('INSERT INTO users (full_name,username,password) VALUES(?,?,?)');
                $stmt->execute([$this->getFullName(),$this->username,$passwordHash]);
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
                return "Your username or password is not correct";
            } catch (PDOException $e) {
            	return $e->getMessage();
            }
        }
    }
    ?>