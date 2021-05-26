const showPass = document.querySelector(".icon-2");
const inputPass = document.querySelector("input[type=password]");

showPass.addEventListener('click', () => {
    if ( inputPass.type == 'password' ) {
        inputPass.type = 'text';
        showPass.classList.add('fa-eye-slash');
    }else {
        inputPass.type = 'password';
        showPass.classList.remove('fa-eye-slash');
    }
})