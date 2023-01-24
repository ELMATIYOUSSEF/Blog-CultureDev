<?php

// declare(strict_types=1);
// namespace model;

class Admin extends Person
{
    protected string $password;
    protected string $email;

   
    public function __construct( string $first_name, string $last_name, string $password, string $email)
    {
        parent::__construct($first_name, $last_name);
        //THIS PASS && EMAIL
    }


    static public function createAdmin($data)
    {
        $sql= 'insert into admin (first_name,last_name,Email,PassWord) values(:first_name,:last_name ,:Email,:PassWord)';
        $stmt  = database::connect()->prepare($sql);
        $stmt -> bindParam(':first_name',$data['first_name']);
        $stmt -> bindParam(':last_name', $data['last_name']);
        $stmt -> bindParam(':Email',$data['Email']);
        $stmt -> bindParam(':PassWord',$data['PassWord']);
        try {
            $stmt -> execute();
            echo("ttttttt");
            return 1 ;
            // $stmt->close();
            // $stmt = NULL ;
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
        // $stmt ->close();
        // $stmt =null ;
    }

   
    static public function getAdminById( $id)
    {
        $sql ="select * from admin where id =:id";
        $stmt = database::connect() -> prepare($sql);
        $stmt -> bindParam(':id',$id);
        $stmt -> execute();
        return $stmt->fetchAll();
        // $stmt ->close();
        // $stmt =null ;
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
        // $stmt ->close();
        // $stmt =null ;
    }
    static function getEmailDb($email){
        $sql = "SELECT * FROM admin WHERE Email='$email'";
        $stmt = database::connect()-> prepare($sql);
        $stmt -> execute();
        $result=$stmt->fetchAll();
        return $result;
        // $stmt ->close();
        // $stmt =null ;
    }
    
}