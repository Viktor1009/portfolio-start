<?php include("../templates/header.php"); ?>
    
    <a href="index.php">index</a>

    <?php

    if($_POST){
        require("../../conn.php");
        if($_POST["posttype"] == "Cat_Update"){
            echo "Update";

            $sql = "UPDATE categories SET cat_name = ? WHERE cat_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $_POST["update_name"], $_POST["update_id"]);
            $stmt->execute();
            $stmt->close();
        }
    }
    
    $sql = "SELECT * FROM categories WHERE cat_id=" . $_GET["id"];
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){ ?>
            <form method="post" enctype="multipart/form-data">
                <input type="text" name="update_id" value="<?php echo $row["cat_id"]?>" hidden>
                <input type="text" name="update_name" placeholder="name" value="<?php echo $row["cat_name"];?>">
                <input class="btn btn-primary" type="submit" name="posttype" value="Cat_Update">
            </form>
        <?php
        }   
        /* 
        <form action="" method="POST">
                <input type="text" name="id" value="<?php echo $row["_id"];?>" hidden>
                <input type="submit" name="posttype" value="X">
            </form>
            $sql = "DELETE FROM pizzas WHERE _id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $_POST["id"]);
            $stmt->execute();
            $stmt->close();
            $conn->close();
        
        */
    }
    $conn->close();
    ?> 
    
<?php include("../templates/footer.php"); ?>