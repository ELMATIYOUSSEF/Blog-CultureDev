<?php     
 require_once dirname(__DIR__) . '/controle/AdminController.php';
 $loginController = new AdminController();
 if(isset($_POST['SignIn'])) $loginController->SignIn();
?>

<div class="row login d-flex justify-content-center">
    <div class="col-8 d-flex justify-content-center">
    <?php include('./includes/alerts.php');?>
            <form class="row g-3 w-50 " method="post" >
                <h1 class=" fw-bold  font-monospace  text-center">Login</h1>
                    <div class="col-12 ">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control inputColor" id="inputEmail4" placeholder="Email@gmail.com"  required>
                    </div>
                    <div class="col-12 ">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="*********" required >
                    </div>
                
                    <div class="col-12">
                        <button type="submit" name="SignIn" class="btn btn-primary">Sign in</button>
                    </div>
                    <p class=""><a href="?page=Singin" class="text-decoration-none"> Create Account !! </a></p>
                    <p class="text-center">Not a member yet? Choose a <br> <strong> BlogCultureDev </strong> plan and get started now!</p>
            </form>
    </div>      
</div>