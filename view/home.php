<?php   
 require_once dirname(__DIR__) . '/controle/AuthorController.php';
 $AuthorController = new AuthorController();
 if(isset($_POST['addauthor'])){
  $AuthorController->create_C_Author();
}
if(isset($_POST['Deleteauthor'])){
    $AuthorController->DeleteC_Allauthor($_POST['Deleteauthor']);
}
if(isset($_POST['Updateauthor'])){
    $AuthorController->update_C_Author( $_POST['id'], $_POST['first_name'],$_POST['last_name']);
}

$author = $AuthorController->get_C_Allauthor();
// count author
try {
    //code...
        $countauthor=0;
    foreach ($author as $key) {
        $countauthor+=1;
    }
} catch (Exception $th) {
    echo $th;
}

$CategoryController = new CategoryController();
if(isset($_POST['addCategory'])){
 $CategoryController->create_C_Category();
}
if(isset($_POST['DeleteCategory'])){
    $CategoryController->DeleteC_Category($_POST['DeleteCategory']);
}
if(isset($_POST['UpdateCategory'])){
    $CategoryController->update_C_category($_POST['idcategory'],$_POST['name']);
}
$category =$CategoryController->get_C_AllCategory();

// count author
try {
    //code...
        $countcategory=0;
    foreach ($category as $key) {
        $countcategory+=1;
    }
} catch (Exception $th) {
    echo $th;
}


$adminController = new AdminController();
$admins = $adminController->get_C_AllAdmin();
if(isset($_POST['Deletadmin'])){
    $adminController->delete_C_Admin($_POST['Deletadmin']);
}
 $home = new HomeController();
 $home->logout();

 ?>

<div class="row">
    <div class="col-3 nav">
    <?php require_once './view/includes/sidebar.php'?>
    </div>
    <div class="col-9 scrolling-div">
        
    <div class="container"> 
    <h3 class ="p-5">Pages <span>/</span> Home</h3> 
        <?php include('includes/alerts.php');?>
        <div class="">

        
                <div class="card ">
                            <div class="card-header">
                            statistique :
                            </div>
                            <div class="card-body">
                    <div class="row row-cols-1 w-100 row-cols-md-4 g-4 d-flex gap-5 justify-content-center align-items-center text-center">
                        <div class="col">
                                <div class="card ">
                                <h5 class="card-header text-center">Author</h5>
                                <div class="card-body d-flex   bg-primary p-2 text-white bg-opacity-100 justify-content-around align-items-center  ">
                                    <h1 class="card-title"><?=$countauthor ;?></h1>
                                    <lord-icon
                                        src="https://cdn.lordicon.com/bhfjfgqz.json"
                                        trigger="hover"
                                        colors="primary:#fff"
                                        style="width:50px;height:50px">
                                    </lord-icon>
                                </div>
                                </div>
                        </div>
                        <div class="col ">
                            <div class="card ">
                                <h5 class="card-header text-center">Article</h5>
                                <div class="card-body bg-warning p-2 text-white bg-opacity-100 d-flex bg-success p-2 text-white bg-opacity-75 justify-content-around align-items-center  ">
                                    <h1 class="card-title"><?=@$_SESSION['countarticle'];?></h1>
                                    <lord-icon
                                    src="https://cdn.lordicon.com/vufjamqa.json"
                                        trigger="hover"
                                        colors="primary:#fff"
                                        style="width:50px;height:50px">
                                    </lord-icon>
                                </div>
                            </div>
                        
                        </div>

                        <div class="col">
                        <div class="card ">
                            <h5 class="card-header text-center">Category</h5>
                            <div class="card-body bg-success p-2 text-white bg-opacity-100 d-flex  justify-content-around align-items-center  ">
                                <h1 class="card-title"><?=$countcategory ;?></h1>
                                <lord-icon
                                    src="https://cdn.lordicon.com/svbmmyue.json"
                                    trigger="hover"
                                    colors="primary:#fff"
                                    style="width:50px;height:50px">
                                </lord-icon>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
                    <!-- ------------ -->
                  
    <div class="card" id="card">
    <h5 class="px-5 mt-5"> <strong> Add Author && Category :</strong></h5>
            <div class="row row-cols-1 w-100 row-cols-md-2  pt-5 d-flex  justify-content-space-evenly align-items-start ">
                        <form class="px-4 " method="post">
                        <div class="card ">
                            <div class="card-header">
                                Author
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="id" id="idauthor">
                            <div class="mb-3">
                            <label for="first_name" class="form-label">first_name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name ...">
                            </div>
                            <div class="mb-3">
                            <label for="last_name" class="form-label">last_name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name ...">
                            </div>
                            </div>
                            <div class="card-footer">
                                <button name="addauthor" id="addauthor" class="btn btn-primary">Add author</button>
                                <button hidden id="Updateauthor" name="Updateauthor" class="btn btn-warning">Update author</button>
                                <a href="home" hidden id="Cancelauthor"class="btn btn-Secondary">cancel</a>
                            </div>
                            
                        </div>
                        </form>
                    
                        <form class="px-4 " method="post">
                        <div class="card ">
                            <div class="card-header">
                                Category
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="idcategory" id="idcategory">
                            <div class="mb-3">
                            <label for="Category" class="form-label">Category name :</label>
                            <input type="text"  name="name" class="form-control" id="Category" placeholder="name ...">
                            </div>
                            </div>
                            <div class="card-footer">
                            <button id="addCategory" name="addCategory" class="btn btn-primary">Add Category</button>
                            <button hidden id="UpdateCategory" name="UpdateCategory" class="btn btn-warning">Update Category</button> 
                            <a href="home" hidden id="CancelCategory"class="btn btn-Secondary">cancel</a>
                            </div>
                        </div>
                        </form>
                    

            </div>

    <!-- all author -->
    <h5 class="px-5 py-5"> <strong> ALL Author :</strong></h5>
            <div class="card py-4  table table-responsive">
                        <table class="table bg-white rounded shadow-sm  table-hover table-responsive">
                            <thead>
                                    <tr>
                                        <th class="text-center" scope="col">Id</th> 
                                        <th class="text-center" scope="col">first name</th>
                                        <th class="text-center" scope="col">last name</th>
                                        <th class="text-center" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(empty($author))
                                                            echo '<tr class="align-middle"><th class="col-3">No result found.</th> </tr>';
                                                        else{ foreach ($author as $auth ){?>   
                                     <tr class="align-middle" id="author<?=$auth['Id']?>">
                                                <td class="col-1 text-center"><?=$auth['Id'] ?></td>
                                                <td id="" class="text-nowrap text-center"><?=$auth['first_name'] ?></td>
                                                <td id="" class="text-nowrap text-center"><?=$auth['last_name'] ?></td>
                                                <td class="text-center">
                                                <a href="#card" onclick="RemplireUauthor(<?=$auth['Id']; ?>,'<?=$auth['first_name']; ?>','<?=$auth['last_name']; ?>')" class="btn btn-sm btn-warning">Edit</a>
                                                <button onclick="deleteauthor(<?=$auth['Id'] ?>)" class="btn btn-sm btn-danger">Delete</button>
                                                </td>

                                            </tr> 
                                            <?php } }?>   
                                </tbody>
                            
                        </table>
                    </div>

    <!-- all Category -->
            
    <h5 class="px-5 py-5"> <strong> ALL Category :</strong></h5>
            <div class="card py-4 table table-responsive">
            <table class="table bg-white rounded shadow-sm  table-hover table-responsive">
                            <thead>
                                    <tr>
                                        <th class="text-center" scope="col">Id</th> 
                                        <th class="text-center" scope="col">Category </th>
                                        <th class="text-center" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(empty($category))
                                                            echo '<tr class="align-middle"><th class="col-3">No result found.</th> </tr>';
                                                        else{ foreach ($category as $cat ){?>   
                                               <tr class="align-middle" id="category<?=$cat['Id']?>"> 
                                                <td class="col-1 text-center"><?=$cat['Id'] ?></td>
                                                <td id="" class="text-nowrap text-center"><?=$cat['name'] ?></td>
                                                <td class="text-center">
                                                <a href="#card" onclick="Editcategory(<?=$cat['Id'];?>,'<?=$cat['name'] ;?>')" class="btn btn-sm btn-warning">Edit</a>
                                                <button onclick="deleteCategory(<?=$cat['Id'];?>)" class="btn btn-sm btn-danger">Delete</button></a>
                                                </td>
                                            </tr> 
                                            <?php } }?>   
                                </tbody>
                            
                        </table>
                    </div>
    
    <!-- all Admin -->
            
    <h5 class="px-5 py-5"> <strong> ALL Admins :</strong></h5>
            <div class="card py-4  table table-responsive">
            <table class="table bg-white rounded shadow-sm  table-hover table-responsive">
                            <thead>
                                    <tr>
                                        <th class="text-center" scope="col">Id</th> 
                                        <th class="text-center" scope="col">First_name </th>
                                        <th class="text-center" scope="col">last_name</th>
                                        <th class="text-center" scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(empty($admins))
                                                            echo '<tr class="align-middle"><th class="col-3">No result found.</th> </tr>';
                                                        else{ foreach ($admins as $admin ){?>   
                                               <tr class="align-middle" id="admin<?=$admin['Id']?>"> 
                                               <td class="col-1 text-center"><?=$admin['Id'] ?></td>
                                                <td class="col-1 text-center"><?=$admin['first_name'] ?></td>
                                                <td id="" class="text-nowrap text-center"><?=$admin['last_name'] ?></td>
                                                <td id="" class="text-nowrap text-center"><?=$admin['Email'] ?></td>
                                                <td class="text-center">
                                                  <button onclick="deleteadmin(<?=$admin['Id'] ; ?>)" class="btn btn-sm btn-danger">Delete</button></a>
                                                </td>
                                            </tr> 
                                            <?php } }?>   
                                </tbody>
                            
                        </table>
                    </div>

        </div>

</div>
               