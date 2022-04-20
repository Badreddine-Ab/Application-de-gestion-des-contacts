const form = document.getElementById('form');
const fullName = document.getElementById('fullName');
const job = document.getElementById('job');
const phoneNumber = document.getElementById('phoneNumber');
const fix = document.getElementById('fix');
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

// function isValidFullName(fullName){
//     const res = /^[a-z\d]* [a-z\d]*/;
//     return res.test(String(fullName).toLowerCase());
// }

function isValidPhoneNumber(phoneNumber){
    const res = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/gim;
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
        fullName.focus() ;
    // }else if(!isValidFullName(fullName)){
    //     console.log('b')
    //     setError(fullName,'Provide your full name (ex: first name + last name)');
    }
    // else if(jobValue === ''){
    //     setSuccess(fullName);{

    //     }
    //     setError(job,'A Job is required');
    else if(phoneNumberValue === ''){
        
        setError(phoneNumber,'A Phone number is required');
    } else if(!isValidPhoneNumber(phoneNumberValue)) {
        setError(phoneNumber,'Provid a moroccan phone number');
    }else if(fixValue === ''){
        setSuccess(phoneNumberValue)
        setError(fix,'A Fix number is required');
    } else if(!isValidPhoneNumber(fixValue)) {
        setError(fix,'Provid a moroccan fix phone number');
    }

    

    return badr;
}
