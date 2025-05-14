<?php

namespace Source\Models;

use Source\Core\Connect;

class WriteWork
{
    private $id;
    private $idWork;
    private $idUser;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdWork()
    {
        return $this->idWork;
    }

    /**
     * @param mixed $idWork
     */
    public function setIdWork($idWork): void
    {
        $this->idWork = $idWork;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser): void
    {
        $this->idUser = $idUser;
    }



    /**
     * @param $id
     * @param $idWork
     * @param $idUser
     */
    public function __construct($id, $idWork, $idUser)
    {
        $this->id = $id;
        $this->idWork = $idWork;
        $this->idUser = $idUser;
    }

    public function writeWorkInsert() : bool
    {
        $query = "INSERT INTO write_work (id, idWork, idUser) 
                  VALUES (NULL, :idWork, :idUser)";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":idWork", $this->idWork);
        $stmt->bindParam(":idUser", $this->idUser);
        $stmt->execute();

        return true;
    }

}