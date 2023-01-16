<?php

// declare(strict_types=1);
// namespace model;

class Category
{

    public int $id;
    public string $name;

    /**
     * Default constructor
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name ;
    }

    static public function createCategory($data)
    {
        $sql= 'insert into category (name) values(:name)';
        $stmt  = database::connect()->prepare($sql);
        $stmt -> bindParam('name',$data);
        try {
            $stmt -> execute();
            return 1 ;
            $stmt->close();
            $stmt = NULL ;
        } catch (Exception $e) {
           return $e ;
        }
    }
    static public function getAllCategory()
    {
        $sql ="select * from category";
        $stmt = database::connect() -> prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll();
        $stmt ->close();
        $stmt =null ;// sa c'est just pour evete loverture de l'aconnection 
    }

    // createCategory($name);

}
