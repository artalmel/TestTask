<?php

/**
 * Контроллер главной страницы.
 * Организует работу данной старницЫ.
 * Class HomeController
 */
class HomeController extends Controller
{
    public function actionIndex()
    {

        $var = $this->view('Home');
        include_once (ROOT.'/views/home.php');
        return true;
    }
}