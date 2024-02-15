const btn = document.getElementById('checkOcult');
const inputPassword = document.getElementById('password');

btn.addEventListener('click', function(){
    btn.checked === true ? inputPassword.type='text' : inputPassword.type='password';
})