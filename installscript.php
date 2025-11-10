<?php

    $conn = mysqli_connect($_POST["host"], $_POST["dbuser"], $_POST["dbpass"]);
    if(!$conn) {
        displayMsg("error", "Wrong passowrd for database");
        exit();
    } 
    else {
        displayMsg("success", "Connected");

        $sql = "CREATE DATABASE " . $_POST["dbname"];
        try {
            $conn->query($sql);
            displayMsg ("success", "Database created successfully");
        }
        catch(mysqli_sql_exeception $exception){
            displayMsg("error", "Database already exists");
        }
    }
    $conn->close();
    $conn = mysqli_connect($_POST["host"], $_POST["dbuser"], $_POST["dbpass"], $_POST["dbname"]);

    if(!$conn) {
        displayMsg("error", "Wrong passowrd for database");
        exit();
    } else {
        displayMsg("success", "Make Tables");
    
        include_once("../../create/createtable.php");
    }
    $conn->close();
    $conn = mysqli_connect($_POST["host"], $_POST["dbuser"], $_POST["dbpass"], $_POST["dbname"]);

    if(!$conn) {
        displayMsg("error", "idk man");
    }
    else {
        $conn->query("INSERT INTO project (project_name, project_info) VALUES ('testproject', 'testinfo')");
        $conn->query("INSERT INTO info (person_name, person_mail, person_about, person_welcome) VALUES ('testname', 'test.test@test.test', 'testing the about section', 'welcome!!!')");
    }
    $conn->close();
    $conn = mysqli_connect($_POST["host"], $_POST["dbuser"], $_POST["dbpass"], $_POST["dbname"]);
    
    if(!$conn) {
        displayMsg("error", "this is the Users");
    }
    else {
            $stmt = $conn->prepare("INSERT INTO users(login_username, login_password) VALUES(?,?)");
            $stmt->bind_param("ss", $_POST["username"], $_POST["password"]);
            $stmt->execute();
            $stmt->close();

            $conn->query("INSERT INTO users (login_role) VALUES ('admin')");
    }
    $conn->close();

    // $conn->query("INSERT INTO pizzas (name, type, cost) VALUES ('testPizza', 'testToppings', 1)");
    
    /**
     * Här vill jag att ni fortsätter, ni ska
     * 1. Skapa en databas. -
     * 2. Skapa tabeller -
     * 3. Lägga in eventuell dummy data som behövs direkt
     * 4. Skapa en användare i users-tabellen
     * 4. Skapa en .env som vi använder i fortsättningen.
     * https://www.w3schools.com/php/php_mysql_create_table.asp
     */
?>
