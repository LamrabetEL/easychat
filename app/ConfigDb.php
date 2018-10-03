<?php

/**
Adapter les parametres DBNAME , USER , PASSWORD 
*/

return array(
    'dbname' => 'easychat',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'charset' => 'utf8',
    'driver' => 'pdo_mysql',
    'port' => '3306',
    'driverOptions' => array(
        \PDO::MYSQL_ATTR_LOCAL_INFILE => true
    )
);