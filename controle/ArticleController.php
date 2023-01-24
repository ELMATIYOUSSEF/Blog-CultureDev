<?php

// namespace model;

class ArticleController {
    public function get_C_AllArticle(){
        $Articles= Article::getAllArticle();
        return $Articles;
    }

    function uploadimage($image , $i){
        if (isset($_FILES["my_image"]["name"])) 
        {

            $img_name =$image['name'][$i];
            $img_size = $image['size'][$i];
            $tmp_name =$image['tmp_name'][$i];// temporer folder
            $error = $image['error'][$i];
            if(!empty($_FILES['my_image']['name'])){

                if ($error === 0)
                {
                
                    if ($img_size > 3000000) 
                    {
                        Session::set('error','Sorry, your file is too large.');
                        Redirect::to('article');
                        die;
                    }else{
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);// return extension of image
                        $img_ex_lc = strtolower($img_ex);

                        $allowed_exs = array("jpg", "jpeg", "png","jfif"); 

                        if (in_array($img_ex_lc, $allowed_exs)) 
                        {
                            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                            $img_upload_path = dirname(__DIR__).'./asset/uploads/'.$new_img_name;
                            move_uploaded_file($tmp_name, $img_upload_path);//temporer vers  folder


                        }
                        else {
                            Session::set('error',"You can't upload files of this type");
                            Redirect::to('article');
                            die;
                        }
                    }
                }else{
                    Session::set('error','unknown error occurred!');
                    Redirect::to('article');
                    die;
                }
            }else {
                $new_img_name = "null";
            }

        }
        
        return $new_img_name;
    } 

       
    public function create_C_Article(){
        if (isset($_POST['saveArt'])){
            $count = count($_POST['id']);
           
            
            for ($i=0; $i<$count ; $i++){
                $image = $this->uploadimage($_FILES['my_image'],$i) ;
                $data = array('title'=>$_POST['titleauthor'][$i],'id_category'=>$_POST['CategoryInput'][$i],'id_author'=>$_POST['authorselect'][$i],'content'=>$_POST['content'][$i],'date_created'=>$_POST['date_created'][$i] ,'image'=>$image); 
            if($data['image']!=''&&$data['image']!=''&&$data['title']!=''&&$data['id_category']!=''&&$data['id_author']!=''&&$data['content']!=''&&$data['date_created']!=''){
            $result = Article::createArticle($data);
           
            }else{
                Session::set('error','veuillez remplir tous les champs obligatoires');
                    Redirect::to('article');
            }  
            }
            if($result ==1){
                Session::set('Success','Article Ajoute avec success');
                Redirect::to('article');
            }
            else echo $result ;
       
       };
      
    }
}
?>