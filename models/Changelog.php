<?php

namespace WorldlangDict;

use Exception;

class Changelog {

    public static function recent_changes(object $config) {

        $db = new \PDO($config->db_dsn, $config->db_user, $config->db_pass);
            // $config->db_prefix = $c['db_prefix'];
    
        $q = $db->query("SELECT * FROM `{$config->db_prefix}term_log` ORDER BY `timestamp` DESC LIMIT 100;");
    
        $result = $q->fetchAll(); // this takes an array!
                
        if (!$result) {
            throw new Exception("SQL Error");
            // var_dump($q->errorCode());
            // var_dump($q->errorInfo());
        }

        return $result;
    }
}