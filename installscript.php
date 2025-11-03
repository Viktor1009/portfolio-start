<?php

    $conn = mysqli_connect($_POST["host"], $_POST["dbuser"], $_POST["dbpass"]);
    if(!$conn) {
        displayMsg("error", "Wrong passowrd for database");
        exit();
    } else {
        displayMsg("success", "Connected");

        $sql = "CREATE DATABASE" . $_POST["dbname"];
        try {
            $conn->query($sql);
            displayMsg ("success", "Database created successfully")
        }catch(mysqli_sql_exeception $exeption){
            displayMsg("error", "Database already exists")
        }

    }
    $conn->close();
    $conn = mysqli_connect($_POST["host"], $_POST["dbuser"], $_POST["dbpass"], $_POST["dbname"]);

    if(!$conn) {
        displayMsg("error", "Wrong passowrd for database");
        exit();
    } else {
        displayMsg("success", "Make Tables");
    
        include_once("../../create/createtable.php")
    }
    $conn->close();
    $conn = mysqli_connect($_POST["host"], $_POST["dbuser"], $_POST["dbpass"], $_POST["dbname"]);
    /**
     * Här vill jag att ni fortsätter, ni ska
     * 1. Skapa en databas.
     * 2. Skapa tabeller
     * 3. Lägga in eventuell dummy data som behövs direkt
     * 4. Skapa en användare i users-tabellen
     * 4. Skapa en .env som vi använder i fortsättningen.
     * https://www.w3schools.com/php/php_mysql_create_table.asp
     */
?>
