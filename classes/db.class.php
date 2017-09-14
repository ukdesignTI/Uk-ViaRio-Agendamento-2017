<?php

/**
 * Created by PhpStorm.
 * User: emersonalencarjunior
 * Date: 28/05/17
 * Time: 23:59
 */
require_once APP_PATH . 'classes' . DIRECTORY_SEPARATOR . 'conexao.php';

/* Connect to a MySQL database using driver invocation */

class DB {

    private static $instance;

    /**
     * @return PDO
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO(DSN, DB_USER, DB_PASS);
                self::$instance->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->SetAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo 'Conexão Falhou: ' . $e->getMessage();
            }
        }
        return self::$instance;
    }

    /**
     * @param $sql
     *
     * @return mixed
     */
    public static function prepare($sql) {
        return self::getInstance()->prepare($sql);
    }

}
