<?php

namespace Source\Models;

use Source\Core\Connect;

class State
{
    private $id;
    private $state;

    /**
     * @param $id
     * @param $theme
     */
    public function __construct($id = null, $state = null)
    {
        $this->id = $id;
        $this->state = $state;
    }
    
    
    public function selectAll()
    {
        $query = "SELECT * FROM states";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
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
     * Get the value of state
     */ 
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }
}