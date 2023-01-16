<?php
// namespace model;

class AuthorController{
    public function get_C_Allauthor(){
        $Authors= Author::getAllAuthor();
        return $Authors;
    }
       
    public function create_C_Author(){
        if (isset($_POST['submit'])){
            $data = array('first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name']);
        };
        $result = Author::createAuthor($data);
        if($result ==1){
            Session::set('Success','Author Ajoute avec success');
            Redirect::to('home');
        }
        else echo $result ;
    }
}

?>