<?php include("../templates/header.php"); ?>
    hejhej
    <a href="add.php">add</a>

    <?php
    $sql = "SELECT * FROM project";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){ ?>
            <a href="project.php?id=<?php echo $row["project_id"]; ?>">
                <?php echo $row["project_name"];?>
            </a>
            <a href="update.php?id=<?php echo $row["project_id"]; ?>">
                <?php echo $row["project_name"]; ?> Update
            </a>
        <?php
        }
    }
    ?>

<?php include("../templates/footer.php"); ?>