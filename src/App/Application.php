<?php
/**
 * Created by PhpStorm.
 * User: FreeFly
 * Date: 30.10.15
 * Time: 15:33
 */

namespace App;

class Application
{
    public function __construct($dbConfig)
    {
        DBConnector::setConfig($dbConfig);
        AbstractModel::setPDO(DBConnector::getPDO());
    }

    public function run()
    {
        $controllerName = "Controllers\\" . $_GET['controller'] . "Controller";

        if (!class_exists($controllerName)) {
            header('HTTP/1.1 404 Not Found');
            die('{"Error": "Controller not found"}');
        }


        $controller = new $controllerName;

        $action = $_GET['action'];

        if ($action != "") {
            if (method_exists($controller, $action)) {
                echo $controller->$action();
            } else {
                header('HTTP/1.1 404 Not Found');
                die('{"Error": "Action not found"}');
            }
        } else {
            if (method_exists($controller, 'Index')) {
                echo $controller->Index();
            } else {
                header('HTTP/1.1 404 Not Found');
                die('{"Error": "Index action not found"}');
            }
        }


    }
}
