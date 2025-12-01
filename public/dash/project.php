<?php include("../templates/header.php"); ?>
    
    <a href="index.php">index</a>

    <?php
    $sql = "SELECT * FROM project WHERE project_id=" . $_GET["id"];
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){ ?>
                <?php echo $row["project_name"];?>
                <?php echo $row["project_info"];?>
                <?php echo $row["project_thumbnail"];?>
        <?php
        }   
    }
    ?> 
    
<?php include("../templates/footer.php"); ?>