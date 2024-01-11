var selectcat = document.getElementById('selectcat');
const opentagdiv = document.getElementById('opentagdiv');
const tagspop = document.getElementById('tagspop');
const closetagdiv = document.getElementById('closetagdiv');
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
    })
    closetagdiv.addEventListener('click', e => {
        tagspop.classList.add('hidden');
    })
    var tagid = [];
    var tagname = [];
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
    };
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send();
    
}