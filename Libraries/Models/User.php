<?php


namespace General\Models;

use General\DatabaseFunction;


class User
{
    protected $firstName;
    protected $id_user;
    protected $lastName;
    protected $userName;
    protected $type_compte;
    protected $error = [];

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    /**
     * @param array $donnees
     */
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $key = DatabaseFunction::remplacement($key, "_");
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->id_user;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @return mixed
     */
    public function getTypeCompte()
    {
        return $this->type_compte;
    }

    public function isAdmin(): bool
    {
        return $this->type_compte = "admin";
    }

    /**
     * If an error in the creation user is found for the connexion
     * return false and we can informate the user to fixe his miss field
     *
     */

    public function isValid(): bool
    {
        return empty($this->error);
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        if(empty($firstName)){
            $this->error['firstName'] = "vide";
        }
        $this->firstName = $firstName;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        if(empty($lastName)){
            $this->error['lastName'] = "vide";
        }
        $this->lastName = $lastName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        if(empty($userName)){
            $this->error['userName'] = "vide";
        }
        $this->userName = $userName;
    }

    /**
     * @param mixed $type_compte
     */
    public function setTypeCompte($type_compte)
    {
        $this->type_compte = $type_compte;
    }



}