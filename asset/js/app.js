
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
    console.log(id);
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