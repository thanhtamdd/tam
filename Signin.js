const signIn = document.querySelector('.signin');
const form = document.querySelector('.form-signin'); 
const changeSignin = document.querySelector('.change-signin');
const singup = document.querySelector('.signup');
singup.onclick = function(){
    logup();
}
signIn.onclick = function(){
    form.classList.toggle('none');
    changeSignin.classList.toggle('none');
}

const changeSignup = changeSignin.querySelector('.signup');
changeSignup.onclick = function(){
    form.classList.toggle('none');
    changeSignin.classList.toggle('none');
}
const ChangeSignIN = changeSignin.querySelector('.signin'); 
function logup(){
    event.preventDefault();
    var username = document.querySelector('.username-login').value;
    var email = document.querySelector('.email-login').value;
    var password = document.querySelector('.password-login').value;
    var repassword = document.querySelector('.repassword-login').value;
    var user = {
        username : username,
        email : email,
        password : password,
        repassword : repassword
    };
   if(username == "" || email == "" || password == "" || repassword == "" ){
    alert("Vui lòng nhập thông tin");
   }
   
}
function login(){
    event.preventDefault();
    var username = document.querySelector('.username-logup').value;
    var password = document.querySelector('.password-logup').value;
    var user = localStorage.getItem('USER-INFO');
    var data = JSON.parse(user);
     if(username =="" || password == ""){
        alert("Vui long nhập thông tin");
    }
    else if(username == data.username && password == data.password){
        alert("Đăng nhập thành công")
        window.location.href = "Shop.html"
    }
    else if(username != data.username || password != data.password){
        alert("Đăng nhập thất bại");
    }
    
}

