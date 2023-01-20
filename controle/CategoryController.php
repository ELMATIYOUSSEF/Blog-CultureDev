<?php

class CategoryController{
    public function get_C_AllCategory(){
        $cat= Category::getAllCategory();
        return $cat;
    }
       
    public function create_C_Category(){
        if (isset($_POST['addCategory'])){
            $name =htmlspecialchars(trim($_POST['name']));
            if(!empty($name)){
                $result = Category::createCategory($name);
                if($result ==1){
                    Session::set('Success','Category Ajoute avec success');
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

    public function DeleteC_Category($id){
        $result= Category::deleteCategory($id);
        if($result ==1){
            Session::set('Success','Delete Category  avec success');
            Redirect::to('home');
        }
        else echo $result ;
    }

    public function update_C_category($id,$name){
        $result= Category::updatCategory( $id, $name);
        if($result ==1){
            Session::set('Success','Update Category avec success');
            Redirect::to('home');
        }
        else echo $result ;
    }
}

?>