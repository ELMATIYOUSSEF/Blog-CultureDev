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
        $sql= 'insert into article (title,id_category,id_author,content,date_created) values(:title,:id_category,:id_author,:content,:date_created)';
        $stmt  = database::connect()->prepare($sql);
        $stmt -> bindParam(':title',$data['title']);
        $stmt -> bindParam(':id_category', $data['id_category']);
        $stmt -> bindParam(':id_author',$data['id_author']);
        $stmt -> bindParam(':content',$data['content']);
        $stmt -> bindParam(':date_created',$data['date_created']);
        try {
            $stmt -> execute();
            return 1 ;
        } catch (Exception $e) {
           return $e ;
        }
        $stmt->close();
        $stmt = NULL ;
    }

    static public function getAllArticle()
    {
        $sql ="select * from article";
        $stmt = database::connect() -> prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll();
        $stmt ->close();
        $stmt =null ;// sa c'est just pour evete loverture de l'aconnection 
    }

    static public function updatArticle( $id)
    {
        
    }

    static public function deleteArticle($id)
    {
        $sql ="sdelete from article where id=:id";
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
        $stmt ->close();
        $stmt =null ;
    }




}
