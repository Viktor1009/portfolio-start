<?php
    $conn = mysqli_connect($_POST["host"], $_POST["dbuser"], $_POST["dbpass"]);
    if(!$conn) {
        displayMsg("error", "Wrong passowrd for database");
        exit();
    } 
    else {
        displayMsg("success", "Connected");

        $sql = "CREATE DATABASE IF NOT EXISTS " . $_POST["dbname"];
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
    
        include_once("../../prefabs/createTable.php");

        $conn->query("INSERT INTO project (project_name, project_info) VALUES ('testproject', 'testinfo')");
        $conn->query("INSERT INTO info (person_name, person_mail, person_about, person_welcome) VALUES 
                    ('testname', 'test.test@test.test', 'testing the about section', 'welcome!!!')");

        $admin = "admin";
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO user(login_username, login_password, login_role) VALUES(?,?,?)");
        $stmt->bind_param("sss", $_POST["admin"], $password, $admin);
        $stmt->execute();
        $stmt->close();

        makeEnv();
    }
    $conn->close();

     function makeTabel($conn, $sql, $name) {
        try {
            $conn->query($sql);
            displayMsg("success", "Tabel " . $name . " created successfully");
        } catch(mysqli_sql_exception $e){
            displayMsg("error",  $name . " already exists");
        }
    }


    function makeEnv(){
        $env = [
            'DB_HOST' => $_POST["host"],
            'DB_PORT' => '3306',
            'DB_DATABASE' => $_POST["dbname"],
            'DB_USER' => $_POST["dbuser"],
            'DB_PASSWORD' => $_POST["dbpass"],
        ];
        $content = "";
        foreach ($env as $key => $value) {
            $content .= "{$key}={$value}\n";
        }    
    
        $file = __DIR__ . '/.env';
        if (file_put_contents($file, $content)) {
            displayMsg("success", "All done");
        } else {
            echo "Något knas";
        }

        echo '<a href="/dash/index.php">Gå till Dashboard</a>';
    }
?>
