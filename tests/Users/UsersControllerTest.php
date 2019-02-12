<?php

    /**
     * @covers \Controller\UsersController
     */

    class UsersControllerTest extends PHPUnit_Framework_TestCase
    {
        private $requestProphet;
        private $streamProphet;

        private $userController;
        private $repositoryProphet;

        public function setup() 
        {
            $this->repositoryProphet = $this->prophesize('\UsersRepository');
            $this->requestProphet    = $this->prophesize('\Zend\Diactoros\ServerRequest');
            $this->streamProphet     = $this->prophesize('\Zend\Diactoros\PhpInputStream');
            $this->userController = new \Controller\UsersController(
                $this->repositoryProphet->reveal(),
                $this->requestProphet->reveal()
            );
        }

        public function testGetUsers()
        {
            $testData = ['id'=>1, 'email' => 'test@test.com', 'username' => 'test'];
            $this->repositoryProphet->get(\Prophecy\Argument::any())->willReturn($testData);
            
            $this->assertGreaterThanOrEqual(1, count($this->userController->getUsers()));
        }

        public function testGetCartItemsFailed()
        {
            $this->expectException("\InvalidArgumentException");
            $this->expectExceptionMessage("Invalid ID");
            
            $this->userController->getCartItems('bad Id');
        }

        public function testGetCartItems()
        {
            $testData = ['id'=>1, 'product_id' => 2, 'user_id' => 1, 'quantity' => 2];
            $this->repositoryProphet->getCartItems(\Prophecy\Argument::any())->willReturn($testData);
            
            $this->assertGreaterThanOrEqual(1, count($this->userController->getCartItems(1)));
        }

        public function testPostBasketFailed()
        {
            $testData = '{
                "product_id": "bad Id",
                "user_id": "bad Id"
            }';
            $this->expectException("\InvalidArgumentException");
            $this->streamProphet->getContents()->willReturn($testData);
            $this->requestProphet->getBody()->willReturn($this->streamProphet->reveal());
            
            $this->userController->postBasket();
        }

        public function testPostBasket()
        {
            $testData = '{
                "product_id": "1",
                "user_id": "2",
                "quantity" : "2"
            }';
            $this->streamProphet->getContents()->willReturn($testData);
            $this->requestProphet->getBody()->willReturn($this->streamProphet->reveal());
            $this->repositoryProphet->createBasketItems(\Prophecy\Argument::any(), \Prophecy\Argument::any())->willReturn(true);
            $this->assertTrue($this->userController->postBasket());
        }

    }