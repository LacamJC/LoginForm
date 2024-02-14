<?php
require_once 'Usuario.php';
 class Administrador extends Usuario{
     
     public function __construct($username, $password, $name, $age, $sex) {
         parent::__construct($username, $password, $name, $age, $sex);
     }
    
}
