<?php

class database{
    static public function connect(){
        try {
          //code...
           $db = new PDO("mysql:host=localhost;port=3306;dbname=culturedev;","root","");
          $db ->exec("set names utf8");
          $db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);  
          return $db ;
        } catch (PDOException $e) {
          echo "dosn't connected ".$e;
        }
        
      }
}




?>