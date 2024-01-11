const signbtn = document.getElementById('signbtn')
const registerbtn = document.getElementById('registerbtn')
const signupdiv = document.getElementById('signupdiv')
const signindiv = document.getElementById('signindiv')
const closesignin = document.getElementById('closesignin')
const closesignup = document.getElementById('closesignup')

signbtn.addEventListener('click', e => {
    signindiv.classList.remove('hidden');
})
closesignin.addEventListener('click', e => {
    signindiv.classList.add('hidden');
})
registerbtn.addEventListener('click', e => {
    signupdiv.classList.remove('hidden');
})
closesignup.addEventListener('click', e => {
    signupdiv.classList.add('hidden');
})



let inpname = document.getElementById('inpname');
let rname = document.getElementById('name');

let inpemail = document.getElementById('inpemail');
let email = document.getElementById('email');

let inppass = document.getElementById('inppass');
let pass = document.getElementById('pass');

let cinppass = document.getElementById('cinppass');
let cpass = document.getElementById('cpass');

let validname = /^[a-zA-Z]{3,}\s[a-zA-Z]{3,}$/;
let validemail = /^^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

inpname.addEventListener('input', e => {
    const inputValue = inpname.value;
    if (validname.test(inputValue)) {
        rname.innerText = 'Name is Valid';
        rname.style.color = 'green';
        rname.style.display = 'block';
    } else if (inpname.value === '') {
        rname.innerText = '';
    } else {
        rname.innerText = 'Name is Invalid';
        rname.style.color = 'red';
        rname.style.display = 'block';
        e.preventDefault(e);
    }
});

var emailValue = inpemail.value;
cinppass.addEventListener("input", e => {
    if (inppass.value != cinppass.value && inppass.value != '') {
        cpass.innerText = 'Password dont\'t match!';
        cpass.style.color = 'red';
        cpass.style.display = 'block';
        e.preventDefault(e);
    } else if (inppass.value == cinppass.value && inppass.value != '') {
        cpass.innerText = 'Password match';
        cpass.style.color = 'green';
    }
})
let success = document.getElementById('success');
let failed = document.getElementById('failed');

let open = new URL(location.href).searchParams.get('t');
let close = new URL(location.href).searchParams.get('f');
if (open) {
    setTimeout(() => {
        success.classList.remove('hidden');
    }, 3600);
} else if (close) {

    setTimeout(() => {
        failed.classList.remove('hidden');
    }, 3600);
}

inpemail.addEventListener('input' , checkemail);





function checkemail(){
    let checkemail = document.getElementById('checkmail');
    let signupform = document.getElementById('signupform');
    let email = inpemail.value ;
    // if (emailValue === '') {
    //             email.innerText = '';
    //             return;
    //         }
        
    //         if (validemail.test(emailValue)) {
    //             email.innerText = 'Email is Valid';
    //             email.style.color = 'green';
    //             email.style.display = 'block';
    //         } else {
    //             email.innerText = 'Email is Invalid';
    //             email.style.color = 'red';
    //             email.style.display = 'block';
    //             e.preventDefault();
    //             return;
    //         }
    var formData = new FormData();
    formData.append('email' ,email );
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/Wiki-/Users/findEmail', true);
    xhr.onload = function() {
        if (xhr.status == 200 && xhr.readyState == 4) {
            checkemail.innerText = xhr.responseText ;
        }
    };
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(new URLSearchParams(formData));
}