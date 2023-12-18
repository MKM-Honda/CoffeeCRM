<?php
defined('BASEPATH') or exit('No direct script access allowed');



$active_group = 'default';
$query_builder = true;


$production = filter_var(getenv("PRODUCTION", false), FILTER_VALIDATE_BOOLEAN);

if ($production == true){
    $db['default'] = array(
        'dsn' => '',
      
        'hostname' => getenv("DB_HOST"),
        'username' => getenv("DB_USERNAME"),
        'password' => getenv("DB_PASSWORD"),
        'database' => getenv("DB_DATABASE"),
        'dbdriver' => getenv("DB_DRIVER"),
      
        'dbprefix' => '',
        'pconnect' => false,
        'db_debug' => (ENVIRONMENT !== 'production'),
        'cache_on' => false,
        'cachedir' => '',
        'char_set' => 'utf8',
        'dbcollat' => 'utf8_general_ci',
        'swap_pre' => '',
        'encrypt' => false,
        'compress' => false,
        'stricton' => false,
        'failover' => array(),
        'save_queries' => true
    );
}else{
    $db['default'] = array(
        'dsn' => '',
      
        'hostname' => getenv("DEV_DB_HOST"),
        'username' => getenv("DEV_DB_USERNAME"),
        'password' => getenv("DEV_DB_PASSWORD"),
        'database' => getenv("DEV_DB_DATABASE"),
        'dbdriver' => getenv("DEV_DB_DRIVER"),
      
        'dbprefix' => '',
        'pconnect' => false,
        'db_debug' => (ENVIRONMENT !== 'production'),
        'cache_on' => false,
        'cachedir' => '',
        'char_set' => 'utf8',
        'dbcollat' => 'utf8_general_ci',
        'swap_pre' => '',
        'encrypt' => false,
        'compress' => false,
        'stricton' => false,
        'failover' => array(),
        'save_queries' => true
    );
}

$db['kancana'] = array(
    'dsn' => '',

    'hostname' => getenv("MY_DB_HOST"),
    'username' => getenv("MY_DB_USERNAME"),
    'password' => getenv("MY_DB_PASSWORD"),
    'database' => getenv("MY_DB_DATABASE"),
    'dbdriver' => getenv("MY_DB_DRIVER"),

    'dbprefix' => '',
    'pconnect' => false,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => false,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => false,
    'compress' => false,
    'stricton' => false,
    'failover' => array(),
    'save_queries' => true
);
