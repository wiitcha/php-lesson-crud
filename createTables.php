<?php

require_once "config.php";

$sql = "CREATE TABLE `lessons` (
  `id_lesson` int NOT NULL AUTO_INCREMENT,
  `lesson_name` varchar(45) DEFAULT NULL,
  `instructor` varchar(45) DEFAULT NULL,
  `credits` int DEFAULT NULL,
  PRIMARY KEY (`id_lesson`)
) ENGINE=InnoDB AUTO_INCREMENT=1";

if (mysqli_query($link, $sql)) {
  $sql = "INSERT INTO `web_project`.`lessons`
  (`lesson_name`,
  `instructor`,
  `credits`)
  VALUES
  ('ALGORITHMICS MATHEMATICS', 'MHD WASIM RAED', 3),
  ('WEB PROGRAMMING', 'ALPARSLAN HORASAN', 3),
  ('DATABASE SYSTEMS', 'SELCUK SENER', 3),
  ('ADVANCED PROGRAMMING', 'SELCUK SENER', 3),
  ('THEORY OF COMPUTATION', 'VANYE ZIRA VANDUHE', 3),
  ('RENEWABLE ENERGY SOURCES', 'ABBAS UGURENVER', 3),
  ('SOFTWARE DESIGN APPLICATIONS', 'SELCUK SENER', 3),
  ('MICROPROCESSORS', 'PERI GUNES', 4),
  ('PROJECT MANAGEMENT APPLICATIONS', 'SEMİH YÖN', 3)";

  if (mysqli_query($link, $sql)) {
    $sql = "CREATE TABLE `student_list` (
      `id` int NOT NULL AUTO_INCREMENT,
      `name` varchar(50) NOT NULL,
      `surname` varchar(50) NOT NULL,
      `username` varchar(50) NOT NULL,
      `password` varchar(45) NOT NULL,
      `email` varchar(50)NOT NULL,
      PRIMARY KEY (`id`),
      UNIQUE KEY `username_UNIQUE` (`username`),
      UNIQUE KEY `email_UNIQUE` (`email`)
    ) ENGINE=InnoDB AUTO_INCREMENT=1";

    if (mysqli_query($link, $sql)) {

      $sql = "CREATE TABLE `my_lessons` (
        `student_id` int NOT NULL,
        `lesson_id` int NOT NULL,
        KEY `student_id` (`student_id`),
        KEY `lesson_id` (`lesson_id`),
        CONSTRAINT `my_lessons_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_list` (`id`),
        CONSTRAINT `my_lessons_ibfk_2` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id_lesson`)
      ) ENGINE=InnoDB";

      if (mysqli_query($link, $sql)) {
        echo "Tables were created successfully";
      } else {
        echo "Error creating table: " . $link->error;
      }
    } else {
      echo "Error creating table: " . $link->error;
    }
  } else {
    echo "Error creating table: " . $link->error;
  }

} else {
  echo "Error creating table: " . $link->error;
}


?>