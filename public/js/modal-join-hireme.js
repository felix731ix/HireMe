var modalJoin = document.getElementById("modalJoinHireme");
var modalLogin = document.getElementById("modalLoginHireme");

var buttonJoin = document.getElementById("join-now");
var buttonLogin = document.getElementById("login-now");
var buttonClosedJoin = document.getElementById("icon-active-join");
var buttonClosedLogin = document.getElementById("icon-active-login");

var switchLogin = document.getElementById("switch-login");
var switchJoin = document.getElementById("switch-join");


switchJoin.onclick = function(){
    modalLogin.style.display = "none";
    modalJoin.style.display = "block";
}

switchLogin.onclick = function(){
    modalJoin.style.display = "none";
    modalLogin.style.display = "block";
}

buttonLogin.onclick = function(){
    modalLogin.style.display = "block";
}

buttonJoin.onclick = function(){
    modalJoin.style.display = "block";
};



// var lblerrorEmail = document.getElementById('join-email-errors_handler');
// var lblErrorPass = document.getElementById('join-pass-errors_handler');
//
// var registrationForm = document.querySelector(".register-form");
// if(registrationForm){
//     registrationForm.addEventListener("submit", function (event){
//         let counter = 2;
//         var email = document.querySelector("#email-join-field");
//         var pass = document.querySelector("#pass-join-field");
//         // lblerrorEmail.innerHTML = "";
//         // lblErrorPass.innerHTML = "";
//
//
//         if(email.value.length < 1){
//             // lblerrorEmail.innerHTML = "Email cannot be empty";
//             counter--;
//         }
//
//         if(pass.value.length < 1){
//             // lblErrorPass.innerHTML = "Password cannot be empty";
//             alert("Password cannot be empty");
//             counter --;
//         }
//
//         if(counter < 2){
//             //Fulfill all the conditions
//             event.preventDefault();
//         }
//     });
// }

buttonClosedJoin.onclick = function(){
    // lblerrorEmail.innerHTML = "";
    // lblErrorPass.innerHTML = "";
    modalJoin.style.display= "none";
}

buttonClosedLogin.onclick = function(){
    modalLogin.style.display= "none";
}


