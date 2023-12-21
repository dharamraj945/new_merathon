<?php
include "./config/db_config.php";

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Dev-Desire Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Quicksand', sans-serif;
        }

        .continer {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #000;
        }

        section {
            position: absolute;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2px;
            flex-wrap: wrap;
            overflow: hidden;
        }

        section span {
            position: relative;
            display: block;
            width: calc(6.25vw - 2px);
            height: calc(6.25vw - 2px);
            background: #181818;
            z-index: 2;
            transition: 1.5s;
        }





        section .signin {
            position: absolute;
            width: 400px;
            background: #222;
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
        }

        section .signin .content {
            position: relative;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 40px;
        }

        section .signin .content h2 {
            font-size: 2em;
            color: #0f0;
            text-transform: uppercase;
        }

        section .signin .content .form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        section .signin .content .form .inputBx {
            position: relative;
            width: 100%;
        }

        section .signin .content .form .inputBx input {
            position: relative;
            width: 100%;
            background: #333;
            border: none;
            outline: none;
            padding: 25px 10px 7.5px;
            border-radius: 4px;
            color: #fff;
            font-weight: 500;
            font-size: 1em;
        }

        section .signin .content .form .inputBx i {
            position: absolute;
            left: 0;
            padding: 15px 10px;
            font-style: normal;
            color: #aaa;
            transition: 0.5s;
            pointer-events: none;

        }

        section .signin .content .form .inputBx input:focus~i,
        section .signin .content .form .inputBx input:valid~i {
            transform: translateY(-7.5px);
            font-size: 0.8em;
            color: #fff;
        }

        .signin .content .form .links {
            position: relative;
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .signin .content .form .links a {
            color: #fff;
            text-decoration: none;
        }

        .signin .content .form .links a:nth-child(2) {
            color: #0f0;
            font-weight: 600;
        }

        section .signin .content .form .inputBx input[type="submit"] {
            padding: 10px;
            background: #0f0;
            color: #111;
            font-weight: 600;
            font-size: 1.25em;
            letter-spacing: 0.05em;
            cursor: pointer;
        }

        @media (max-width: 900px) {
            section span {
                width: calc(10vw - 2px);
                height: calc(10vw - 2px);
            }
        }

        @media (max-width: 900px) {
            section span {
                width: calc(20vw - 2px);
                height: calc(20vw - 2px);

            }


        }

        .alert_box {

            color: red;
            display: hidden;
            justify-content: center;
            align-items: center;
        }

        .btn {

            border: none;
            padding: 4px 6px 4px 6px;
            border-radius: 5px;
            background-color: blue;
            color: white;
            cursor: pointerf;
        }

        .login_btn {

            cursor: pointer;

        }
    </style>
</head>


<body>


    <div class="continer">

        <section>


            <div class="signin">

                <div class="content">
                    <div id="alert_box" class="alert_box" style="display:none;">
                        <strong>
                            <p id="pass_error"></p>
                        </strong>
                    </div>
                    <h2>Sign In</h2>
                    <form class="form" method="POST" action="./config/auth.php">

                        <div class="inputBx">
                            <input value="" type="text" id="username" required="" name="email_id" autocomplete="">
                            <i>Username</i>
                        </div>
                        <div class="inputBx">
                            <input value="" type="password" id="password" required="" name="password" autocomplete="current-password">
                            <i>Password</i>
                        </div>
                        <div class="links">
                            <a href="#">Forgot Password</a>
                            <a href="#">Signup</a>
                        </div>
                        <div class="inputBx">
                            <button name="log_in" class="btn login_btn" type="submit"> Login</button>
                        </div>
                    </form>


                </div>
            </div>
        </section>






    </div>
</body>

</html>