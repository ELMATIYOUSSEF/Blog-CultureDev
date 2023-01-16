<?php

// namespace model;

class ArticleController {
    public function get_C_AllArticle(){
        $Articles= Article::getAllArticle();
        return $Articles;
    }
       
    public function create_C_Article(){
        if (isset($_POST['submit'])){
            $data = array('title'=>$_POST['title'],'id_category'=>$_POST['id_category'],'id_author'=>$_POST['id_author'],'content'=>$_POST['content'],'date_created'=>$_POST['date_created']);
        };
        $result = Article::createArticle($data);
        if($result ==1){
            Session::set('Success','Article Ajoute avec success');
            Redirect::to('home');
        }
        else echo $result ;
    }
}

?>