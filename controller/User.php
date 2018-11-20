<?php

require_once './model/Model.php';

class User extends Model
{
    function checkUser($username, $password)
    {
        if ($this->CheckLogin(['name' => $username, 'pass' => $password])) {
            return true;
        }
        return false;

    }

    function AddUser($name, $pass, $email, $level = 2)
    {

        $data = $this->AddData('user', ['name' => $name, 'password' => md5($pass), 'email' => $email, 'level' => $level]);
        return $data;

    }

    function GetAUser($id)
    {
        $data = $this->GetRecord('user', ['where' => "id='$id'"]);
        return $data;
    }

    function GetAUserByName($name)
    {
        $data = $this->GetRecord('user', ['where' => "username='$name'"]);
        return $data;

    }

}