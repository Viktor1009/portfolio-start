<?php
        $sql = "CREATE TABLE IF NOT EXISTS Project (
        project_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
        project_name VARCHAR(50) NOT NULL,
        project_info VARCHAR(500) NOT NULL,
        project_link VARCHAR(100),
        project_thumbnail VARCHAR(100)
        )";

        $sql = "CREATE TABLE IF NOT EXISTS Image (
        project_id INT NOT NULL,
        image_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
        image_url VARCHAR(100) NOT NULL
        )";
        
        $sql = "CREATE TABLE IF NOT EXISTS Categories (
        cat_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
        cat_name VARCHAR(100) NOT NULL
        )";

        $sql = "CREATE TABLE IF NOT EXISTS Categories_Relations (
        cat_id INT NOT NULL,
        project_id INT NOT NULL
        )";

        $sql = "CREATE TABLE IF NOT EXISTS Info (
        person_name VARCHAR(50) NOT NULL
        person_phone VARCHAR(50)
        person_mail VARCHAR(100)
        person_discord VARCHAR(100)
        person_about VARCHAR(500)
        person_image VARCHAR(100)
        person_welcome VARCHAR(500)
        )";

        $sql = "CREATE TABLE IF NOT EXISTS Users (
        login_username VARCHAR(100)
        login_password VARCHAR(100)
        login_role VARCHAR(100)
        )";
    ?>