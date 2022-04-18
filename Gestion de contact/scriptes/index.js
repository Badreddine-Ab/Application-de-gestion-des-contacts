

const form = document.getElementById('form');
const email = document.getElementById('email');
const password = document.getElementById('password');
let badr = true;

form.addEventListener('submit', e => {
    if(!validateInputes()){
        e.preventDefault();  
    }  
})



function setError(element,message){
     badr = false;
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');
    

    errorDisplay.innerText = message;
    element.classList.add('errBorder');
    element.classList.remove('sucBorder');

}

function setSuccess(element){
    badr=true
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');
    

    errorDisplay.innerText = '';
    element.classList.add('sucBorder');
    element.classList.remove('errBorder');

}

// function isValidEmail(email){
//     const res = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//     return res.test(String(email).toLowerCase());
// }

function validateInputes() {
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();

    if(emailValue === ''){ 
        setError(email, 'username is required');
    }else if(!isValidEmail(emailValue)){
        setError(email,'Provide a valid email adress');
    
    }
    else{
        setSuccess(email);
    }

    if(passwordValue === ''){
        setError(password,'A password is required');
    } else if (passwordValue.length < 8){
        setError(password,'The password must have at least 8 characters');
    } else {
        setSuccess(password);
    }

    return badr;
}