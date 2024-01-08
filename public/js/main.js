const signbtn = document.getElementById('signbtn');
const registerbtn = document.getElementById('registerbtn');
const signupdiv = document.getElementById('signupdiv');
const signindiv = document.getElementById('signindiv');
const closesignin = document.getElementById('closesignin');
const closesignup = document.getElementById('closesignup');

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
    }else if(inpname.value === ''){
        rname.innerText = '';
    } else {
        rname.innerText = 'Name is Invalid';
        rname.style.color = 'red';
        rname.style.display = 'block';
        e.preventDefault(e);
    }
});

inpemail.addEventListener('input', e => {
    const emailValue = inpemail.value;
    if (validemail.test(emailValue)) {
        email.innerText = 'email is Valid';
        email.style.color = 'green';
        email.style.display = 'block';
    }else if(inpemail.value === ''){
        email.innerText = '';}

    else if(emailValue==''||!validemail.test(emailValue)){
            email.innerText = 'email is Invalid';
            email.style.color = 'red';
            email.style.display = 'block';
            e.preventDefault(e);
        }
});

cinppass.addEventListener("input" , e=>{
    if(inppass.value!=cinppass.value&&inppass.value!=''){
        cpass.innerText = 'Password dont\'t match!';
        cpass.style.color = 'red';
        cpass.style.display = 'block';
        e.preventDefault(e);
    }else if(inppass.value==cinppass.value&&inppass.value!=''){
        cpass.innerText = 'Password match';
        cpass.style.color = 'green';
    }
})
let success = document.getElementById('success');
let failed = document.getElementById('failed');

let open = new URL(location.href).searchParams.get('t') ; 
let close = new URL(location.href).searchParams.get('f') ; 
console.log(open);
if (open) {
    setTimeout(() => {
        success.classList.remove('hidden');
    }, 3600);
} else if (close) {

    setTimeout(() => {
        failed.classList.remove('hidden');
    }, 3600);
}