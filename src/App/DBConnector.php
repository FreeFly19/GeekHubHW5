<?php
/**
 * Created by PhpStorm.
 * User: FreeFly
 * Date: 02.11.15
 * Time: 9:19
 */

namespace App;


class DBConnector {

    private static $pdo = null;

    private static $configs = [];

    private function __construct(){
    }

    public static function getPDO(){
        if(self::$pdo == null)
        {
            $dbConfig = self::$configs;
            self::$pdo = new \PDO(
                    $dbConfig['driver'] . ":host=" . $dbConfig['host'] . ";dbname=" . $dbConfig['database'] . ";charset=" . $dbConfig['charset'],
                    $dbConfig['user'],
                    $dbConfig['password'],
                    $dbConfig['opt']
                );
        }
        return self::$pdo;
    }

    public static function setConfig($config){
        self::$configs = $config;
    }

} 