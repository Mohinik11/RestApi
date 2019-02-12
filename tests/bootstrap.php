<?php
    require(__DIR__."/../vendor/autoload.php");
    require(__DIR__."/../src/autoload.php");
    $dotenv = new Dotenv\Dotenv(__DIR__."/../");
    $dotenv->load();