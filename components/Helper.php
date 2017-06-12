<?php

/**
 * Вспомогательный класс
 */
class Helper
{

    /**
     * Загрузка изображений на сервер
     * @param $path
     * @return array|bool
     */
    public static function setImage($path)
    {

        // Пути загрузки файлов
        $errors = false;

        // Массив допустимых значений типа файла
        $types = array('image/gif', 'image/png', 'image/jpeg');

        // Максимальный размер файла
        $size = 1024000;

        // Обработка запроса
        if (isset($_POST['rsubmit']) == 'POST') {
            // Проверяем тип файла
            if (!in_array($_FILES['photo']['type'], $types)) {
                $errors[] = "The forbidden file type.";
            }

            // Проверяем размер файла
            if ($_FILES['photo']['size'] > $size) {
                $errors[] = "Too large file size.";
            }

            // Загрузка файла и вывод сообщения
            if($errors == false){
                if (!@copy($_FILES['photo']['tmp_name'], $path . $_FILES['photo']['name'])) {
                    $errors[] = "Something went wrong.";
                } else
                   $errors[] =  "Download is successful.";
            }

            return $errors;
        }

    }

}