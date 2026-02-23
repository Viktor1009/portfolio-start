<?php include("../templates/header.php"); ?>



<a href="index.php">index</a>
<main id="add">
    <form method="POST" enctype="multipart/form-data">
        <p>add</p>
        <input type="text" name="name" placeholder="name">
        <textarea type="text" name="info" placeholder="info"></textarea>
        <input type="file" name="files[]" id="files" multiple>
        <input type="text" name="link" placeholder="external link">
        <input class="btn btn-primary" type="submit" value="new_project" name="posttype">
    </form>
</main>

<?php

require("../../conn.php");
if($_POST){
    if($_POST["posttype"] == "new_project"){
        echo "new_project";

        $stmt = $conn->prepare("INSERT INTO project (project_name, project_info, project_link) VALUES (?,?,?)");
        $stmt->bind_param("sss", $_POST["name"], $_POST["info"], $_POST["link"]);

        if($stmt->execute()){
            $last_project_id = $conn->insert_id;
            if($_FILES){
                foreach($_FILES["files"]["name"] as $i => $key){
                    if(!empty($_FILES["files"]["name"][$i])){
                        $uploadedFilePath = uploadImg($i, $conn, $last_project_id);

                        if($i === 0 && $uploadedFilePath) {
                            $thumbPath = createThumbnail($uploadedFilePath);
                            echo "Thumbnail skapad: " . $thumbPath . "<br>";
                            
                            $stmtThumb = $conn->prepare("UPDATE project SET project_thumb = ? WHERE project_id = ?");
                            $stmtThumb->bind_param("si", $thumbPath, $last_project_id);
                            $stmtThumb->execute();
                            $stmtThumb->close();
                        }
                    }
                }   
            }
        }
    $stmt->close();
    } 
}
$conn->close();

?>

<?php include("../templates/footer.php"); ?>