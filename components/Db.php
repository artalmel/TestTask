<?php
/**
 * Класс Db
 * Компонент для работы с базой данных
 */
class Db
{
    /**
     * Устанавливает соединение с базой данных
     * @return \PDO <p>Объект класса PDO для работы с БД</p>
     */
    public static function getConnection(){
        // Получаем параметры подключения из файла
        $db_parms_path= ROOT.'/config/config.php';
        $db_params = include($db_parms_path);

        // Переменные для ДБ
        $host = $db_params['host'];
        $dbname = $db_params['dbname'];
        $user =$db_params['user'];
        $pass =$db_params['password'];

        // Устанавливаем соединение
        try {
            $db = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $pass);
            return $db;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}