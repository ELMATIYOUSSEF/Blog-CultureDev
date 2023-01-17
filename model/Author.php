<?php

// declare(strict_types=1);
// namespace model;

class Author extends Person
{

    public function __construct($id, $first_name, $last_name)
    {
        parent::__construct($id, $first_name, $last_name);
    }
    
    static public function createAuthor($data)
    {
        $sql= 'insert into author (first_name,last_name) values(:first_name,:last_name)';
        $stmt  = database::connect()->prepare($sql);
        $stmt -> bindParam(':first_name',$data['first_name']);
        $stmt -> bindParam(':last_name', $data['last_name']);
        try {
            $stmt -> execute();
            // $stmt->close();
            // $stmt = NULL ;
            return 1 ;
        } catch (Exception $e) {
           return $e ;
        }
       
    }
    static public function getAllAuthor(){
        $sql ="select * from author";
        $stmt = database::connect() -> prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll();
        // $stmt ->close();
        // $stmt =null ;
    }

}
