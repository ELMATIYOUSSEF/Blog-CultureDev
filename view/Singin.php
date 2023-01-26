<?php     
 require_once dirname(__DIR__) . '/controle/AdminController.php';
 $loginController = new AdminController();
 if(isset($_POST['first_name'])) $loginController->create_C_Admin();
?>
 <?php include('includes/alerts.php');?>
<div class="row login d-flex justify-content-center">
    <div class="col-8 d-flex justify-content-center">
            <form class="row g-3 w-50 " method="post" id="SignUp">
                   <h1 class=" fw-bold  font-monospace ">Create new Account</h1>
                   <div class="col-6 ">
                        <label for="inputfname"   class="form-label"> first_name</label>
                        <input type="text" name="first_name" class="form-control inputColor" id="inputfname" placeholder="first_name ..."  >
                        <div class="errormsg"></div>
                    </div>
                    <div class="col-6 ">
                        <label for="inputlname"   class="form-label"> last_name</label>
                        <input type="text" name="last_name" class="form-control inputColor" id="inputlname" placeholder="last_name ..."  >
                        <div class="errormsg"></div>
                    </div>
                    <div class="col-12 ">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" name="SigninEmail" class="form-control inputColor" id="inputEmail4" placeholder="Email@gmail.com"  >
                        <div class="errormsg"></div>
                    </div>
                    <div class="col-12 ">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" name="SigninPassWord" class="form-control" id="inputPassword4" placeholder="*********"   >
                        <div class="errormsg"></div>
                    </div>
                   
                    <div class="col-12">
                        <button type="submit" name="SignUp" class="btn btn-primary">Sign Up</button>
                    </div>
                    </form>      
        </form>
    </div>      
</div>