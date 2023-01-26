<?php
require_once dirname(__DIR__) . '/controle/AuthorController.php';
 HomeController::logout();
 $ArticleController = new ArticleController();
//  $articles =$ArticleController->search_C_Article();
 $articles = $ArticleController->get_C_AllArticle();
//  update article ;
if (isset($_POST['updateart'])){
$ArticleController->update_C_Article();
}
// count author
try {
    //code...
        $countarticle=0;
    foreach ($articles as $key) {
        $countarticle+=1;
    }
    $_SESSION['countarticle'] =$countarticle ;
} catch (Exception $th) {
    echo $th;
}
if(isset($_POST['saveArt'])){
    $ArticleController->create_C_Article();
}
if(isset($_POST['Deletearte'])){
    $ArticleController->delete_C_Article($_POST['Deletearte']);
}
$CategoryController = new CategoryController();
$categorys =$CategoryController->get_C_AllCategory();
$AuthorController = new AuthorController();
$authors = $AuthorController->get_C_Allauthor();


 
 ?>
<div class="row">
    <div class="col-3">
    <?php require_once './view/includes/sidebar.php'?>
    </div>
    <div class="col-9 scrolling-div ">
        
    <div class="container"> 
    <h3 class ="p-5">Pages <span>/</span> Article</h3> 
    <?php include('includes/alerts.php');?>
        <!-- articale MODAL -->

        <div class="card ">
            <div class="card-header">
                <h5 class="" id="Titlecard">Add article</h5>
            </div>
            <div class="card-body pt-3 pb-1">
                        <form   method="POST"  enctype="multipart/form-data">
                            <div id="allForms" >

                            
                            <div id="form1">
                                <input type="hidden" id="IdInputhidden" name="id[]" value="" />

                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Picture :</label>
                                        <input class="form-control" type="file" id="formFile" name="my_image[]">
                                    </div>

                                    <div class="mb-3">
                                            <label class="col-form-label">title :</label>
                                            <input type="text" class="form-control" id="TitleInput" name="titleauthor[]" />
                                            <div id="ValidateTitle"></div>
                                    </div>
                                            
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Article :</label>
                                            <textarea name="content[]" class="form-control" id="exampleFormControl" rows="3"></textarea>
                                        </div>
                                        <!-- <textarea class="form-control" id="tiny"  name="content[]" ></textarea> -->
                                    </div>

                                    <div class="mb-3">
                                        <label for="date_created" class="col-form-label">date created :</label>
                                        <input type="date" name="date_created[]"  class="form-control" id="date_created">
                                    </div>

                                    <div class="mb-3">
                                        <label class="modal-title my-2" id="exampleModalLabel">Categorie :</label>
                                        <select class="form-select" id="CategoryInput" name="CategoryInput[]" aria-label="Default select example">
                                            <option selected>Please select </option>    
                                            <?php foreach($categorys AS $category){
                                            echo '<option value="'.$category['Id'].'">'.$category['name'].'</option>';
                                                        } ?>
                                        
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="modal-title my-2" id="authorselect">Author :</label>
                                        <select class="form-select" id="authorselect" name="authorselect[]" aria-label="Default select example">
                                            <option selected>Please select </option>    
                                            <?php foreach($authors AS $author){
                                            echo '<option value="'.$author['Id'].'">'.$author['first_name'].' '.$author['last_name'].'</option>';
                                                        } ?>

                                        </select>
                                    </div>

                            </div>
                            </div>
                            <div id="newarticle"></div>
                            <div class="d-flex justify-content-end w-100">
                                <div>
                                <a href="#searchTable" class="btn btn-Secondary" hidden id="cancel">Cancel</a>
                                <button id="saveArt"  name="saveArt"  type="submit" class="btn btn-primary">save</button>
                                <button id="Updateart" name="updateart" type="submit" hidden class="btn btn-warning">update Article</button>
                                </div>
                            </div>
                            
                        </form>
                </div>
                <div class="card-footer" >
                  <button id="addart" onclick="addart()" type="button" class="btn btn-primary">add Article</button>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div><h5 class=""> <strong> all article :</strong></h5></div>
            <div>
             <label class="col-form-label">Recherche by Title :</label> 
            <input type="text" class="form-control" onkeyup="serach()" id="recherche" /> </div>
        </div>
        
            <div class=" py-4 mx-3 table table-responsive">
            <table class="table bg-white rounded shadow-sm table-responsive">
                            <thead>
                                    <tr>
                                        <th class="text-center" scope="col">Id</th> 
                                        <th class="text-center" scope="col">Title </th>
                                        <th class="text-center" scope="col">Category</th>
                                        <th class="text-center" scope="col">author</th>
                                        <th class="text-center" scop="col">content</th>
                                        <th class="text-center" scop="col">dateCreated</th>
                                        <th class="text-center" scop="col">image</th>
                                    </tr>
                                </thead>
                                <tbody id="searchTable">
                                <?php if(empty($articles))
                                                            echo '<tr class="align-middle"><th class="col-3">No result found.</th> </tr>';
                                                        else{ foreach ($articles as $article ){?>   
                                               <tr class="align-middle" id="art<?=$article['Id']?>"> 
                                               <td class="col-1 text-center"><?=$article['Id'] ?></td>
                                               <td class="col-1 text-center"><?=$article['title'] ?></td>
                                               <td class="col-1 text-center"><?=$article['categoryname'] ?></td>
                                               <td class="col-1 text-center"><?=$article['lastnameauthor'] ?></td>
                                               <td class="col-1 text-center"><?=$article['content'] ?></td>
                                                <td id="" class="text-nowrap text-center"><?=$article['date_created'] ?></td>
                                                <td id="" class="text-nowrap text-center"><img src="../../BlogCultureDev/asset/uploads/<?=$article['image'] ?>"  style="width: 50px ; height: 40px;" alt=""></td>
                                                <td class="text-center">
                                                <button href="#form1" onclick="Editarticle(<?=$article['Id']?>)" class="btn btn-sm btn-warning">Edit</button>
                                                <button onclick="deletearticle(<?=$article['Id']?>)" class="btn btn-sm btn-danger">Delete</button>
                                                </td>
                                            </tr> 
                                            <?php } }?>   
                                </tbody>
                        </table>
                    </div>
                      
</div>

