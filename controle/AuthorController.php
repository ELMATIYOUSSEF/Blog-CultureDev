<?php
// namespace model;

class AuthorController{
    public function get_C_Allauthor(){
        $Authors= Author::getAllAuthor();
        return $Authors;
    }

       
    public function create_C_Author(){
        if (isset($_POST['addauthor'])){
            $firstname=htmlspecialchars(trim($_POST['first_name']));;
            $lastname=htmlspecialchars(trim($_POST['last_name']));;
            if (!empty($firstname) && !empty($lastname)) {
            $data = array('first_name'=>$firstname,'last_name'=>$lastname);
            $result = Author::createAuthor($data);
            if($result ==1){
                Session::set('Success','Author Ajoute avec success');
                Redirect::to('home');
            }
            else echo $result ;
            }
            else{
                Session::set('error','veuillez remplir tous les champs obligatoires');
            Redirect::to('home');
            }
        };
    }

    public function DeleteC_Allauthor($id){
        $result= Author::deleteAuthor($id);
        if($result ==1){
            Session::set('Success','Delete Author avec success');
            Redirect::to('home');
        }
        else echo $result ;
    }

    public function update_C_Author($id,$first,$last){
        $result= Author::updatauthor( $id, $first,$last);
        if($result ==1){
            Session::set('Success','Update Author avec success');
            Redirect::to('home');
        }
        else echo $result ;
    }
}

?>