<?php

    class UsersRepository implements \Interfaces\RepositoryInterface
    {
        private $userObject = "
                u.id, 
                u.username, 
                u.created,
                u.updated";
        private $basketObject = "
                b.id, 
                b.user_id, 
                b.product_id, 
                b.quantity,
                p.name,
                p.price,
                b.created,
                b.updated";

        public function __construct(
            MysqliDb $db
        ) {
            $this->db = $db;
        }

        public function get()
        {
            $users = $this->db->get('users', null, $this->userObject);
            if (!$users) {
                throw new \InvalidArgumentException('No data found.');
            }

            return $users;
        }

        public function getById($id)
        {
            # code...
        }

        public function getCartItems($id)
        {
            $this->db->join('products p', 'p.id=b.product_id', 'LEFT');
            $this->db->where('b.user_id', $id);
            $basketItems = $this->db->get('basket b', null,  $this->basketObject);
             if (!$basketItems) {
                throw new \InvalidArgumentException('No data found.');
            }

            return $basketItems;
        }

        public function createBasketItems($data)
        {
            $item = new \Model\Basket($data);
            if (!$this->db->insert('basket', $item->toArray())) {

                throw new \InvalidArgumentException('Failed To create');
            }

            return true;
        }
        
    }
