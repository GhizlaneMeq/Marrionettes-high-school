// validation info

const form = document.querySelector("#private-form");
const username = document.querySelector("#inputUsername");
const bio = document.querySelector("#inputBio");




form.addEventListener('submit' , (event)=>{
    validateForm();
    if(isFormValid() == true){
        alert("done");
    }
    else{
        event.preventDefault();
    }
})

function isFormValid(){
    const input = document.querySelectorAll(".form-group");
    let result = true;
    input.forEach((border) =>{
        if(border.classList.contains('error')){
            result = false;
        }
    });
    return result;
}

function validateForm(){
    if(username.value.trim() == ''){
        setError(username);
        username.nextElementSibling.textContent = "name can't be empty!";
    }
    else if(username.value.length < 3 || username.value.length > 20){
        username.nextElementSibling.textContent = "name can't be less than 3 and more than 20"
    }
    else{
        setSuccess(username);
    }

    if(bio.value.trim() == ''){
        setError(bio);
        bio.nextElementSibling.textContent = "bio can't be empty!";
    }
    else if(bio.value.length < 6 || bio.value.length > 100){
        bio.nextElementSibling.textContent = "bio can't be less than 6 and more than 100"
    }
    else{
        setSuccess(bio);
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