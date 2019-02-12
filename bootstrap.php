<?php
    /**
     * Load this file if you're running a stand alone application
     */
    require __DIR__.'/vendor/autoload.php';
    include __DIR__.'/src/autoload.php';

    if(!getenv('APP_ENV')) {
        $dotenv = new Dotenv\Dotenv(__DIR__);
        $dotenv->load();
        $dotenv->required(['db_name', 'db_host', 'db_username', 'db_port'])->notEmpty();
    } else {
        $_ENV = array_merge($_SERVER, $_ENV);
    }

    