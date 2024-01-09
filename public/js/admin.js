var catdiv = document.getElementById('catdiv');
const xhr = new XMLHttpRequest();
xhr.open('POST', 'http://localhost/Wiki-/Users/displayCategories', true);
xhr.onload = function () {
    let data = [];
    if (xhr.status == 200 && xhr.readyState == 4) {
        data = JSON.parse(xhr.response);
        for (let i = 0; i < data.length; i++) {
            catdiv.innerHTML += `
            <div class="relative group bg-gray-900 py-5 sm:py-20 px-4 flex flex-col space-y-2 items-center cursor-pointer rounded-md hover:bg-gray-900/80 hover:smooth-hover">
            <span><img src="${data[i][4]}"></span>
            <h4 class="text-white text-2xl font-bold capitalize text-center">${data[i][1]}</h4>
            <h4 class="catid  text-white text-2xl font-bold capitalize text-center">Added: ${data[i][2]}</h4>
            <h4 class="catid hidden text-white text-2xl font-bold capitalize text-center">${data[i][0]}</h4>
            <div class="flex w-[80%] justify-between mt-5">
            <button class="deletecat"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 448 512"><path fill="#e3e3e3" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
            <button class="updatecat"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><path fill="#bdbdbd" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg></button>
            </div>
            </div>
            `;
        }
        Categorymethods(); 
        crudcat(); 
    }
};
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.send();

function Categorymethods() {
    const addcategory = document.getElementById('addcategory');
    const category = document.getElementById('category');
    const closecat = document.getElementById('closecat');
    addcategory.addEventListener('click', e => {
        category.classList.remove('hidden');
    })
    closecat.addEventListener('click', e => {
        category.classList.add('hidden');
    })
}




const addtocat = document.getElementById('addtocat');
addtocat.addEventListener('click', e => {
    let id = parseInt(document.getElementById('id').innerText);
    let catname = document.getElementById('catname').value;
    let dropzone = document.getElementById('dropzone-file').value;
    let added = document.getElementById('added');
    var formData = new FormData();
    formData.append('name', catname);
    formData.append('id', id);
    formData.append('img', dropzone);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/Wiki-/Users/addTocat', true);
    xhr.onload = function () {
        if (xhr.status == 200 && xhr.readyState == 4) {
            added.innerHTML = 'Category added Succesfully';
        }
    };
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(new URLSearchParams(formData));

});

function crudcat(){

    var deletecat= document.querySelectorAll('.deletecat');
    for (let i = 0; i < deletecat.length; i++) {
         deletecat[i].addEventListener("click" , e=>{
            
         })
        
    }
}
