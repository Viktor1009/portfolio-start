<?php include("../templates/header.php"); ?>
    hejhej
    <a href="add.php">Add</a>
    <a href="createcat.php">Categories</a>

    <?php
    $sql = "SELECT * FROM project";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){ ?>
            <a href="update.php?id=<?php echo $row["project_id"]; ?>">
                <?php echo $row["project_name"]; ?> Update
            </a>
        <?php
        }
    }
    ?>
    <?php
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){ ?>
            <a href="categories.php?id=<?php echo $row["cat_id"]; ?>">
                <?php echo $row["cat_name"]; ?> Update
            </a>
        <?php
        }
    }
    ?>

<?php include("../templates/footer.php"); ?>