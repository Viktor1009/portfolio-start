<?php include("../templates/header.php"); ?>

<?php
    if($_POST){
        require("../../conn.php");
        if($_POST["posttype"] == "new_cat"){
            echo "new_cat";

            $stmt = $conn->prepare("INSERT INTO categories (cat_name) VALUES (?)");
            $stmt->bind_param("s", $_POST["name"]);
            $stmt->execute(); /* Lägg även till ett till s vid bind params och en ? vid VALUES när du lägger till thumbnail*/
            $conn->close();
        } 
    }
    ?>

<a href="index.php">index</a>
<main id="add_cat">
    <form method="POST">
        <p>add categories</p>
        <input type="text" name="name" placeholder="name">
        <input class="btn btn-primary" type="submit" value="new_cat" name="posttype">
    </form>

    
</main>
<?php include("../templates/footer.php"); ?>