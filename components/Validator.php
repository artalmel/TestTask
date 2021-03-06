<?php
/**
 * Проверка ошибок на сервере
 * Class Validator
 */
class Validator
{

    // Проверяет данное поле - поле не должен быть пустым
    public static function checkEmpty($input)
    {
        if (strlen($input) == 0) {
            return true;
        }
        return false;
    }

    // Проверяет длина пароля - пароль должен быть не короче 8 символов
    public static function checkPassword($password)
    {
        if (strlen($password) < 8) {
            return true;
        }
        return false;
    }
    // Проверяет совпадение паролей в обоих полях.
    public static function checkPassConfirm($pass, $conf_pass)
    {
        if ($pass != $conf_pass) {
            return true;
        }
        return false;
    }
    // Проверяет подлинность аддреса эл. почты
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;

    }
    //Поля не должны содержать другие символы кроме букв
    public static function checkInputs($input)
    {
        if (!preg_match("/^[a-zA-Z ]*$/", $input)) {
            return true;
        }
        return false;
    }

}