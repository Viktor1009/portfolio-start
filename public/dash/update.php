<?php include("../templates/header.php"); ?>
    
    <a href="index.php">index</a>

    <?php

    if($_POST){
        require("../../conn.php");
        if($_POST["posttype"] == "Update"){
            echo "Update";

            $sql = "UPDATE project SET project_name = ?, project_info = ?, project_link = ? WHERE project_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $_POST["update_name"], $_POST["update_info"], $_POST["update_link"], $_POST["update_id"]);
            $stmt->execute();
            $stmt->close();
        }
    }
    
    $sql = "SELECT * FROM project WHERE project_id=" . $_GET["id"];
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){ ?>
            <form method="post" enctype="multipart/form-data">
                <input type="text" name="update_id" value="<?php echo $row["project_id"]?>" hidden>
                <input type="text" name="update_name" placeholder="name" value="<?php echo $row["project_name"];?>">
                <textarea type="text" name="update_info" placeholder="info"><?php echo $row["project_info"];?></textarea>
                <input type="file" name="update_fileToUpload" id="fileToUpload">
                <input type="text" name="update_link" placeholder="external link" value="<?php echo $row["project_link"];?>">
                <input class="btn btn-primary" type="submit" name="posttype" value="Update">
            </form>
        <?php
        }   
    }
    $conn->close();
    ?> 
    
<?php include("../templates/footer.php"); ?>