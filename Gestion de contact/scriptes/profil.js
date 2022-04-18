const form = document.getElementById('form');
const fullName = document.getElementById('fullName');
const job = document.getElementById('job');
const phoneNumber = document.getElementById('phoneNumber');
const fix = document.getElementById('fix');
let badr = true;

form.addEventListener('submit', e => {
   
        e.preventDefault();  
        validateInputes()
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

function isValidFullName(fullName){
    const res = /\d+\s[a-z]+/gi;
    return res.test(String(fullName).toLowerCase());
}

function isValidPhoneNumber(phoneNumber){
    const res = /(\+212|0)([ \-_/]*)(\d[ \-_/]*){9}/g;
    return res.test(phoneNumber);
}



// function isValidEmail(email){
//     const res = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//     return res.test(String(email).toLowerCase());
// }



function validateInputes() {
    const fullNameValue = fullName.value.trim();
    const jobValue = job.value.trim();
    const phoneNumberValue = phoneNumber.value.trim();
    const fixValue = fix.value.trim();
    if(fullNameValue === ''){ 
        console.log('a')
        setError(fullName, 'Full name is required');
    }else if(!isValidFullName(fullName)){
        console.log('b')
        setError(fullName,'Provide your full name (ex: first name + last name)');
    }
    else{
        setSuccess(fullName);
    }

    if(jobValue === ''){
        setError(job,'A Job is required');
    } else {
        setSuccess(job);
    }

    if(phoneNumberValue === ''){
        setError(phoneNumber,'A Phone number is required');
    } else if(!isValidPhoneNumber(phoneNumber)) {
        setError(phoneNumber,'Provid a moroccan phone number');
    }

    if(fixValue === ''){
        setError(fix,'A Fix number is required');
    } else if(!isValidPhoneNumber(fix)) {
        setError(fix,'Provid a moroccan fix phone number');
    }

    

    return badr;
}
