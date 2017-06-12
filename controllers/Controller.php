<?php

/**
 * Родительскый класс для всех контроллров
 * Дает все переменные, общие для данного сайта.
 * Организует перевод сайта
 */
class Controller
{
    // ОбЪявленные свойства
    protected $trans = array();
    protected $lang;
    protected $uri;
    protected $user;
    protected $is_auth;
    protected $config;


    // Конструктор класса
    public function __construct()
    {

        $config_path = ROOT . '/config/config.php'; //путь к файлу конфигурации
        $this->config = include($config_path); //массив из файла конфигурации
        $this->trans = $this->translate();  //перевод
        $this->lang = $this->getLang();  // файл с переводоами
        $this->uri = $this->addLanguage(); //добавление данный язык в конце адресной строки
        $user_id = User::checkLogged(); // id аутентифицированного  пользователя
        $this->user = User::getUserById($user_id);// аутентифицированный пользователь
        $this->is_auth = User::checkLogged(); // проверка утентифицированн ли пользователь
    }

    // Находим адрес из адресной строки
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }


    // Переводим страницу на данный язык
    private function translate()
    {
        // файл с переводоами
        $lang = $this->getLang();

        // Путь к файлу перевода
        $lang_path = ROOT . '/lang/' . $lang . '.ini';

        // Парсинг ini файла перевода
        $trans = parse_ini_file($lang_path);
        return $trans;
    }

    // Берем текст из адресной
    // строки в конце добавляем данный яазык
    private function addLanguage()
    {
        // Текст из адресной строки
        $uri = $_SERVER['REQUEST_URI'];

        //Разбиваем строку на подстроки
        $segments = explode('/', $uri);

        // Удаляем последний часть
        array_pop($segments);

        // Объединяем элементы массива в строку
        $uri_lang = implode('/', $segments);

        // Вернем реаултат
        return $uri_lang;
    }

    // Находим файл с переводоами на данный язык
    private function getLang()
    {
        // Из файла конфигурации берем язык по по умолчанию
        $default_lang = $this->config['default_lang'];

        // Из файла конфигурации берем дополнительный язык
        $other_lang = $this->config['lang'];

        // Берем адрес из адресной строки
        $uri = $this->getURI();

        //Разбиваем строку на подстроки
        $segments = explode('/', $uri);

        // Берем последний часть
        $uri_lang = array_pop($segments);

        // Если последний часть пуста - язык по по умолчанию,
        // если нет - дополнительный язык
        $lang = $uri_lang == '' || $uri_lang == $default_lang ? $lang = $default_lang : $lang = $other_lang;

        // Вернем реаултат
        return $lang;

    }

    // Отправляем постоянные переменные в страницу (которые встречаются во всех страницах)
    protected function view($page_title = '')
    {
        // Постоянные переменные (можно и глобалные)
        $args = array(
            'img' => $this->config['img_path'],
            'is_auth' => $this->is_auth,
            'user' => $this->user,
            'trans' => $this->trans,
            'lang' => $this->lang,
            'url' => $this->uri,
            'title' => $page_title,
        );
        return $args;
    }

}