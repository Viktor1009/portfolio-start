<?php include("../templates/header.php"); ?>
    
    <a href="index.php">index</a>

    <?php
    $sql = "SELECT * FROM project WHERE project_id=" . $_GET["id"];
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){ ?>
            <input type="text" name="name" placeholder="name" text="<?php echo $row["project_name"];?>">
            <textarea type="text" name="info" placeholder="info" text="<?php echo $row["project_info"];?>"></textarea>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="text" name="link" placeholder="external link" text="<?php echo $row["project_link"];?>">
            <input class="btn btn-primary" type="submit" name=""><!-- Ge den ett rimligt namn
        <?php
        }   
    }
    ?> 
    
<?php include("../templates/footer.php"); ?>