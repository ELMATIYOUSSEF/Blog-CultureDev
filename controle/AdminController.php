<?php

declare(strict_types=1);


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
        if (isset($_POST['SignUp'])) {
          
            $name = htmlspecialchars(trim($_POST['first_name']));
            $last_name = htmlspecialchars(trim($_POST['last_name']));
            $email = filter_var($_POST['SigninEmail'], FILTER_VALIDATE_EMAIL);
            $password = htmlspecialchars(trim(password_hash($_POST['SigninPassWord'], PASSWORD_BCRYPT)));
            if (!empty($name) && !empty($last_name) && !empty($password) && !empty($email)) {
                $count=0;
                $result = Admin::getEmailDb($email);
               foreach ($result as $key ) {
                $count++;
               }
                if ($count == 0) {
                    $data = array('first_name' => $name, 'last_name' => $last_name, 'Email' => $email, 'PassWord' => $password);
                    $result = Admin::createAdmin($data);
                    if ($result == 1) {
                        Session::set('Success', 'Article Ajoute avec success');
                        Redirect::to('login');
                    } else
                        echo $result;
                } else {
                    Session::set('error', 'this Email is already exist');
                    Redirect::to('Singin');
                }
            } else {
                Session::set('error','check your informations');
                Redirect::to('Singin');
            }
        }
}
    
public function SignIn(){
    $email=$_POST['email'];
    $password=$_POST['password'];    
    $result = Admin::getEmailDb($email);

   
    if (password_verify($password, $result[0][4]))
    {
        if($result[0][3] == $email)
            {
                $_SESSION['admin']='true';
                Session::set('info','welcom '.$result[0][1]);
                Redirect::to('home');
            }
        else
            {
                Session::set('error','email is wrong');
                Redirect::to('login');
            }
    } 
    
    else
        {
            Session::set('error','password is wrong');
            Redirect::to('login');
        }  

    }

 
       
}

?>