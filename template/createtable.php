<?php

    displayMsg("success", "starting creation of tables");

    $sql = "CREATE TABLE IF NOT EXISTS project (
    project_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    project_name VARCHAR(50) NOT NULL,
    project_info VARCHAR(500) NOT NULL,
    project_link VARCHAR(100),
    project_thumbnail VARCHAR(100)
    )";
    $createProjects = $conn->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS image (
    project_id INT NOT NULL,
    image_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    image_url VARCHAR(100) NOT NULL
    )";
    $createImages = $conn->query($sql);
    
    $sql = "CREATE TABLE IF NOT EXISTS categories (
    cat_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    cat_name VARCHAR(100) NOT NULL
    )";
    $createCatergories = $conn->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS categories_relations (
    cat_id INT NOT NULL,
    project_id INT NOT NULL
    )";
    $createCatergories_Relations = $conn->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS info (
    person_name VARCHAR(50) NOT NULL,
    person_phone VARCHAR(50),
    person_mail VARCHAR(100),
    person_discord VARCHAR(100),
    person_about VARCHAR(500),
    person_image VARCHAR(100),
    person_welcome VARCHAR(500)
    )"; 
    $createInfo = $conn->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS user (
    login_username VARCHAR(100),
    login_password VARCHAR(100),
    login_role VARCHAR(100)
    )";
    $createUsers = $conn->query($sql);
?>