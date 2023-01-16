<?php
// namespace model;
class database{

    static public function connect(){
        $db= new PDO("mysql:host=localhost;dbname=culturedev","root","");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        return $db;
    }
}




?>