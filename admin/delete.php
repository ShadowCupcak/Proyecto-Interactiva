<?php 

    require_once '../database.php';

    $message = "Do you want delete this dish?";

    if($_GET) {
        $item = $database->select("tb_information_dish", "*", ["id_platillo" => $_GET["id"]]);
    }
    
    if($_POST) {
        $database->delete("tb_information_dish", ["id_platillo" => $_POST["id"]]);
    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove dish</title>
    <link rel="stylesheet" href="../css/themes/admin.css">
</head>
<body>
    <div class="container">
        <h2>Remove dish</h2>
        <label>
            <?php 
                echo $message;
            ?>
        </label>
        
        <form method="post" action="delete.php">

        <div class="form-items">
            <label for="name_platillo">Platillo Name</label>
            <p><?php echo $item[0]["name_platillo"] ?></p>
        </div>

            <div class="form-items">
                <label for="image_platillo">Platillo image</label>
                <img id="preview" src="../imgs/<?php echo $item[0]["image_platillo"]; ?>" alt="Preview">
            </div>
            <input type="hidden" name="id" value="<?php echo $item[0]["id_platillo"]; ?>">
            <div class="form-items">
            <a href="list.php" class="list.php">
            <input class="submit-btn" type="submit" value="Remove Dish">
            </a>
            </div>
        </form>
    </div>
</body>
</html>