<?php namespace ThreeAccents\Auth\Commands;

class UserRegisterCommand
{
    public $username;
    public $email;
    public $password;
    public $full_name;
    public $slug;

    function __construct($username, $email, $password, $full_name, $slug = null)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->full_name = $full_name;
        $this->slug = $slug;
    }
}