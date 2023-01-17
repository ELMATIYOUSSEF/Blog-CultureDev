<?php     
 require_once dirname(__DIR__) . '/controle/AdminController.php';
 $loginController = new AdminController();
 if(isset($_POST['SignUp'])) $loginController->create_C_Admin();
?>

<div class="row login d-flex justify-content-center">
    <div class="col-8 d-flex justify-content-center">
    <?php include('./includes/alerts.php');?>
            <form class="row g-3 w-50 " method="post">
                   <h1 class=" fw-bold  font-monospace ">Create new Account</h1>
                   <div class="col-6 ">
                        <label for="inputname"   class="form-label"> first_name</label>
                        <input type="text" name="first_name" class="form-control inputColor" id="inputname" placeholder="first_name ..."  required>
                    </div>
                    <div class="col-6 ">
                        <label for="inputname"   class="form-label"> last_name</label>
                        <input type="text" name="last_name" class="form-control inputColor" id="inputname" placeholder="last_name ..."  required>
                    </div>
                    <div class="col-12 ">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" name="SigninEmail" class="form-control inputColor" id="inputEmail4" placeholder="Email@gmail.com"  required>
                    </div>
                    <div class="col-12 ">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" name="SigninPassWord" class="form-control" id="inputPassword4" placeholder="*********"  required >
                    </div>
                   
                    <div class="col-12">
                        <button type="submit" name=" SignUp" class="btn btn-primary">Sign Up</button>
                    </div>
                    </form>      
        </form>
    </div>      
</div>