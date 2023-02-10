<?php

require_once "config.php";
session_start();

$id = $_SESSION["id"];

if (isset($_GET["id"])) {
    $lesson_id = $_GET["id"];

    $sql = "DELETE FROM my_lessons WHERE student_id = $id AND lesson_id = $lesson_id";
    mysqli_query($link, $sql);
    header("Location: login.php");
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,200&family=Roboto:wght@100;300;400;500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-image: url(https://img.freepik.com/free-vector/shiny-white-gray-background-with-wavy-lines_1017-25101.jpg?w=2000);
            background-size: cover;
        }

        .lessons {
            margin: 40px auto;
            color: white;
            background-color: #343A40;
            display: block;
            width: 400px;
            border-radius: 6px;
            font-size: 60px;
        }

        #new-lesson {
            color: white;
            background-color: green;
            border: 2px solid green;
            padding: 6px 16px 6px 16px;
        }

        #new-lesson:hover {
            background-color: white;
            color: green;
            border: 2px solid green;
        }

        td,
        th {
            text-align: center;
        }

        .wrapper {
            width: 1200px;
            margin: 0 auto;
        }

        table tr td:last-child {
            width: 120px;
        }

        .lesson_table a {
            text-decoration: none;
            padding: 5px 10px 5px 10px;
            border: 1px solid red;
            color: red;
            background-color: white;
            border-radius: 3px;
            transition: .3s;
        }

        .fa-times {
            color: red;
        }

        .lesson_table a:hover {
            background-color: red;
        }

        .lesson_table a:hover .fa-times {
            color: white;
        }

        .dropbutton {
            background-color: #343A40;
            color: white;
            padding: 6px;
            font-size: 16px;
            border: none;
            font-family: 'Roboto', sans-serif;
            border-radius: 0.25rem;
            text-decoration: none;
            transition: .3s;
            z-index: 1;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 0.25rem;


        }

        #logout:hover {
            background-color: red;
            color: white;
            font-weight: bold;
            border-radius: 0.25rem;

        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #ddd;
            border-radius: 0.25rem;
            transition: .3s;

        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
            top: 36px;
        }

        .dropbutton:hover {
            text-decoration: none;
            color: white;
            /* border: 1px solid #656e71; */
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbutton {

            background-color: #656e71;
        }

        nav ul li {
            position: relative;
        }

        nav ul ul {
            position: absolute;
            width: 100%;
        }
    </style>
</head>

<body>




    <div class="wrapper">
        <div class="top mt-5 mb-3 clearfix">
            <h1 class="lessons text-center">MY LESSONS</h1>
            <div class="dropdown">
                <?php
                $name = $_SESSION["name"];
                $surname = $_SESSION["surname"];
                echo '<a href="#" style="text-decoration: none; width: 160px; text-align: center;" id="name" class="dropbutton pull pull-left">' .
                    strtoupper($name) .
                    " " .
                    strtoupper($surname) .
                    "</a>";
                ?>
                <div class="dropdown-content">
                    <a href="read.php" style="text-align: center">View Info</a>
                    <a href="index.php" id="logout" style="text-align: center">Log out</a>
                </div>
            </div>


            <a href="create.php" id="new-lesson" class="pull pull-right btn btn-dark">Add Lesson</a>
        </div>

        <div class="lesson_table text-center">

            <?php
            $sql = "SELECT id_lesson, lesson_name, instructor, credits FROM lessons 
INNER JOIN my_lessons ON my_lessons.lesson_id = lessons.id_lesson 
WHERE my_lessons.student_id = '$id'
ORDER BY id_lesson ASC";

            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo '<table class="table table-bordered table-striped">';
                    echo '<thead class="thead-dark">';
                    echo "<tr>";
                    echo "<th>#</th>";
                    echo "<th>Lesson Name</th>";
                    echo "<th>Instructor</th>";
                    echo "<th>Credits</th>";
                    echo "<th>(x)</th>";
                    echo "</tr>";
                    echo "</thead>";

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["id_lesson"] . "</td>";
                        echo "<td>" . $row["lesson_name"] . "</td>";
                        echo "<td>" . $row["instructor"] . "</td>";
                        echo "<td>" . $row["credits"] . "</td>";
                        echo "<td>";

                        echo '<a href="login.php?id=' .
                            $row["id_lesson"] .
                            '" id="' .
                            $row["id_lesson"] .
                            '" title="Delete Lesson" 
                        data-toggle="tooltip"><span class="fa fa-times""></span></a>';
                        echo "</td>";
                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";

                    mysqli_free_result($result);
                } else {
                    echo '<div class="alert alert-danger"><em>No lessons were 
found.</em></div>';
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            ?>


        </div>

    </div>

</body>

</html>