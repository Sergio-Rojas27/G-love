const password = document.getElementById("password");
      icon = document.querySelector(".bx");

icon.addEventListener("click", e => {   
    if (password.type === "password") {
        password.type = "text";
        icon.classList.replace('bx-show-alt', 'bx-hide');
    } 
    else {
        password.type = "password";
        icon.classList.replace("bx-hide", "bx-show-alt");
    }
})