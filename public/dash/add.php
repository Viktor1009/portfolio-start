<?php include("../templates/header.php"); ?>
<a href="index.php">index</a>
<main id="add">
    <form method="POST">
        <p>add</p>
        <input type="text" name="name" placeholder="name">
        <textarea type="text" name="info" placeholder="info"></textarea>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="text" name="link" placeholder="external link">
        <input class="btn btn-primary" type="submit" value="new_project" name="posttype">
    </form>

    <?php
    if($_POST){
        require("../../conn.php");
        if($_POST["posttype"] == "new_project"){
            echo "new_project";

            $stmt = $conn->prepare("INSERT INTO project (project_name, project_info, project_link) VALUES (?,?,?)");
            $stmt->bind_param("sss", $_POST["name"], $_POST["info"], $_POST["link"]);
            $stmt->execute(); /* Lägg även till ett till s vid bind params och en ? vid VALUES när du lägger till thumbnail*/
            $conn->close();
        } 
    }
    ?>
</main>
<?php include("../templates/footer.php"); ?>