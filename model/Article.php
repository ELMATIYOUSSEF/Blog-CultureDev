<?php

// declare(strict_types=1);
// namespace model;

class Article
{

    public  $id;
    public  $title;
    public  $content;
    public  $date_created;
    public  $id_category;
    public  $id_author;

    /**
     * Default constructor
     */
    public function __construct($id, $title, $id_category, $id_author, $content, $date_created)
    {
       $this->id = $id;
       $this->title = $title;
       $this->content = $content;
       $this->date_created =$date_created;
       $this->id_category=$id_category;
       $this->id_author =$id_author;
    }


    
    static public function createArticle($data)
    {
        $sql= 'insert into article (title,id_category,id_author,content,date_created,image) values(:title,:id_category,:id_author,:content,:date_created,:image)';
        $stmt  = database::connect()->prepare($sql);
        $stmt -> bindParam(':title',$data['title']);
        $stmt -> bindParam(':id_category', $data['id_category']);
        $stmt -> bindParam(':id_author',$data['id_author']);
        $stmt -> bindParam(':content',$data['content']);
        $stmt -> bindParam(':date_created',$data['date_created']);
        $stmt -> bindParam(':image',$data['image']);
        try {
            $stmt -> execute();
            return 1 ;
        } catch (Exception $e) {
           return $e ;
        }
    }

    static public function getAllArticle()
    {
        $sql ="SELECT ar.* , cat.name as categoryname , au.last_name as lastnameauthor FROM article ar JOIN author au on au.Id=ar.id_author JOIN category cat on cat.Id =ar.id_category";
        $stmt = database::connect() -> prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll();
       
    }

    static public function updatArticle( $id)
    {
        
    }

    static public function deleteArticle($id)
    {
        $sql ="delete from article where id=:id";
        $stmt = database::connect() -> prepare($sql);
        $stmt -> bindParam(':id',$id);
        $stmt -> execute();
        return true;
    }

   
    static public function getArticleById( $id)
    {
        $sql ="select * from article where id =:id";
        $stmt = database::connect() -> prepare($sql);
        $stmt -> bindParam(':id',$id);
        $stmt -> execute();
        return $stmt->fetchAll();
    }




}
