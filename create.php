<?php
require_once "config.php";
session_start();

$id = $_SESSION['id'];

//Getting total number of lessons
$sql = "SELECT COUNT(id_lesson) as numOfLessons from lessons";

$result = mysqli_query($link, $sql);

$row = mysqli_fetch_assoc($result);

$numOfLessons = $row['numOfLessons'];

mysqli_free_result($result);

if (isset($_GET['id'])) {
    $lesson_id = $_GET['id'];
    $sql = "INSERT INTO my_lessons (student_id, lesson_id) VALUES ($id, $lesson_id)";

    mysqli_query($link, $sql);
    header("Location: create.php");
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
    <title>Add Lesson</title>

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
            margin: 0 auto;
            margin-bottom: 40px;
            color: white;
            background-color: #343A40;
            display: inline-block;
            width: 350px;
            border-radius: 6px;
            font-size: 50px;
        }

        .lesson_table a {
            text-decoration: none;
            padding: 5px 10px 5px 10px;
            border: 1px solid green;
            color: green;

            background-color: white;
            border-radius: 3px;
            transition: .3s;
        }

        .fa-plus {
            color: green;
        }

        .fa-plus {
            color: green;
        }

        .back {
            text-decoration: none;
            color: white;
            background-color: #343A40;
            border: 3px solid #343A40;
            padding: 3px;
            margin-bottom: 3px;
            border-radius: 5px;
            padding: 2px 5px;
            transition: .3s;
        }

        .back:hover {
            color: #343A40;
            background-color: white;
            text-decoration: none;
        }

        .fa-arrow-left {
            margin-right: 5px;
            color:
        }

        .lesson_table a:hover {
            background-color: green;
        }

        .lesson_table a:hover .fa-plus {
            color: white;
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
    </style>
</head>

<body>
    <div class="bg">
        <div class="wrapper text-center">
            <a href="login.php" class="back pull pull-left"><span class="fa fa-arrow-left"></span>Back</a>
            <div class="top mt-5 mb-3 clearfix">
                <h1 class="lessons">LESSON LIST</h1>
            </div>


            <div class="lesson_table">

                <?php

                $sql = "SELECT lesson_id FROM web_project.my_lessons WHERE student_id = $id";
                $result = mysqli_query($link, $sql);
                $lessonIds = array();

                //We are getting selected lessons into an array
                while ($row = mysqli_fetch_assoc($result)) {
                    $lessonIds[] = $row['lesson_id'];
                }

                mysqli_free_result($result);

                $sql = "SELECT * FROM lessons";

                if (sizeof($lessonIds) != $numOfLessons) {
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo '<thead class="thead-dark">';
                            echo "<tr>";
                            echo "<th>#</th>";
                            echo "<th>Lesson Name</th>";
                            echo "<th>Instructor</th>";
                            echo "<th>Credits</th>";
                            echo "<th>(+)</th>";
                            echo "</tr>";
                            echo "</thead><tbody>";

                            while ($row = mysqli_fetch_assoc($result)) {
                                $check = true;

                                foreach ($lessonIds as $id) {
                                    if ($row['id_lesson'] == $id) { // checking if the lesson was selected or not
                                        $check = false;
                                        break;
                                    }
                                }

                                if ($check) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id_lesson'] . "</td>";
                                    echo "<td>" . $row['lesson_name'] . "</td>";
                                    echo "<td>" . $row['instructor'] . "</td>";
                                    echo "<td>" . $row['credits'] . "</td>";
                                    echo "<td>";
                                    echo '<a href="create.php?id=' . $row['id_lesson'] . '"class="" title="Add Lesson" 
                                data-toggle="tooltip"><span class="fa fa-plus""></span></a>';
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            }

                            echo "</tbody>";
                            echo "</table>";

                            mysqli_free_result($result);

                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                } else
                    echo '<div class="alert alert-primary" role="alert"><em>You have taken all lessons.</em></div>';

                ?>


            </div>

        </div>
    </div>


</body>

</html>