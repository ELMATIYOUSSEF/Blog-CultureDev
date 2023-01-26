// Sign Up
signupForm=document.getElementById('SignUp');
loginForm=document.getElementById('Login');
F_name=document.getElementById('inputfname');
email=document.getElementById('inputEmail4');
password=document.getElementById('inputPassword4');
L_name=document.getElementById('inputlname');


if(signupForm){
    signupForm.addEventListener('submit',e=>{
        e.preventDefault();
        const FirstNameValue = F_name.value.trim();
        const lastNameValue = L_name.value.trim();
        const emailValue = email.value.trim();
        const passwordValue = password.value.trim();
        let isValid = true;
       
        if (FirstNameValue === "") {
            setError(F_name,"lastName is required");
            isValid = false;
            } else if (!isValidName(FirstNameValue)) {
            setError(F_name,"Provide a valid LastName");
            } else {
            setSuccess(F_name);
            }

        if (lastNameValue === "") {
        setError(L_name, "lastName is required");
        isValid = false;
        } else if (!isValidName(lastNameValue)) {
        setError(L_name, "Provide a valid LastName");
        } else {
        setSuccess(L_name);
        }

        if (emailValue === "") {
        setError(email, "Email is required");
        isValid = false;
        } else if (!isValidEmail(emailValue)) {
        setError(email, "Provide a valid email address");
        } else {
        setSuccess(email);
        }

        if (passwordValue == "") {
        setError(password, "Password is required");
        isValid = false;
        } else if (passwordValue.length < 8) {
        setError(password, "Password must be at least 8 character.");
        } else {
        setSuccess(password);
        }

        if (isValid) {
            e.target.submit();
        }

    });
}


if (loginForm) {
    loginForm.addEventListener("submit", e => {
        e.preventDefault();
        emailloginValue = email.value.trim();
        passwordloginValue = password.value.trim();
        let isValid = true;
        if (emailloginValue === "") {
            setError(email, "Email is required");
            isValid = false;
        } else if (!isValidEmail(emailloginValue)) {
            setError(email, "Provide a valid email address");
            isValid = false;
        } else {
         setSuccess(email);
        }

        if (passwordloginValue == "") {
            setError(password, "Password is required");
            isValid = false;
        } else if (passwordloginValue.length < 8) {
            setError(password, "Password must be at least 8 character.");
            isValid = false;
        } else {
            setSuccess(password);
        }
        if (isValid) {
         e.target.submit();
        }
    });
}



const setError = (element, message) => { //receive html element and error msg
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.errormsg');
    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.errormsg');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};
const isValidEmail = email => { //using regular expression 
    const re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return re.test(String(email).toLowerCase()); //return true or false
}
const isValidName = name => {
    const re=/^[a-zA-Z0-9]*$/;
    return re.test(name);
}