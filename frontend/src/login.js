const eyes = document.querySelectorAll(".eye");
const loginbox = document.querySelector(".login-box");
const signupbox = document.querySelector(".login-box-back");
const csign = document.querySelector(".csignup");
const clogin = document.querySelector(".clogin");


csign.addEventListener('click', () => {
    loginbox.style.transform = "rotateY(180deg)";
    signupbox.style.transform = "rotateY(0deg)";

})
clogin.addEventListener('click', () => {
    loginbox.style.transform = "rotateY(0deg)";
    signupbox.style.transform = "rotateY(-180deg)";

})

eyes.forEach(eye => {
    eye.onclick = () => {
        const input = eye.parentElement.nextElementSibling;
        if (input.type === "password") {
            eye.classList.replace("fa-eye-slash", "fa-eye");
            input.type = "text";
        } else {
            eye.classList.replace("fa-eye", "fa-eye-slash");
            input.type = "password";
        }
    }
})

