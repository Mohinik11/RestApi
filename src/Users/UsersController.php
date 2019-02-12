<?php

    namespace Controller;

    class UsersController
    {       
        public function __construct(
            \UsersRepository $repository,
            \Zend\Diactoros\ServerRequest $request
        ) {
            $this->repository = $repository;
            $this->request =  $request;
        }

        public function getUsers()
        {
            return $this->repository->get();
        }

        public function postBasket()
        {
            $postData = json_decode($this->request->getBody()->getContents(), true);
            $this->validateArray($postData);
            $this->validateId($postData['user_id'] ?? null);
            $this->validateId($postData['product_id'] ?? null);
            return $this->repository->createBasketItems($postData);
        }

        public function getCartItems($id)
        {
            $this->validateId($id);
            return $this->repository->getCartItems($id);
        }

        private function validateId($id)
        {
            if (!filter_var($id, FILTER_VALIDATE_INT)) {
                throw new \InvalidArgumentException('Invalid ID');
            }
        }

        private function validateArray($data)
        {
            if (!is_array($data)) {
                throw new \InvalidArgumentException('Invalid Data');
            }
        }

    }
