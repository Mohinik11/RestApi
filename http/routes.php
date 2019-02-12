<?php
    /**
     * Define Routes here
     */
    $router->get('/', function(){
        return 'Hello, PHRoute';
    });

	/**
	 * APIs 
	 */
    // $router->get('programs', ['Controller\\ProgramsController', 'getPrograms']);
    $router->get('/basket/{id:i}', ['Controller\\UsersController', 'getCartItems']);
    $router->post('/basket', ['Controller\\UsersController', 'postBasket']);
