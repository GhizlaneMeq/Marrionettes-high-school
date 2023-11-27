// validation info

const form = document.querySelector("form");
const firstname = document.querySelector("#firstname");
const lastname = document.querySelector("#lastname");
const email = document.querySelector("#email");
const pass = document.querySelector("#password");
const co_pass = document.querySelector("#copassword");




form.addEventListener('submit' , (event)=>{
    console.log("clicked");
    validateForm();
    if(isFormValid() == true){
        form.submit();
    }
    else{
        event.preventDefault();
    }
})

function isFormValid(){
    const input = document.querySelectorAll(".form-outline");
    let result = true;
    input.forEach((border) =>{
        if(border.classList.contains('error')){
            result = false;
        }
    });
    return result;
}

function validateForm(){
    if(firstname.value.trim() == ''){
        setError(firstname);
        firstname.nextElementSibling.textContent = "firstname can't be empty!";
    }
    else if(firstname.value.length < 3 || firstname.value.length > 20){
        firstname.nextElementSibling.textContent = "firstname can't be less than 3 and more than 20"
    }
    else{
        setSuccess(firstname);
        saveData();
    }

    if(lastname.value.trim() == ''){
        setError(lastname);
        lastname.nextElementSibling.textContent = "lastname can't be empty!";
    }
    else if(lastname.value.length < 3 || lastname.value.length > 20){
        lastname.nextElementSibling.textContent = "lastname can't be less than 3 and more than 20"
    }
    else{
        setSuccess(lastname);
    }

    if(email.value.trim() == ''){
        setError(email);
        email.nextElementSibling.textContent = "email can't be empty!";
    }
    else if(isEmailValid(email)){
        email.nextElementSibling.textContent = "Enter a valid email!"
    }
    else{
        setSuccess(email);
        saveData();
    }

    if(pass.value.trim() == ''){
        setError(pass);
        pass.nextElementSibling.textContent = "password can't be empty!";
    }
    else if(pass.value.length < 6 || pass.value.length > 100){
        pass.nextElementSibling.textContent = "password can't be less than 6 and more than 100"
    }
    else{
        setSuccess(pass);
    }

    if(co_pass.value.trim() == ''){
        setError(co_pass);
        co_pass.nextElementSibling.textContent = "Confirm password can't be empty!";
    }
    else if(co_pass.value != pass.value){
        co_pass.nextElementSibling.textContent = "not equal"
    }
    else{
        setSuccess(co_pass);
    }
}

function setError(element){
    const parent = element.parentElement;
    if(parent.classList.contains('success')){
        parent.classList.remove('success');
    }
    parent.classList.add('error');
}

function setSuccess(element){
    const parent = element.parentElement;
    if(parent.classList.contains('error')){
        parent.classList.remove('error');
    }
    parent.classList.add('success');
}

function isEmailValid(email){
    const reg = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    return reg.test(email);
}

function saveData(){
    localStorage.setItem("firstname",firstname.value);
    localStorage.setItem("email",email.value);
}