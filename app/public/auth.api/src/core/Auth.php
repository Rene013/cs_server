<?php
namespace src\core;

class Auth{
    private string $name;
    private string $email;
    private int $pin;

    public function __construct(string $name, string $email){
        $this->name = $name;
        $this->email = $email;
        $this->pin = rand(1001,9999);
    }
    function getAuth(){
        return [$this->name, $this->email, $this->pin];
    }
}