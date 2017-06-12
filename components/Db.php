<?php

/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 10.06.2017
 * Time: 21:00
 */
class Db
{
    public static function getConnection(){
        $db_parms_path= ROOT.'/config/config.php';
        $db_params = include($db_parms_path);

        $host = $db_params['host'];
        $dbname = $db_params['dbname'];
        $user =$db_params['user'];
        $pass =$db_params['password'];

        try {
            $db = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $pass);
            return $db;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}