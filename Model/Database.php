<?php

class Database{

    private $pdo;
    private static $connection = null;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "library";
            

    private function __construct() {
        //Set DSN 
        $dsn = "mysql:host=$this->servername;dbname=$this->dbname";
        //pdo connection
        try{
            $this->pdo = new PDO($dsn, $this->username, $this->password,  [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            die();
        }
        }

    //create instance
    public static function getConnection() {
        if (!isset(self::$connection)) {
            self::$connection = new Database();
        }
        return self::$connection;
    }
    
    //insert user into database
    function addUser($User){
        $sql = "INSERT INTO users (firstname, lastname, email, password, passwordtwo) "
            . "VALUES (:firstname, :lastname, :email , :password, :passwordtwo)";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([':firstname' => $User->firstname, ':lastname' => $User->lastname, ':email' => $User->email, ':password' => $User->password, ':passwordtwo' => $User->passwordtwo]);
        }
    
    function userAlreadyExists($User) {
        $sql = "SELECT email FROM users WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$User->email]);
        $exists = $stmt->fetchAll();
        if (count($exists) == 0) {
            return true;
        }
        return false;
    }
    
    function validEmail($User) {
        $sql = "SELECT email FROM users WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$User->email]);
        if(filter_var($stmt, FILTER_SANITIZE_EMAIL)){
            return true;
        } else {
            return false;
        }
    }
    
}
