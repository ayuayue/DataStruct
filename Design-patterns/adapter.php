<?php

// 适配器模式 adapter
// old code
class User {
    private $name;
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

// new code

interface UserInterface{
    function getUserName();
}

class UserInfo implements UserInterface {
    protected $user;
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function getUserName()
    {
        return $this->user->getName();
    }
}

$oldUser = new User('zs');
var_dump($oldUser->getName());

$newUser = new UserInfo($oldUser);
var_dump($newUser->getUserName());
