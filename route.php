<?php

class Route {
    public function start() {
        $url = $_SERVER['REQUEST_URI'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $controllerName = ucfirst($url[2] ?? 'Index') . 'Controller';
        $actionName = $url[3] ?? 'index';

        $controllerFile = 'controllers/' . $controllerName . '.php';

        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $controller = new $controllerName();

            if (method_exists($controller, $actionName)) {
                $controller->$actionName();
                return; // Додано return для зупинки подальшого виконання коду
            }
        }
    }
}

?>
