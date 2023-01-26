
// author 
let idauthor = document.getElementById('idauthor');
let firstname = document.getElementById('first_name');
let lastname = document.getElementById('last_name'); 
let btn_Updateauthor = document.getElementById('Updateauthor');
let btn_addauthor = document.getElementById('addauthor');
let btncancelauthor = document.getElementById('Cancelauthor')

//function remplaire input 
function RemplireUauthor( id , first, last){
btn_Updateauthor.removeAttribute('hidden');
btncancelauthor.removeAttribute('hidden');
btn_addauthor.style.display="none";
idauthor.value=id;
firstname.value=first;
lastname.value = last;
}
/// function delete 
function deleteauthor(id){
    console.log(id);
    Swal.fire({
        background: '#1e1e2d',
        color: '#F0F6FC',
        title: 'Are you sure you want to delete this author?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
        // after confirmation is succesfull
        if (result.isConfirmed) {
            Swal.fire({ background: '#1e1e2d', color: '#F0F6FC', title: 'Deleted!', text: 'author has been deleted successfully. ', icon: 'error' });
            // using ajax to send data without refresh
            $.ajax({
                url: 'home',
                method: 'POST',
                data: { Deleteauthor: id },
                dataType: 'html',
                success: function () {
                    // removing element from dom
                    document.querySelector(`#author${id}`).remove();
                },
            });
        }
    });
}
/// __________________  category  ___________________

let nameCategory = document.getElementById('Category')
let idcategory = document.getElementById('idcategory')
let btnaddcategory = document.getElementById('addCategory')
let btnuppdatecategory = document.getElementById('UpdateCategory')
let btncancel = document.getElementById('CancelCategory')

// function pour remplaire les input de category 
function Editcategory(id , name){
btnuppdatecategory.removeAttribute('hidden');
btncancel.removeAttribute('hidden');
btnaddcategory.style.display="none";
nameCategory.value=name;
idcategory.value=id;
}

// delete category
/// function delete 
function deleteCategory(id){
    Swal.fire({
        background: '#1e1e2d',
        color: '#F0F6FC',
        title: 'Are you sure you want to delete this Category?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
        // after confirmation is succesfull
        if (result.isConfirmed) {
            Swal.fire({ background: '#1e1e2d', color: '#F0F6FC', title: 'Deleted!', text: 'Category has been deleted successfully. ', icon: 'error' });
            // using ajax to send data without refresh
            $.ajax({
                url: 'home',
                method: 'POST',
                data: { DeleteCategory: id },
                dataType: 'html',
                success: function () {
                    // removing element from dom
                    document.querySelector(`#category${id}`).remove();
                },
            });
        }
    });
}
 



// Prevent Bootstrap dialog from blocking focusin
$(document).on('focusin', function(e) {
    if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
      e.stopImmediatePropagation();
    }
  });
 

function addart(){
    const article = document.getElementById('form1');
    const articles = document.getElementById('allForms');
  
  
    let Copyarticle = article.cloneNode(true);
    var newBtn = document.createElement("a");
    newBtn.className = "btn btn-secondary";
    newBtn.innerHTML = "Remove";
    newBtn.addEventListener("click",function remove(){
      Copyarticle.remove();
    });
  
    Copyarticle.appendChild(newBtn);
  
    articles.appendChild(Copyarticle)
}

    // document.getElementById('addart').addEventListener("click",(e)=>{
    //     // const article = document.getElementById('form1');
    //     e.preventDefault();
    //         const article = document.getElementById('form1');
    //         const articles = document.getElementById('allForms');
          
          
    //         let Copyarticle = article.cloneNode(true);
    //         var newBtn = document.createElement("a");
    //         newBtn.className = "btn btn-secondary";
    //         newBtn.innerHTML = "Remove";
    //         newBtn.addEventListener("click",function remove(){
    //           Copyarticle.remove();
    //         });
          
    //         Copyarticle.appendChild(newBtn);
          
    //         articles.appendChild(Copyarticle)
          
    //     }); 

        let arr =[];
    function serach(){
        let recherche = document.getElementById('recherche').value;
        console.log(recherche);
            $.ajax({
                url: '../../BlogCultureDev/controle/ArticleController.php',
                method: 'POST',
                data: { search: recherche },
                dataType: 'html',
                success: function (data) {
                    data = JSON.parse(data)
                    arr=data;
                    console.log(data);
                    let searchTable = document.getElementById('searchTable');
                    searchTable.innerHTML = "";
                    if(arr.length!=0){
                        arr.forEach(e =>{
                            searchTable.innerHTML +=`                
                            <tr class="align-middle" id="art${e.Id}"> 
                            <td class="col-1 text-center">${e.Id}</td>
                            <td class="col-1 text-center">${e.title}</td>
                            <td class="col-1 text-center">${e.categoryname} </td>
                            <td class="col-1 text-center">${e.lastnameauthor}</td>
                            <td class="col-1 text-center">${e.content}</td>
                             <td id="" class="text-nowrap text-center">${e.date_created}</td>
                             <td id="" class="text-nowrap text-center rounded-circle"><img src="../../BlogCultureDev/asset/uploads/${e.image}"  style="width: 50px ; height: 40px;" alt=""></td>
                             <td class="text-center">
                             <button onclick="Editarticle(${e.Id})" class="btn btn-sm btn-warning">Edit</button>
                             <button onclick="deletearticle(${e.Id})" class="btn btn-sm btn-danger">Delete</button>
                         </td>
                         </tr> `;
                        });
                    }else{
                        searchTable.innerHTML = ` <td class="col-1 text-center">not found</td>`
                    }
                }
                });
       
              
    }

    // function remplaire form article pour edite
   function Editarticle(id){
    document.getElementById('IdInputhidden').value=id ;
    $.ajax({
        url: '../../BlogCultureDev/controle/ArticleController.php',
        method: 'POST',
        data: { remplairArt:id },
        dataType: 'html',
        success: function (data) {
            data = JSON.parse(data)
            console.log( data[0]['id_author']);
         document.getElementById('TitleInput').value =data[0]['title'];
         document.getElementById('exampleFormControl').value =data[0]['content'];
         document.getElementById('date_created').value =data[0]['date_created'];
         document.getElementById('CategoryInput').value =data[0]['id_category'];
         document.querySelector(`#authorselect option[value="${data[0]['id_author']}"]`).setAttribute('selected', 'selected')
         document.querySelector('#addart').setAttribute('hidden','hidden');
         document.querySelector('#saveArt').setAttribute('hidden','hidden');
         document.querySelector('#Updateart').removeAttribute('hidden');
        }
     });
   }

//    delete admin 
function deleteadmin(id){
    Swal.fire({
        background: '#1e1e2d',
        color: '#F0F6FC',
        title: 'Are you sure you want to delete this Category?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
        // after confirmation is succesfull
        if (result.isConfirmed) {
            Swal.fire({ background: '#1e1e2d', color: '#F0F6FC', title: 'Deleted!', text: 'Category has been deleted successfully. ', icon: 'error' });
            // using ajax to send data without refresh
            $.ajax({
                url: 'home',
                method: 'POST',
                data: { Deletadmin: id },
                dataType: 'html',
                success: function () {
                    // removing element from dom
                    document.querySelector(`#admin${id}`).remove();
                },
            });
        }
    });
}

//    delete article 
function deletearticle(id){
    Swal.fire({
        background: '#1e1e2d',
        color: '#F0F6FC',
        title: 'Are you sure you want to delete this Category?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
        // after confirmation is succesfull
        if (result.isConfirmed) {
            Swal.fire({ background: '#1e1e2d', color: '#F0F6FC', title: 'Deleted!', text: 'Category has been deleted successfully. ', icon: 'error' });
            // using ajax to send data without refresh
            $.ajax({
                url: 'article',
                method: 'POST',
                data: { Deletearte: id },
                dataType: 'html',
                success: function () {
                    // removing element from dom
                    document.querySelector(`#art${id}`).remove();
                },
            });
        }
    });
}
 
