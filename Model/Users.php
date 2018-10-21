<?php

class User{
    
    private $user_id;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $passwordtwo;
    
    
    function __get($name) {
        return $this->$name;
    }
    
    function __set($name, $value) {
        $this->$name = $value;
    }
    
}
