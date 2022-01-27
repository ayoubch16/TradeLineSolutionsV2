<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

    * {
        box-sizing: border-box;
    }

    body {
        background: #f6f5f7;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-family: 'Montserrat', sans-serif;
        height: 100vh;
        margin: -20px 0 50px;
    }

    h1 {
        font-weight: bold;
        margin: 0;
    }

    h2 {
        text-align: center;
    }

    p {
        font-size: 14px;
        font-weight: 100;
        line-height: 20px;
        letter-spacing: 0.5px;
        margin: 20px 0 30px;
    }

    span {
        font-size: 12px;
    }

    a {
        color: #333;
        font-size: 14px;
        text-decoration: none;
        margin: 15px 0;
    }

    button {
        border-radius: 20px;
        border: 1px solid #FF4B2B;
        background-color: #FF4B2B;
        color: #FFFFFF;
        font-size: 12px;
        font-weight: bold;
        padding: 12px 45px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: transform 80ms ease-in;
    }

    button:active {
        transform: scale(0.95);
    }

    button:focus {
        outline: none;
    }

    button.ghost {
        background-color: transparent;
        border-color: #FFFFFF;
    }

    form {
        background-color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 50px;
        height: 100%;
        text-align: center;
    }

    input {
        background-color: #eee;
        border: none;
        padding: 12px 15px;
        margin: 8px 0;
        width: 100%;
    }

    .container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
            0 10px 10px rgba(0, 0, 0, 0.22);
        position: relative;
        overflow: hidden;
        width: 768px;
        max-width: 100%;
        min-height: 480px;
    }

    .form-container {
        position: absolute;
        top: 0;
        height: 100%;
        transition: all 0.6s ease-in-out;
    }

    .sign-in-container {
        left: 0;
        width: 50%;
        z-index: 2;
    }

    .container.right-panel-active .sign-in-container {
        transform: translateX(100%);
    }

    .sign-up-container {
        left: 0;
        width: 50%;
        opacity: 0;
        z-index: 1;
    }

    .container.right-panel-active .sign-up-container {
        transform: translateX(100%);
        opacity: 1;
        z-index: 5;
        animation: show 0.6s;
    }

    @keyframes show {

        0%,
        49.99% {
            opacity: 0;
            z-index: 1;
        }

        50%,
        100% {
            opacity: 1;
            z-index: 5;
        }
    }

    .overlay-container {
        position: absolute;
        top: 0;
        left: 50%;
        width: 50%;
        height: 100%;
        overflow: hidden;
        transition: transform 0.6s ease-in-out;
        z-index: 100;
    }

    .container.right-panel-active .overlay-container {
        transform: translateX(-100%);
    }

    .overlay {
        background: #FF416C;
        background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
        background: linear-gradient(to right, #FF4B2B, #FF416C);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 0 0;
        color: #FFFFFF;
        position: relative;
        left: -100%;
        height: 100%;
        width: 200%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }

    .container.right-panel-active .overlay {
        transform: translateX(50%);
    }

    .overlay-panel {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 40px;
        text-align: center;
        top: 0;
        height: 100%;
        width: 50%;
        transform: translateX(0);
        transition: transform 0.6s ease-in-out;
    }

    .overlay-left {
        transform: translateX(-20%);
    }

    .container.right-panel-active .overlay-left {
        transform: translateX(0);
    }

    .overlay-right {
        right: 0;
        transform: translateX(0);
    }

    .container.right-panel-active .overlay-right {
        transform: translateX(20%);
    }

    .social-container {
        margin: 20px 0;
    }

    .social-container a {
        border: 1px solid #DDDDDD;
        border-radius: 50%;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin: 0 5px;
        height: 40px;
        width: 40px;
    }

    footer {
        background-color: #222;
        color: #fff;
        font-size: 14px;
        bottom: 0;
        position: fixed;
        left: 0;
        right: 0;
        text-align: center;
        z-index: 999;
    }

    footer p {
        margin: 10px 0;
    }

    footer i {
        color: red;
    }

    footer a {
        color: #3c97bf;
        text-decoration: none;
    }
    </style>
</head>

<body>
    <h2>Weekly Coding Challenge #1: Sign in/up Form</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" placeholder="Name" />
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="#">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <a href="#">Forgot your password?</a>
                <button>Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>
            Created with <i class="fa fa-heart"></i> by
            <a target="_blank" href="https://florin-pop.com">Florin Pop</a>
            - Read how I created this and how you can join the challenge
            <a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
        </p>
    </footer>

    <script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
    </script>
</body>

</html> -->
<? include 'db_conn.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Connexion </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/StorageStyle.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="icon" href="icon.ico" type="image/ico" sizes="16x16">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
       
    }

    .screen {
        background: linear-gradient(90deg, #2e0805, #eb5547);
        position: relative;
        height: 600px;
        width: 360px;
        box-shadow: 0px 0px 24px  #450d08;
        z-index: 1;
    }

    .screen__content {
        z-index: 1;
        position: relative;
        height: 100%;
    }

    .screen__background {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 0;
        -webkit-clip-path: inset(0 0 0 0);
        clip-path: inset(0 0 0 0);
    }

    .screen__background__shape {
        transform: rotate(45deg);
        position: absolute;
    }

    .screen__background__shape1 {
        height: 520px;
        width: 520px;
        background: #FFF;
        top: -50px;
        right: 120px;
        border-radius: 0 72px 0 0;
    }

    .screen__background__shape2 {
        height: 220px;
        width: 220px;
        background:  #fff;
        top: -172px;
        right: 0;
        border-radius: 32px;
    }

    /* .screen__background__shape3 {
        height: 540px;
        width: 190px;
        background: linear-gradient(270deg, #cf2617, #EE7166);
        top: -24px;
        right: 0;
        border-radius: 32px;
    } */

    .screen__background__shape4 {
        height: 400px;
        width: 200px;
        background: #fff;
        top: 420px;
        right: 50px;
        border-radius: 60px;
    }

    .login {
        width: 320px;
        padding: 30px;
        padding-top: 156px;
    }

    .login__field {
        padding: 20px 0px;
        position: relative;
    }

    .login__icon {
        position: absolute;
        top: 30px;
        color: #EE7166;
    }

    .login__input {
        border: none;
        border-bottom: 2px solid  #f7bfba;
        background: none;
        padding: 10px;
        padding-left: 24px;
        font-weight: 700;
        width: 75%;
        transition: .2s;
    }

    .login__input:active,
    .login__input:focus,
    .login__input:hover {
        outline: none;
        border-bottom-color: #EE7166;
    }

    .login__submit {
        background: #fff;
        text-align: center;
        font-size: 14px;
        margin-top: 30px;
        padding: 16px 20px;
        border-radius: 26px;
        border: 1px solid  #f7bfba;
        text-transform: uppercase;
        font-weight: 700;
        display: flex;
        align-items: center;
        width: 100%;
        color:  #EE7166;
        box-shadow: 0px 2px 2px  #73150d;
        cursor: pointer;
        transition: .2s;
    }

    .login__submit:active,
    .login__submit:focus,
    .login__submit:hover {
        border-color: #EE7166;
        outline: none;
        color: #fff;
        background: linear-gradient(90deg, #2e0805, #eb5547);
    }

    .button__icon {
        font-size: 24px;
        margin-left: auto;
        color: #EE7166;
    }

    /* .social-login {
        position: absolute;
        height: 140px;
        width: 160px;
        text-align: center;
        bottom: 0px;
        right: 0px;
        color: #fff;
    }

    .social-icons {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .social-login__icon {
        padding: 20px 10px;
        color: #fff;
        text-decoration: none;
        text-shadow: 0px 0px 8px #EE7166;
    }

    .social-login__icon:hover {
        transform: scale(1.5);
    } */
    
    .box div {
        width: 60px;
        height: 60px;
        background-color: transparent;
        border: 6px solid #EE7166;
    }

    .box div:nth-child(1) {
        position: absolute;
        left: 20%;
        top: 20%;
        animation: animate 10s linear infinite;
    }

    .box div:nth-child(2) {
        position: absolute;
        left: 40%;
        top: 20%;
        animation: animate 12s linear infinite;
    }

     .box div:nth-child(3) {
        position: absolute;
        left: 60%;
        top: 20%;
        animation: animate 13s linear infinite;
    }

    .box div:nth-child(4) {
        position: absolute;
        left: 80%;
        top: 20%;
        animation: animate 14s linear infinite;
    }

    .box div:nth-child(5) {
        position: absolute;
        left: 10%;
        top: 40%;
        animation: animate 15s linear infinite;
    }

    .box div:nth-child(6) {
        position: absolute;
        left: 30%;
        top: 40%;
        animation: animate 13s linear infinite;
    }

    .box div:nth-child(7) {
        position: absolute;
        left: 50%;
        top: 40%;
        animation: animate 11s linear infinite;
    }

    .box div:nth-child(8) {
        position: absolute;
        left: 70%;
        top: 40%;
        animation: animate 10s linear infinite;
    }
    .box div:nth-child(17) {
        position: absolute;
        left: 90%;
        top: 40%;
        animation: animate 10s linear infinite;
    }

    .box div:nth-child(9) {
        position: absolute;
        left: 20%;
        top: 60%;
        animation: animate 11s linear infinite;
    }

    .box div:nth-child(10) {
        position: absolute;
        left: 40%;
        top: 60%;
        animation: animate 15s linear infinite;
    } 
    .box div:nth-child(11) {
        position: absolute;
        left: 60%;
        top: 60%;
        animation: animate 15s linear infinite;
    } 
    .box div:nth-child(12) {
        position: absolute;
        left: 80%;
        top: 60%;
        animation: animate 15s linear infinite;
    } 
    .box div:nth-child(13) {
        position: absolute;
        left: 10%;
        top: 80%;
        animation: animate 15s linear infinite;
    } 
    .box div:nth-child(14) {
        position: absolute;
        left: 30%;
        top: 80%;
        animation: animate 15s linear infinite;
    } 
    .box div:nth-child(15) {
        position: absolute;
        left: 50%;
        top: 80%;
        animation: animate 15s linear infinite;
    } 
    .box div:nth-child(16) {
        position: absolute;
        left: 70%;
        top: 80%;
        animation: animate 15s linear infinite;
    } 
    .box div:nth-child(18) {
        position: absolute;
        left: 90%;
        top: 80%;
        animation: animate 15s linear infinite;
    } 
    @keyframes animate {
        0%{
            transform: scale(0) translateY(0) rotate(0);
            opacity: 1;
        }
        100%{
            transform: scale(1.1) translateY(-90px) rotate(360deg);
            opacity: 0;
        }
    }
    </style>
</head>

<body>
    <!-- menu  -->
    <?php
    session_start();
    include 'menu.php';?>
 

    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" action="connecter.php" method="POST">
                    <div class="login__field">
                        
                        <input type="text" class="login__input" name="login" placeholder="Username">
                    </div>
                    <div class="login__field">
                       
                        <input type="password" class="login__input" name="passe" placeholder="Password">
                    </div>
                    <button name="connect" class="button login__submit" value="connect">
                    Connecter
                        <!-- <span class="button__text">Log In Now</span> -->
                    </button>
                </form>
                <!-- <div class="social-login">
                    <h3>log in via</h3>
                    <div class="social-icons">
                        <a href="#" class="social-login__icon fab fa-instagram"></a>
                        <a href="#" class="social-login__icon fab fa-facebook"></a>
                        <a href="#" class="social-login__icon fab fa-twitter"></a>
                    </div>
                </div> -->
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
        <div class="box">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
           
        </div>
    </div>
</body>

</html>