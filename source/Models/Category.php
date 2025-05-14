<?php

namespace Source\Models;

use Source\Core\Connect;

class Category
{
    private $id;
    private $theme;

    /**
     * @param $id
     * @param $theme
     */
    public function __construct($id = null, $theme = null)
    {
        $this->id = $id;
        $this->theme = $theme;
    }

    public function selectAll()
    {
        $query = "SELECT * FROM categories";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }

}