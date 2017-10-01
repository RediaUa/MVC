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


    private function getURI() //возвращает строку запроса
    {
        if (!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'], '/');
        }

    }

    public function run() //принимает управление от FrontController
    {
        //получить строку запроса
        $uri = $this->getURI();

        //проверить наличие такого запроса в routes.php
        foreach($this->routes as $uriPattern => $path)
        {
            //сравниваем $uriPattern и uri
            if(preg_match("~$uriPattern~", $uri))//использую разделителями ~ потому что в строке могут быть /
            {
                //если есть совпадение, определить какой контроллер и action обрабатывает запрос
                $segments = explode('/', $path);
                $controllerName = array_shift($segments).'Controller';//'присваивает и извлекает/удаляет segments[0]
                $controllerName = ucfirst($controllerName);//uppercase first letter | controllers done

                $actionName = 'action'.ucfirst(array_shift($segments)); //action done

                // подключить файл класса-контроллера

                $controllerFile = ROOT.'/controllers/'.$controllerName.".php";

                if(file_exists($controllerFile))
                {
                    include_once($controllerFile);

                }
                //создать обьект, вызвать метод (т.е. action)
                $controllerObject = new $controllerName;
                $result = $controllerObject->$actionName();
                if($result != null)
                {
                    break;
                }
            }
        }


    }
}