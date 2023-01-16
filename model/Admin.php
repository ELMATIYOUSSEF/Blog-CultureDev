<?php

// declare(strict_types=1);
// namespace model;

class Admin extends Person
{
    protected string $password;
    protected string $email;

   
    public function __construct(int $id, string $first_name, string $last_name, $category, string $password, string $email)
    {
        parent::__construct($id, $first_name, $last_name);
    }


    static public function createAdmin($data)
    {
        $sql= 'insert into admin (first_name,last_name,category,password,email) values(:first_name,:last_name,:category,:password,:email)';
        $stmt  = database::connect()->prepare($sql);
        $stmt -> bindParam(':first_name',$data['first_name']);
        $stmt -> bindParam(':first_name', $data['last_name']);
        $stmt -> bindParam(':category',$data['category']);
        $stmt -> bindParam(':password',$data['password']);
        $stmt -> bindParam(':email',$data['email']);
        try {
            $stmt -> execute();
            return 1 ;
            $stmt->close();
            $stmt = NULL ;
        } catch (Exception $e) {
           return $e ;
        }
    }
    
    
    static public function deleteAdmin($id)
    {
        $sql ="delete from admin where id=:id";
        $stmt = database::connect() -> prepare($sql);
        $stmt -> bindParam(':id',$id);
        $stmt -> execute();
        return true;
        $stmt ->close();
        $stmt =null ;
    }

   
    static public function getAdminById( $id)
    {
        $sql ="select * from admin where id =:id";
        $stmt = database::connect() -> prepare($sql);
        $stmt -> bindParam(':id',$id);
        $stmt -> execute();
        return $stmt->fetchAll();
        $stmt ->close();
        $stmt =null ;
    }
     static public function updatAdmin( $id )
    {
        return false;
    }

    // her i will working with innerjoin 
    static public function getAllAdmin(){
        $sql ="select * from admin";
        $stmt = database::connect() -> prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll();
        $stmt ->close();
        $stmt =null ;
    }
    
}