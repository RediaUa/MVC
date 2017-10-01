<?php
/**
 * Created by PhpStorm.
 * User: temka
 * Date: 25.09.17
 * Time: 22:39
 */

class Router
{
    private $routes; // массив в котором будут храниться маршруты

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

    /*
        Return request string
        return string
    */
    private function getURI()
    {
        if(!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'], '/');
        }

    }

    public function run()
    {
        //получить строку запроса
        echo $uri = $this->getURI();

        //проверить наличие такого запроса в routes.php

        //если есть совпадение, определить какой контроллер и action обрабатывает запрос

        // подключить файл класса-контроллера

        //создать обьект, вызвать метод (т.е. action)
    }
}