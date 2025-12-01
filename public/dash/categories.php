<?php include("../templates/header.php"); ?>
    <a href="index.php">index</a>
    <h4>Categories</h4>

    <?php // visar upp Kategorier 

    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){ ?>
            <a href="project.php?id=<?php echo $row["cat_id"]; ?>">
                <?php echo $row["cat_name"];?>
            </a>
        <?php
        }
    }
    ?>

    <h4>Create Categories</h4>
    <input type="text" name="categorie" placeholder="categorie">
    <input type="submit" class="btn btn-primary" name=""> <!-- Ge name ett bra namn
   
    
<?php include("../templates/footer.php"); ?>