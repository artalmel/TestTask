<?php

/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 09.06.2017
 * Time: 19:46
 */
class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Вход пользователя на сайт
     * Action для страницы "Вход"
     */
    public function actionLogin()
    {
        // Флаг ошибок
        $errors = false;

        //Подключаем постоянные переменные
        $var = $this->view('Sign in');

        // Переменные для формы
        $email = false;
        $password = false;

        // Обработка формы
        if (isset($_POST['submit'])) {

            // Если форма отправлена
            // Получаем данные из формы
            $email = $_POST['email'];
            $password = $_POST['password'];

            //Валидация полей
            if (Validator::checkPassword($password)) {
                $errors[] = "Use at least 8 characters.";
            }
            if (Validator::checkEmpty($password)) {
                $errors[] = "You can not leave this empty.";
            }
            if (!Validator::checkEmail($email)) {
                $errors[] = "Invalid mailbox name.";
            }

            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);
            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Incorrect login data.';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);

                // Перенаправляем пользователя в кабинет
                header("Location: /profile/".$var['lang']);
            }
        }


        // Подключаем вид
        include_once(ROOT . '/views/login.php');
        return true;
    }

    /**
     * Регистрация пользователя
     * Action для страницы "Вход"
     */
    public function actionRegister()
    {
        // Флаг ошибок
        $errors = false;

        // Переменные для формы
        $photo = false;
        $first_name = false;
        $last_name = false;
        $gender = false;
        $email = false;
        $password = false;
        $password_confirm = false;
        $phone = false;
        $address = false;
        $city = false;


        // Обработка формы
        if (isset($_POST['rsubmit'])) {

            // Если форма отправлена
            // Получаем данные из формы
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $photo = $_FILES['photo']['name'];


            // Валидация полей
            if (Validator::checkInputs($first_name)) {
                $errors[] = "Only letters and white space allowed.";
            }
            if (Validator::checkInputs($last_name)) {
                $errors[] = "Only letters and white space allowed.";
            }
            if (Validator::checkPassword($password) == true) {
                $errors[] = "Use at least 8 characters.";
            }
            if (Validator::checkEmpty($password)) {
                $errors[] = "You can not leave this empty.";
            }
            if (!Validator::checkEmail($email)) {
                $errors[] = "Invalid mailbox name.";
            }
            if (Validator::checkPassConfirm($password, $password_confirm)) {
                $errors[] = "These passwords do not match.";
            }
            if (User::checkEmailExists($email)) {
                $errors[] = "This email alredy exists.";
            }

            // Проверяем нет ли ошибок
            if ($errors == false) {

                // Если данные правильные, региструем нового пользователя
                $result = User::register($first_name, $last_name, $gender, $email, $password, $phone, $address, $city, $photo);

                // Если пользовател добавлена
                if ($result) {
                    $errors[] = "Registration was successful.";
                    // Путь загрузки файлов
                    $img_path = $this->config['img_path'];
                    if (isset($_FILES['photo'])) {
                        // Загружаем фото на сервер и вернем ошибки при загрузке
                        $errors = Helper::setImage($img_path);
                    }

                }
            } else {
                $errors[] = "Incorrect data for registration. Please check the data.";
            }
        }


        // Подключаем постоянные переменные
        $var = $this->view('Register');

        // Подключаем вид
        include_once(ROOT . '/views/register.php');
        return true;
    }

    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionLogout()
    {
        //Подключаем постоянные переменные
        $var = $this->view('Sign in');

        // Удаляем информацию о пользователе из сессии
        unset($_SESSION['user']);
        // Перенаправляем пользователя на главную страницу
        header("Location: /".$var['lang']);

        return true;
    }

    public function actionProfile()
    {

        // Переменные для страници
        $gender = false; //пол пользователя

        // Получаем пол пользователя из цифр
        switch ($this->user['gender']) {
            case 1:
                $gender = 'Male';
                break;
            case 2:
                $gender = 'Female';
                break;
        }
        //Подключаем постоянные переменные
        $var = $this->view('Profile');

        // Подключаем вид
        include_once(ROOT . '/views/profile.php');
        return true;
    }
}