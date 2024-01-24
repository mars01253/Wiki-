var selectcat = document.getElementById('selectcat');
const addwiki = document.getElementById('addwiki');

const opentagdiv = document.getElementById('opentagdiv');
const tagspop = document.getElementById('tagspop');
const closetagdiv = document.getElementById('closetagdiv');
let confirmbtn = document.getElementById('confirmbtn');

const xhr = new XMLHttpRequest();
xhr.open('POST', 'http://localhost/Wiki-/Categories/displayoptions', true);
xhr.onload = function () {
    if (xhr.status == 200 && xhr.readyState == 4) {
        let data = JSON.parse(xhr.response);
        console.log(data);
        for (let index = 0; index < data.length; index++) {
            selectcat.innerHTML += `
           <option value="${data[index][0]}">${data[index][1]}</option>
           `;
        }
    }
    tagsoperations();
};
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.send();

function tagsoperations() {
    opentagdiv.addEventListener('click', e => {
        tagspop.classList.remove('hidden');
        confirmbtn.classList.remove('hidden');
    })
    closetagdiv.addEventListener('click', e => {
        tagspop.classList.add('hidden');
        confirmbtn.classList.add('hidden');
    })
    var tagid = [];
    var tagname = [];
    let edittagshere = document.getElementById('edittagshere');
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/Wiki-/Tags/displayTags', true);
    xhr.onload = function () {
        if (xhr.status == 200 && xhr.readyState == 4) {
            let output = document.getElementById("tagshere");
            let data = JSON.parse(xhr.response);
            for (let index = 0; index < data.length; index++) {
                output.innerHTML += `
           <button class="p-4 bg-blue-200 ml-2 mb-2 rounded-xl tagsbtn" value="${data[index][0]}">${data[index][1]}</button>
           `;
                

                tagid.push(data[index][0]);
                tagname.push(data[index][1]);

            }
        }
        tagbtn();

    };
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send();
    function tagbtn() {
        const tagsbtn = document.querySelectorAll(".tagsbtn");
        for (let index = 0; index < tagsbtn.length; index++) {
            tagsbtn[index].addEventListener('click', e => {
                let tagshere2 = document.getElementById('tagshere2');
                let name = tagname[index];
                let id = tagid[index];

                let check = checktag(id);
                if (!check) {
                    tagshere2.innerHTML += `
                        <button class="p-4 bg-blue-200 ml-2 mb-2 rounded-xl tagbtn" value="${id}">${name}</button>
                        <input class="hidden tagids" value="${id}">
                       `
                }
              
            })
        }

    }
    function checktag(id) {
        const tagbtns = document.querySelectorAll('.tagbtn');
        for (let index = 0; index < tagbtns.length; index++) {
            let tagId = tagbtns[index].value;
            if (id == tagId) {
                return true;
            }
        }
        return false;
    }

}





