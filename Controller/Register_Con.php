<?php
require_once('../Model/Database.php');
require_once('../Model/Users.php');

if(isset($_POST['firstname'])){
    
    //Database connection
    $connection = Database::getConnection();
    
    $User = new User();
    $User->firstname = htmlentities($_POST['firstname']);
    $User->lastname = htmlentities($_POST['lastname']);
    $User->email = htmlentities($_POST['email']);
    $User->password = htmlentities($_POST['password']);
    $User->passwordtwo = htmlentities($_POST['passwordtwo']);
    
//    if(!($connection->userAlreadyExists($User))){
//        echo "User Already Exists";
//    }
    
    if(!($connection->validEmail($User))) {
        echo "Email is valid";
    } else {
        echo "Email is not valid";
    }
//    
////    if(!($connection->userAlreadyExists($User) && $connection->validEmail($User))){
////        echo "This user already exists and Email is not valid";
////        return;
////    }  
//    
//    $addNewUser = $connection->addUser($User);
//    
//    if($addNewUser == TRUE){
//        echo ("New user added");
//    } else {
//        echo ("Failed");
//        
//    }
}
