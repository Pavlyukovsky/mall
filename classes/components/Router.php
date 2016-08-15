<?php
class Router{
    private $routes;
    public function __construct(){
        $routesPath = ROOT.'/classes/config/routes.php';
        $this->routes = include($routesPath);
    }
    private function getURI(){
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    
    public function run(){
        $uri = $this->getURI(); // Получаем строку запроса
        // Проверяем наличие такого запроса в массиве маршрутов (routes.php)
        foreach ($this->routes as $uriPattern => $path) {            
            // Сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) { 
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri); // Получаем внутренний путь из внешнего согласно правилу.
                $segments = explode('/', $internalRoute); // Определить контроллер, action, параметры
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);
                $actionName = 'action' . ucfirst(array_shift($segments));
                $parameters = $segments;
                $controllerFile = ROOT.'/classes/controllers/'.$controllerName.'.php'; // Подключить файл класса-контроллера
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }
                /*
                 * Debug system
                 * 
                 * echo "Controller Name -> ";
                echo $controllerName;
                echo "<br>Action Name -> ";
                echo $actionName;
                echo "<br>  Parameters -> ";
                print_r($parameters);*/
                
                $controllerObject = new $controllerName; // Создать объект, вызвать метод (т.е. action)
                
                // Если не загружен нужный класс контроллера или в нём нет
                // нужного метода — 404 
                if(!is_callable(array($controllerObject, $actionName))){
                    //header("HTTP/1.0 404 Not Found");
                    header("Location: /error");
                    return;
                }
                
                /* Вызываем необходимый метод ($actionName) у определенного 
                 * класса ($controllerObject) с заданными ($parameters) параметрами
                 */
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                 // Если метод контроллера успешно вызван, завершаем работу роутера
                if ($result != null) {
                    break;
                }
            }
        }
        
        /*// Ничего не применилось. 404.
        header("HTTP/1.0 404 Not Found");
        return;*/
    }
}