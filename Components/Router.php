<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = "Config/routes.php";
        $this->routes = include($routesPath);
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], "/");
        }
    }

    public function run()
    {
        $uri = $this->getUri();
        foreach ($this->routes as $pattern => $path) {
            if(preg_match("~$pattern~", $uri)){
                $internalRoute = preg_replace("~$pattern~", $path, $uri);

                $segments = explode("/", $internalRoute);

                $controllerName = array_shift($segments)."Controller";
                $controllerName = ucfirst($controllerName);

                $actionName = "action".ucfirst(array_shift($segments));

                $parameters = $segments;

                $controllerFile = "controllers/".$controllerName.".php";
                if(file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                $controllerObject = new $controllerName();

                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if($result != null) {
                    break;
                }
            }
        }
    }
}