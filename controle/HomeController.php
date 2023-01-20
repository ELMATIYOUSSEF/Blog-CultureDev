<?php

class HomeController{
    public function logout(){
        if(isset($_POST['logOut'])){
            session_destroy();
            Redirect::to('login');}
    }
    public function index($page){
        include('view/'.$page.'.php');
    }
}

?>