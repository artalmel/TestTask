<?php

class Validator
{
    public static function checkEmpty($input)
    {
        if (strlen($input) == 0) {
            return true;
        }
        return false;
    }

    public static function checkPassword($password)
    {
        if (strlen($password) < 8) {
            return true;
        }
        return false;
    }

    public static function checkPassConfirm($pass, $conf_pass)
    {
        if ($pass != $conf_pass) {
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;

    }

    public static function checkInputs($input)
    {
        if (!preg_match("/^[a-zA-Z ]*$/", $input)) {
            return true;
        }
        return false;
    }

}