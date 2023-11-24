function validateEmail(email){
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

function validateUsername(username){
  const usernameRegex = /^[a-zA-Z0-9_-]{4,}$/;
  return usernameRegex.test(username);
}

function validatePassword(password){
  const passwordRegex = /^[^\s$\\&<>]{4,}$/;
  return passwordRegex.test(password);
}

function validateName(name){
  const pattern = /^[A-ZÁÉÍÓÚÀÈÌÒÙÂÊÎÔÛÃÕÇa-záéíóúàèìòùâêîôûãõç']+$/;
  return pattern.test(name);
}

function validateStudentRegistrationNumber(reg){
  const pattern = /^[0-9]+$/;
  return pattern.test(reg);
}

function validateGrade(grade) {
    if (isNaN(grade)) {
        return false;
    }
    grade = parseFloat(grade);
    if (grade >= 0 && grade <= 10) {
        return true;
    }
    return false;
}

function validateStudent(){
  let name = document.forms["student-form"]["name"].value;
  let reg = document.forms["student-form"]["reg"].value;
  let grade1 = document.forms["student-form"]["grade1"].value;
  let grade2 = document.forms["student-form"]["grade2"].value;

  let isValidName = validateName(name);
  let isValidReg = validateStudentRegistrationNumber(reg);
  let isValidGrade1 = validateGrade(grade1);
  let isValidGrade2 = validateGrade(grade2);

  if (isValidName && isValidReg && $isValidGrade1 && isValidGrade2){
    return true;
  }

  if (!isValidName){
    document.getElementById("name-warning").innerHTML = "Nome invalido.";
    document.getElementById("name").value = "";
  }
  if (!isValidReg){
    document.getElementById("reg-warning").innerHTML = "Matricula inválida.";
    document.getElementById("reg").value = "";
  }
  if (!isValidGrade1 || !isValidGrade2){
    document.getElementById("grade-warning").innerHTML = "Notas inválidas.";
    document.getElementById("grade1").value = "";
    document.getElementById("grade2").value = "";
  }
  return false;
}

function validateLogin(){
  let username = document.forms["login-form"]["username"].value;
  let password = document.forms["login-form"]["password"].value;

  let isValidEmail = validateEmail(username);
  let isValidUsername = validateUsername(username);
  let isValidPassword = validatePassword(password);

  /*
  console.log("Valid Email: ",  isValidEmail);
  console.log("Valid Username: ", isValidUsername);
  console.log("Valid Password: ", isValidPassword);
  */
  let isValidForm = (isValidEmail || isValidUsername) && isValidPassword;

  if (!isValidLogin){
    document.getElementById("login-warning").innerHTML = "Usuário ou senha invalidos.";
    document.getElementById("username").value = "";
    document.getElementById("password").value = "";
  }
  return isValidForm;
}


function validateSignupForm(){
  let username = document.forms["signup-form"]["username"].value;
  let email = document.forms["signup-form"]["email"].value;
  let password = document.forms["signup-form"]["password"].value;

  let isValidUsername = validateUsername(username);
  let isValidEmail = validateEmail(email) || email=="";
  let isValidPassword = validatePassword(password);

  /*
  console.log("Valid Email: ",  isValidEmail);
  console.log("Valid Username: ", isValidUsername);
  console.log("Valid Password: ", isValidPassword);
  */

  if (!isValidUsername){
    document.getElementById("user-warning").innerHTML = "Nome de usuário invalido.";
    document.getElementById("username").value = "";
  }
  if (!isValidEmail){
    document.getElementById("email-warning").innerHTML = "Endereço de email invalido.";
    document.getElementById("email").value = "";
  }
  if (!isValidPassword){
    document.getElementById("password-warning").innerHTML = "Senha invalida.";
    document.getElementById("password").value = "";
  }

  let isValidForm = isValidEmail && isValidUsername && isValidPassword;

  return isValidForm;
}

