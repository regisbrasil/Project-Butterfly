<?php

namespace Source\Models;
use Source\Core\Connect;

class Work
{
    private $id;
    private $title;
    private $image;
    private $info;
    private $idState;
    private $idCategory;
    private $message;

    /**
     * @param $id
     * @param $title
     * @param $image
     * @param $info
     * @param $state
     * @param $idCategory
     */
    public function __construct(
        int $id = null,
        string $title = null,
        string $image = null,
        string $info = null,
        string $idState = null,
        int $idCategory = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->image = $image;
        $this->info = $info;
        $this->idState = $idState;
        $this->idCategory = $idCategory;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of info
     */ 
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set the value of info
     *
     * @return  self
     */ 
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get the value of state
     */ 
    public function getIdState()
    {
        return $this->idState;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setIdState($idState)
    {
        $this->idState = $idState;

        return $this;
    }

    /**
     * Get the value of idCategory
     */ 
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    /**
     * Set the value of idCategory
     *
     * @return  self
     */ 
    public function setIdCategory($idCategory)
    {
        $this->idCategory = $idCategory;

        return $this;
    }

     public function findByCategory(int $idCategory)
    {
        $query = "SELECT * FROM workart WHERE idCategory = :idCategory";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":idCategory",$idCategory);
        $stmt->execute();
        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }

    public function findByState(int $idState)
    {
        $query = "SELECT * FROM workart WHERE idState = :idState";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":idState",$idState);
        $stmt->execute();
        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }


    public function selectAll()
    {
        $query = "SELECT * FROM workart";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }

    public function insert() : bool
    {
        $query = "INSERT INTO workart (title, image, info, idState, idCategory) 
        VALUES (:title, :image, :info, :idState, :idCategory)";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":info", $this->info);
        $stmt->bindParam(":idState", $this->idState);
        $stmt->bindParam(":idCategory", $this->idCategory);
        $stmt->execute();
        $this->id = Connect::getInstance()->lastInsertId(); // armazena o id do projeto incluido
        $this->message = "Projeto cadastrado com sucesso!";
        // $_SESSION["work"] = $this->image;
        return true;
    }

    public function findById() : bool
    {
        $query = "SELECT * FROM workart WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id",$this->id);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            $work = $stmt->fetch();
            $this->title = $work->title;
            $this->info = $work->info;
            return true;
        }
    }

    public function getById(?int $id)
    {
        $query = "SELECT * FROM workart WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $idQuery = "";
        if (empty($id)) {
            $idQuery = $this->id;
        } else {
            $idQuery = $id;
        }
        $stmt->bindParam(":id", $idQuery);
        $stmt->execute();
        if($stmt->rowCount() == 0){
            return false;
        }
        return $stmt->fetch();
    }

    public function getArray() : array
    {
        return ["user" => [
            "id" =>$this->getId(),
            "title" =>$this->getTitle(),
            "info" => $this->getInfo()
        ]];
    }
    public function update()
    {
        $query = "UPDATE workart SET title = :title, image = :image, info = :info, idState = :idState, idCategory = :idCategory WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":title",$this->title);
        $stmt->bindParam(":image",$this->image);
        $stmt->bindParam(":info",$this->info);
        $stmt->bindParam(":idState",$this->idState);
        $stmt->bindParam(":idCategory",$this->idCategory);
        $stmt->bindParam(":id",$this->id);
        $stmt->execute();
        $arrayWork = [
            "id" => $this->id,
            "title" => $this->title,
            "image" => $this->image,
            "info" => $this->info,
            "idState" => $this->idState,
            "idCategory" => $this->idCategory
        ];
        $this->message = "Postagem alterada com sucesso!";
    }

    public function updateMadeAdm()
    {
        $query = "UPDATE workart SET title = :title, info = :info WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":title",$this->title);
        $stmt->bindParam(":info",$this->info);
        $stmt->bindParam(":id",$this->id);
        $stmt->execute();
        $arrayWork = [
            "id" => $this->id,
            "title" => $this->title,
            "info" => $this->info
        ];
        $this->message = "Obra alterado com sucesso!";
    }
    
    public function findByidUser(int $idUser)
    {
        // return $idUser;
        $query = "SELECT * 
                  FROM workart 
                  JOIN write_work ON workart.id = write_work.idWork
                  WHERE write_work.idUser = :idUser";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":idUser", $idUser);
        $stmt->execute();

        // return $stmt;

        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }

    public function findUserByIdWork(int $id)
    {
        // return $idUser;
        $query = "SELECT * FROM write_work WHERE idWork = :idWork";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":idWork", $id);
        $stmt->execute();

        // return $stmt;

        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }
}