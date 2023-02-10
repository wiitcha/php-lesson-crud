<?php
require_once "config.php";

$username = $password = $email = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);

    $sql = "SELECT * FROM student_list WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($link, $sql);


    if (mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO student_list (name, surname, username, password, email) VALUES ('$name', '$surname','$username', '$password', '$email')";
        mysqli_query($link, $sql);
        header("Location: index.php");
    } else
        echo '<script>alert("User already exists.")</script>';

    mysqli_close($link);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <title>Register</title>

    <style>
        /* Add some style to the page */

        * {
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        html {
            height: 100%;
        }

        .bg {
            background-image: url(https://www.xtrafondos.com/wallpapers/resoluciones/19/estructura-abstracta-3d-gris-oscuro_2560x1440_3593.jpg);

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }


        body {
            font-family: sans-serif;
            background-image: #121212;
            border-radius: 4px;
            height: 100%
        }

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #F3EFE0;
            width: 750px;
            height: 450px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;

        }

        img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-105%, -50%);
            width: 350px;
            height: 400px;
        }


        h1 {
            text-align: center;
            color: #8F7158;
            margin-bottom: 40px;
            margin-top: 10px;
            font-weight: bold;
        }

        /* Style the register form */
        .register-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(0, -50%);
            width: 400px;
            height: 450px;
            background-color: #F3EFE0;
            border-radius: 0 4px 4px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        /* Style the form inputs */
        .register-form input[type="text"],
        .register-form input[type="password"] {
            width: 100%;
            height: 36px;
            margin-bottom: 10px;
            border: 1px solid #DCDCDC;
            padding: 0 10px;
            box-sizing: border-box;
            border-radius: 4px;
        }


        /* Style the submit button */
        .register-form input[type="submit"] {
            width: 100%;
            height: 36px;
            background-color: #8F7158;
            color: white;
            border: none;
            margin-top: 30px;
            border-radius: 4px;
            cursor: pointer;
            transition: .2s;
        }

        /* Add some hover effect to the submit button */
        .register-form input[type="submit"]:hover {
            background-color: #a6907d;
            color: white;

        }

        /* Add some responsive styling */
        @media (max-width: 600px) {
            .register-form {
                width: 90%;
                margin: 0 auto;
            }
        }

        #back {
            color: #8F7158;
            font-size: 21px;
            text-decoration: none;
            transition: .2s;
        }

        #back:hover {
            color: #a6907d;
            font-weight: bold;
        }

        .pw {
            position: relative;
        }

        #pw {
            width: 92%;
            padding: 12px 20px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .fa-eye,
        .fa-eye-slash {
            position: absolute;
            top: 5px;
            right: -8px;
            font-size: 16px;
            cursor: pointer;
            transition: .2s;
            padding: 5px;
            color: #383c44;
        }

        .fa-eye:hover,
        .fa-eye-slash:hover {
            color: #1d1712;
        }
    </style>

    <script>

        function myFunction() {
            var x = document.getElementById("pw");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function changeClass() {
            var x = document.getElementById("pw");

            if (document.getElementById("goz").className == "fa fa-eye pull pull-right") {
                x.type = "text";
                document.getElementById("goz").className = "fa fa-eye-slash pull pull-right";
            } else {
                x.type = "password";
                document.getElementById("goz").className = "fa fa-eye pull pull-right";
            }

        }

    </script>
</head>

<body>
    <div class="bg"></div>

    <div class="container">
        <img src="https://ai.hel.fi/wp-content/uploads/2020/06/helsinkiSlide3.png">
        <form class="register-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);
        ?>" method="post">
            <a href="index.php" id="back" class="pull pull-left"><span class="fa fa-arrow-left"></a>
            <h1>REGISTER</h1>
            <input type="text" name="name" pattern="^[a-zA-ZŞİÜÖ]+(([',. -][a-zA-Zğşüöı ])?[a-zA-Zğşüöı]*)*$"
                title="Invalid name" placeholder="Name" required>
            <input type="text" name="surname" pattern="([a-zA-ZÀ-ÿŞİÜÖ][-,a-zğşüöı. 'i]+[ ]*)+"
                title="Invalid surname" placeholder="Surname" required>
            <input type="text" name="username" placeholder="Username" required>
            <div class="pw">
                <input type="password" id="pw" name="password"
                    pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,}$"
                    title="Must contain at least a number, capital letter, lower letter and 6 characters"
                    placeholder="Password" required>
                <i class="fa fa-eye pull pull-right" id="goz" onclick="changeClass()" aria-hidden="true"></i>
            </div>

            <input type="text" name="email" id="email" pattern="[^@\s]+@[^@\s]+" title="example@mail.com"
                placeholder="Email" required />
            <input type="submit" value="Sign up">
        </form>
    </div>



</body>


</html>