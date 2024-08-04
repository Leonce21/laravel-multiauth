<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
    <style>
        /* Google Fonts - Poppins */
        /* @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap'); */

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        /* body{
            background: #222D32;
        } */
        .container{
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #222D32;
            column-gap: 30px;
        }
        .form{
            position: absolute;
            max-width: 430px;
            width: 100%;
            padding: 30px;
            border-radius: 6px;
            background: #1A2226;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        }
        .form.signup{
            opacity: 0;
            pointer-events: none;
        }
        .forms.show-signup .form.signup{
            opacity: 1;
            pointer-events: auto;
        }
        .forms.show-signup .form.login{
            opacity: 0;
            pointer-events: none;
        }
        .login-key {
            height: 100px;
            font-size: 80px;
            line-height: 100px;
            text-align: center;
            background: -webkit-linear-gradient(#27EF9F, #0DB8DE);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        header{
            font-size: 30px;
            font-weight: 600;
            font-weight: bold;
            color: #ECF0F5;
            letter-spacing: 2px;
            text-align: center;
        }
        form{
            margin-top: 30px;
        }
        .form .field{
            position: relative;
            height: 50px;
            width: 100%;
            margin-top: 20px;
            background-color: #1A2226; 
            border-radius: 6px;
        }
        .field input,
        .field button{
            height: 100%;
            width: 100%;
            border: none;
            font-size: 16px;
            font-weight: 400;
            border-radius: 6px;
        }
        .field input{
            outline: none;
            padding: 0 15px;
            color: #ECF0F5;
            background-color: #1A2226;  
            border: 1px solid#CACACA;
        }
        .field input:focus{
            border-bottom-width: 2px;
            color: #ECF0F5;
           
        }
        .eye-icon{
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            font-size: 18px;
            color: #8b8b8b;
            cursor: pointer;
            padding: 5px;
        }
        .field button{
            color: #fff;
            background-color: #0171d3;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .field button:hover{
            background-color: #0DB8DE;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }
        .form-link{
            text-align: center;
            margin-top: 10px;
        }
        .form-link span,
        .form-link a{
            font-size: 14px;
            font-weight: 400;
            color: #232836;
        }
        .form a{
            color: #0171d3;
            text-decoration: none;
        }
        .form-content a:hover{
            text-decoration: underline;
        }
        .form-content .error-txt{
            color: #dc3545;
        }


        @media screen and (max-width: 400px) {
            .form{
                padding: 20px 10px;
            }
            
        }
    </style>
</head>

<body>
    {{-- @include('layouts._message')
    <form action="{{ route('admin_login_submit') }}" method="post">
        @csrf
        <div class="form-control">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" placeholder="email">
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>
        <div class="form-control">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="password">
            <span class="text-danger">{{ $errors->first('password') }}</span>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('admin_forget_password') }}">forget password</a>
    </form> --}}

    <section class="container forms">
        
        <div class="form login">
            @include('layouts._message')
            <div class="form-content">
                <div class="login-key">
                    <i class='bx bx-key'></i>
                </div>
                <header>ADMIN PANEL</header>
                <form action="{{ route('admin_login_submit') }}" method="post">
                    @csrf
                    <div class="email">
                        <div class="field input-field">
                            <input 
                                type="email" 
                                placeholder="Email" 
                                name="email"
                                class="input"
                            >
                            
                        </div>
                        
                        <div class="error-txt">{{ $errors->first('email') }}</div>
                        
                    </div>
                    

                    <div class="password">
                        <div class="field input-field">
                            <input 
                                type="password" 
                                placeholder="Password" 
                                class="password"
                                name="password"
                            >
                            <i class='bx bx-hide eye-icon'></i>
                          
                        </div>
                        <div class="error-txt">{{ $errors->first('password') }}</div>
                    </div>
                    

                    <div class="form-link">
                        <a href="{{ route('admin_forget_password') }}" class="forgot-pass">Forgot password?</a>
                    </div>

                    <div class="field button-field">
                        <button>Login</button>
                    </div>
                </form>
            </div>


        </div>

    </section>

    <script>
        const forms = document.querySelector(".forms"),
        pwShowHide = document.querySelectorAll(".eye-icon"),
        links = document.querySelectorAll(".link");

        pwShowHide.forEach(eyeIcon => {
            eyeIcon.addEventListener("click", () => {
                let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");
                
                pwFields.forEach(password => {
                    if(password.type === "password"){
                        password.type = "text";
                        eyeIcon.classList.replace("bx-hide", "bx-show");
                        return;
                    }
                    password.type = "password";
                    eyeIcon.classList.replace("bx-show", "bx-hide");
                })
                
            })
        })      

        links.forEach(link => {
            link.addEventListener("click", e => {
            e.preventDefault(); //preventing form submit
            forms.classList.toggle("show-signup");
            })
        })
    </script>
</body>

</html>
