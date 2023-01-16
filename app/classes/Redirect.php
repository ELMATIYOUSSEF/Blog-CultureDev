<?php

// namespace model;

class Redirect{
    static public function to ($page){
        header('location:'.$page);
    }
}

?>