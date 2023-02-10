<?php

require_once "config.php";
session_start();

$email = $_SESSION['email'];
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

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-image: url(https://img.freepik.com/free-photo/beige-abstract-wallpaper-background-image_53876-102527.jpg?w=2000);
            background-size: cover;
        }

        .content {

            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            height: 600px;
            width: 400px;
            background-color: #F3EFE0;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;

        }

        .infos {
            padding: 20px;
            padding-top: 40px;

        }

        .content a {
            color: #3ba1c5;
            font-size: 21px;
            text-decoration: none;
            margin: 10px;
            transition: .2s;
        }

        .fa {
            margin-right: 4px;
        }

        .content a:hover {
            color: #66b6d0;
            font-weight: bold;
        }

        .content p {

            padding: 5px;
            border-radius: 3px;
        }

        h2 {
            margin-top: 20px;
        }

        .buttons {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
    </div>
    <div class="wrapper">
        <div class="content ">
            <div class="buttons">
                <a href="login.php" id="back" class="pull pull-left"><span class="fa fa-arrow-left"></a>
                <a href="update.php" class="pull top-50 pull-right"><i class="fa fa-pencil "></i></a>
            </div>

            <div class="infos mx-auto text-center">
                <h3>Name</h3>
                <p><?php echo $_SESSION['name'] ?></p>
                <hr>
                <h3>Surname</h3>
                <p><?php echo $_SESSION['surname'] ?></p>
                <hr>
                <h3>Username</h3>
                <p><?php echo $_SESSION['username'] ?></p>
                <hr>
                <h3>Password</h3>
                <p>*******</p>
                <hr>
                <h3>Email</h3>
                <p><?php echo $email ?></p>
            </div>

        </div>
    </div>
</body>

</html>