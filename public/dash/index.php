<?php include("../templates/header.php"); ?>

    <a href="../index.php">User Interface</a>
    <h4>Create</h4>
    <a href="add.php">Add</a>
    <a href="createCat.php">Categories</a>

    <h4>Edit Projects</h4>
    <?php
    $sql = "SELECT * FROM project";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){ ?>
            <a href="update.php?id=<?php echo $row["project_id"]; ?>">
                <?php echo $row["project_name"]; ?>
            </a>
        <?php
        }
    }
    ?>
    <h4>Edit Categories</h4>
    <?php
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){ ?>
            <a href="categories.php?id=<?php echo $row["cat_id"]; ?>">
                <?php echo $row["cat_name"]; ?>
            </a>
        <?php
        }
    }
    ?>

<?php include("../templates/footer.php"); ?>