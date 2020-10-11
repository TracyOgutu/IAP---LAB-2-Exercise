<?php

include_once './util.php';	
    class DBConnector {
        protected $pdo;
        //The database connection happens in the class constructor
        //The data source name (dsn) contains the dialect i.e. target DBMS name, host and the database name. 
        //We get the host and database name values from the Util class using :: (double colon)
        function __construct(){
          $dsn="pgsql:host=".Util::$SERVER_NAME.";dbname=" .Util::$DB_NAME ."";

          //Database connection options are prepared in form of associative array
          $options = [ 
              //Any errors, which occur when we perform a database transaction will be reported in form of exceptions.
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
              //If a given database driver does not support prepared statements, then PDO will emulate prepared statements
              PDO::ATTR_EMULATE_PREPARES => false,
              //We want data presented as an a associative array,when you read it from a database table
              PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC
          ];
          //The PDO database handle is then created by instantiating the PDO class:
          try{
             $this->pdo=new PDO($dsn,Util::$DB_USER,Util::$DB_USER_PASS, $options);				
           }catch (PDOException $e){
                 	echo $e->getMessage();
           }			
        }
        //The connectToDB method returns the PDO connection handle:
        public function connectToDB(){
                return $this->pdo;
        } 			
        public function closeDB(){
                $this->pdo = null;
        }
    }

?>