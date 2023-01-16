<?php

// namespace model;

class AdminController{
    public function get_C_AllAdmin(){
        $Admins= Admin::getAllAdmin();
        return $Admins;
    }

    public function get_C_OneAdmin(){
        $id=$_POST['id'];
        $Admin= Admin::getAdminById( $id);
        return $Admin;
    }
       
    public function create_C_Admin(){
        if (isset($_POST['submit'])){
            $data = array('first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'category'=>$_POST['category'],'password'=>$_POST['password'],'email'=>$_POST['email']);
        };
        $result = Admin::createAdmin($data);
        if($result ==1){
            Session::set('Success','Article Ajoute avec success');
            Redirect::to('home');
        }
        else echo $result ;
    }
}

?>