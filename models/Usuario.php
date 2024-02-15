<?php
class Usuario{
    protected $id;
    protected $username;
    protected $password;
    protected $name;
    protected $age;
    protected $sex;
    protected $adm;
    
    

    
    public function __construct($id, $username, $password, $name, $age, $sex,  $adm){
        $this->setId($id);
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setname($name);
        $this->setage($age);
        $this->setsex($sex);
        $this->setAdm($adm);
    }
    
    public function setId($id){$this->id=$id;}
    public function setUsername($username){$this->username = $username;}
    public function setPassword($password){$this->password = $password;}
    public function setname($name){$this->name = $name;}
    public function setage($age){$this->age = $age;}
    public function setsex($sex){$this->sex = $sex;}
    public function setAdm($adm){$this->adm = $adm;}
    
    public function getId(){return $this->id;}
    public function getUsername(){return $this->username;}
    public function getPassword(){return $this->password;}
    public function getName(){return $this->name;}
    public function getAge(){return $this->age;}
    public funcTion getSex(){
       return ($this->sex == 'Male') ? "Male" : "Female"; 
    }
    public function getAdm(){return $this->adm;}
  
    
}
