<?php
require_once './view/includes/header.php';

 require_once'./autoload.php';
// require_once'./controle/HomeController.php';

$home = new HomeController();
//all MY Page 
$pages =['home','login','Singin','article'];
// function for detecte wich page usr wont
if(isset($_GET['page'])) {
    if(in_array(@$_GET['page'],$pages)){
        if($_GET['page']=='Singin'|| @$_SESSION['admin']=='true'){
            $page=$_GET['page'];
            $home->index($page);
        }
        else{
            $home->index('login');
        }
    }else{
        include('view/includes/404.php');
    }
}else{
    $home->index('login');
}
require_once './view/includes/footer.php';

?> 