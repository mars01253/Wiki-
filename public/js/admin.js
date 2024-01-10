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
            <span><img class="img" src=""></span>
            <h4 class="text-white text-2xl font-bold capitalize text-center namecate">${data[i][1]}</h4>
            <h4 class="  text-white text-2xl font-bold capitalize text-center">Added: ${data[i][2]}</h4>
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
        prevent();
        displaytags();
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
const deletedcat = document.getElementById('deletedcat');
addtocat.addEventListener('click', e => {
    let id = document.getElementById('id').innerText;
    let catname = document.getElementById('catname').value;
    let added = document.getElementById('added');
    console.log(id);
    console.log(catname);
    var formData = new FormData();
    formData.append('name', catname);
    formData.append('id', id);
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

function crudcat() {
    let cat_id = document.querySelectorAll(".catid");
    let updatecat = document.querySelectorAll(".updatecat");
    var deletecat = document.querySelectorAll('.deletecat');
    let namecate = document.querySelectorAll('.namecate');
    let img = document.querySelectorAll('.img');
    for (let i = 0; i < deletecat.length; i++) {
        deletecat[i].addEventListener("click", e => {
            let id = cat_id[i].innerText;
            var formData = new FormData();
            formData.append('cat_id', id);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'http://localhost/Wiki-/Users/removecat', true);
            xhr.onload = function () {
                if (xhr.status == 200 && xhr.readyState == 4) {
                    deletedcat.classList.remove('hidden');
                    setTimeout(function () {
                        deletedcat.classList.add('hidden');
                    }, 1500);
                }
            };
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send(new URLSearchParams(formData));
        })

    }
    for (let i = 0; i < updatecat.length; i++) {
        updatecat[i].addEventListener('click', e => {
            let editcategory = document.getElementById('editcategory');
            let sendedit = document.getElementById('sendedit');
            editcategory.classList.remove('hidden');
            const id = cat_id[i].innerText;
            let name = namecate[i].innerText;
            let editcat = document.getElementById('editcat');
            editcat.value = name;
            document.getElementById('closecatedit').addEventListener('click', e => {
                editcategory.classList.add('hidden');
            })
            sendedit.addEventListener('click', e => {
                let sendname = editcat.value;
                console.log(sendname);
                var formData = new FormData();
                formData.append('id', id);
                formData.append('name', sendname);
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'http://localhost/Wiki-/Users/updatecat', true);
                xhr.onload = function () {
                    if (xhr.status == 200 && xhr.readyState == 4) {
                        editcategory.classList.add('hidden');
                        setTimeout(function () {
                            deletedcat.classList.add('hidden');
                        }, 1500);
                    }
                };
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send(new URLSearchParams(formData));

            })
        })
    }

}


let tgname = document.getElementById('tgname');

tgname.addEventListener("input", prevent);

function prevent(e) {
    let data = tgname.value;
    console.log(data);
    let exist = false;
    var formData = new FormData();
    formData.append('name', data);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/Wiki-/Users/checktag', true);
    xhr.onload = function () {
        if (xhr.status == 200 && xhr.readyState == 4) {
            exist = true;
            document.getElementById('taganswer').innerText = xhr.response;
            if (exist && e) {
                e.preventDefault();
            }
        }
    };
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(new URLSearchParams(formData));
}
var data_id = [];
var data_name = [];
function displaytags() {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/Wiki-/Users/displaytags', true);
    xhr.onload = function () {
        if (xhr.status == 200 && xhr.readyState == 4) {
            const data = JSON.parse(xhr.response);
            data.forEach(element => {
                document.getElementById('tagshere').innerHTML += `
                <tr>
                        <td class="p-4 border-b border-blue-gray-50">
                            <div class="flex items-center gap-3">
                                <p class="block antialiased font-sans text-sm leading-normal text-white font-bold">${element.tag_name}</p>
                            </div>
                        </td>
                        <td class="p-4 border-b border-blue-gray-50">
                        <form method="post" action="http://localhost/Wiki-/Users/deletetag">
                            <button name="id" value="${element.tag_id}"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 448 512">
                                    <path fill="#e3e3e3" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                </svg></button></form>
                        </td>
                        <td class="p-4 border-b border-blue-gray-50">
                            <button class="updatag"><svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512">
                                    <path fill="#bdbdbd" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                </svg></button>
                        </td>
                    </tr>
                `;
                data_id.push(element.tag_id);
                data_name.push(element.tag_name);
            });
            updatetag();
        }
    };
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send();
    
    function updatetag(){
        const updatag = document.querySelectorAll('.updatag');
        const edittag = document.getElementById('edittag');
        const closeedittag = document.getElementById('closeedittag');
         for (let index = 0; index < updatag.length; index++) {
        updatag[index].addEventListener("click" , e=>{
            edittag.classList.remove('hidden');
            document.getElementById('edittaginp').value=data_name[index];
            document.getElementById('edittagid').value=data_id[index];
        })
        closeedittag.addEventListener("click" , e=>{
            e.preventDefault();
            edittag.classList.add('hidden');
        })
    }
    }
   
}




