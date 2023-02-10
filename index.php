<?php

require_once "config.php";

$username = $password = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    session_start();

    $sql = "SELECT * FROM student_list WHERE username = '$username' and password = '$password'";
    if ($result = mysqli_query($link, $sql)) {
        if ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['surname'] = $row['surname'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['email'] = $row['email'];

            header("Location: login.php", true, 301);

        } else
            echo '<script>alert("Username or password is not found.")</script>';
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }

    mysqli_close($link);

}
?>

<html>


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
    <style>
        /* Add some style to the page */

        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-image: url(https://wallpaperaccess.com/full/3237919.jpg);
            background-size: cover;
        }

        /* Style the login form */
        .login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            background-color: #F3EFE0;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        .login-form h2 {
            color: #8F7158;
            align-items: center;
            font-weight: bold;
            margin-bottom: 16px;

        }

        /* Style the form inputs */
        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            height: 36px;
            margin-bottom: 10px;
            border: 1px solid #dcdcdc;
            padding: 0 10px;
            box-sizing: border-box;
            border-radius: 4px;
        }

        /* Style the submit button */
        .login-form input[type="submit"] {
            width: 100%;
            height: 36px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: .2s;
        }

        /* Add some hover effect to the submit button */
        .login-form input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Style the register button */
        .login-form input[type="button"] {
            width: 100%;
            height: 36px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: .2s;

        }

        /* Add some hover effect to the register button */
        .login-form input[type="button"]:hover {
            background-color: #444;
        }

        /* Add some responsive styling */
        @media (max-width: 600px) {
            .login-form {
                width: 90%;
                margin: 0 auto;
            }
        }
    </style>
</head>

<body>
    <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);
    ?>">
        <h2>LOGIN</h2>
        <input type="text" name="username" placeholder="Username" required />
        <input type="password" name="password" placeholder="Password" required />
        <input type="submit" value="Log in" />
        <input type="button" value="Register" onclick="location.href='register.php'" />
    </form>
</body>

</html>