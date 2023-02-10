<?php

require_once "config.php";
session_start();
function successAlert($bold, $message)
{
    echo '<div class="container">
            <div class="alert alert-success fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>' . $bold . '</strong> ' . $message . '
            </div>
          </div>';
}

$id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);


    $sql = "UPDATE student_list SET name = '$name', surname = '$surname', username = '$username', password = '$password', email = '$email' WHERE id = $id";

    if (mysqli_query($link, $sql)) {
        $_SESSION['name'] = trim($_POST['name']);
        $_SESSION['surname'] = trim($_POST['surname']);
        $_SESSION['username'] = trim($_POST['username']);
        $_SESSION['password'] = trim($_POST['password']);
        $_SESSION['email'] = trim($_POST['email']);
    }

    mysqli_close($link);

    header("Location: read.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,200&family=Roboto:wght@100;300;400;500&display=swap"
        rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Info</title>

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

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #383c44;
            background-image: url(https://img.freepik.com/free-photo/beige-abstract-wallpaper-background-image_53876-102527.jpg?w=2000);
            background-size: cover;
        }

        .content {

            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            height: 700px;
            width: 500px;
            background-color: #F3EFE0;
            border-radius: 4px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;

        }

        .infos {
            padding: 20px;
            margin-top: 20px;
        }

        .content a {
            color: white;
            height: 36px;
            background-color: gray;
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 3px;
            margin: 10px;
        }

        .content a:hover {
            color: white;
            background-color: #a09d9d;
            font-weight: bold;
        }

        .content p {
            border: 2px solid black;
            padding: 5px;
            border-radius: 3px;
        }

        input[type=text],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 12px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        #pw {
            width: 90%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .buttons {
            margin-top: 20px;
        }

        .pw {
            position: relative;
        }

        .fa {
            position: absolute;
            top: 20px;
            right: 3px;
            font-size: 20px;
            cursor: pointer;
            transition: .2s;
            right: -4px;
            top: 17px;
            border: 1px solid #383c44;
            padding: 5px;
            background-color: white;
            color: #383c44;
            border-radius: 50%;
        }

        .fa:hover {
            color: white;
            background-color: #383c44;
        }

        input[type="submit"] {
            width: 33%;
            height: 35px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: .2s;
        }

        input[type="submit"]:hover {
            background-color: #408a43;

        }
    </style>
</head>

<body>
    <div class="header">
    </div>
    <div class="wrapper">
        <div class="content ">
            <div class="infos">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);
                ?>" method="post">
                    <h3>Name</h3>
                    <input type="text" name="name" pattern="^[a-zA-ZŞİÜÖ]+(([',. -][a-zA-Zğşüöı ])?[a-zA-Zğşüöı]*)*$"
                        title="Invalid name" placeholder="Name" value="<?php echo $_SESSION['name'] ?>" required>
                    <h3>Surname</h3>
                    <input type="text" name="surname" pattern="([a-zA-ZÀ-ÿŞİÜÖ][-,a-zğşüöı. 'i]+[ ]*)+"
                        title="Invalid surname" placeholder="Surname" value="<?php echo $_SESSION['surname'] ?>"
                        required>
                    <h3>Username</h3>
                    <input type="text" name="username" placeholder="Username"
                        value="<?php echo $_SESSION['username'] ?>" required>
                    <h3>Password</h3>
                    <div class="pw">
                        <input type="password" name="password" id="pw"
                            pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,}$"
                            title="Must contain at least a number, capital letter, lower letter and 6 characters"
                            placeholder="Password" value="<?php echo $_SESSION['password'] ?>" required>
                        <i class="fa fa-eye pull pull-right" id="goz" onclick="changeClass()" aria-hidden="true"></i>
                    </div>
                    <h3>Email</h3>
                    <input type="text" name="email" id="email" pattern="[^@\s]+@[^@\s]+" title="example@mail.com"
                        placeholder="Email" value="<?php echo $_SESSION['email'] ?>" required />
                    <div class="buttons">
                        <input type="submit" value="Save changes">
                        <a href="read.php">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>