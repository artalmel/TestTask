<?php

/**
 * Класс Router
 * Компонент для работы с маршрутами
 */
class Router
{
    /**
     * Свойство для хранения массива роутов
     * @var array
     */
    private $routes;

    /**
     * Конструктор
     */
    public function __construct()
    {
        // Путь к файлу с роутами
        $routes_path = ROOT . '/config/routes.php';

        // Получаем роуты из файла
        $this->routes = include_once $routes_path;
    }

    /**
     * Возвращает строку запроса
     */
    protected function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    /**
     * Метод для обработки запроса
     */
    public function run()
    {
        // Получаем строку запроса
        $uri = $this->getURI();

        if ($uri == 'ru' || $uri == 'en') {
            $uri = '';
        }

        // Проверяем наличие такого запроса в массиве маршрутов (routes.php)
        foreach ($this->routes as $pattern => $path) {

            // Сравниваем $uriPattern и $uri
            if (preg_match("~$pattern~", $uri)) {

                // Получаем внутренний путь из внешнего согласно правилу.
                $internalRouter = preg_replace("~$pattern~", $path, $uri);

                // Определить контроллер, action, параметры
                $segments = explode('/', $internalRouter);
                $controllerName = array_shift($segments) . 'Controller';

                $actionName = 'action' . ucfirst(array_shift($segments));

                // Подключить файл класса-контроллера
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                $params = $segments;

                // Создать объект, вызвать метод (т.е. action)
                $controllerObject = new $controllerName;


                /* Вызываем необходимый метод ($actionName) у определенного
                * класса ($controllerObject) с заданными ($parameters) параметрами
                */
                $result = call_user_func_array(array($controllerObject, $actionName), $params);

                // Если метод контроллера успешно вызван, завершаем работу роутера
                if ($result != null) {
                    break;
                }
            }
        }

    }
}