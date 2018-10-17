<?php

class db {

    public static function connect() {
        $params = include(ROOT . '/app/config/db_config.php');
        return new PDO('mysql:host=localhost;dbname=' . $params['db_name'] . ';charset=' . $params['db_charset'] . '', $params['db_user'], $params['db_password']);
    }

}
