<?php
    use Pimple\Container;

    $container = new Container();

    $container['db'] = function(){
        return new MysqliDb(
            $_ENV['db_host'],
            $_ENV['db_username'],
            $_ENV['db_password'],
            $_ENV['db_name'],
            $_ENV['db_port']);
    };
    $container['Controller\UsersController'] = function($c){
        return new Controller\UsersController($c['UsersRepository'], $c['Request']);
    };

    $container['UsersRepository'] = function($c){
        return new UsersRepository($c['db']);
    };
    
    $container['Request'] = function($c){
        return Zend\Diactoros\ServerRequestFactory::fromGlobals(
            $_SERVER,
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES
        );
    };