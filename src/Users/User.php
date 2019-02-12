<?php

namespace Model;

class User implements \Interfaces\ModelInterface
{
    protected $id;
    protected $username;
    protected $email;
    protected $created;
    protected $updated;

    public function __construct($user)
    {
        $this->id               = $user['id'] ?? null;
        $this->username        = $user['first_name'] ?? null;
        $this->email            = $user['email'] ?? null;
        $this->created        = $user['created_on'] ?? date('Y-m-d H:i:s');
            
        if ($doValidation) {
            $this->validateData();
        }
                
        if ($this->id) {
            $this->updated = date('Y-m-d H:i:s');
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->userName;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($userName)
    {
        $this->userName = $userName;
    }

    public function toArray()
    {
        return [
                    'id'                => $this->id,
                    'username'        => $this->username,
                    'email'         => $this->email),
                    'created'        => $this->created,
                    'updated'      => $this->updated
                ];
    }
}
