<?php
      require_once 'database.php';
      // Reference: https://medoo.in/api/select
      
    if($_GET){
        // Reference: https://medoo.in/api/where
        /*$item = $database->select("tb_destinations","*",[
            "id_destination"=>$_GET["id"]
        ]);*/

        // Reference: https://medoo.in/api/select
        // Note: don't delete the [>] 
        $item = $database->select("tb_information_dish","*",[
        "id_platillo"=>$_GET["id"]
        ]);
        $categoryName = $database->get("tb_category_dish", "category_name", ["id_category" => $item[0]["category_platillo"]]);
        //

        // Reference: https://medoo.in/api/select
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalana</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@900&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <!-- google fonts -->
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <?php 
        include "header.php";
    ?>
    <main>
       
                <?php
                    echo "<section class='food-activity'>";
                        echo "<div class='food-thumb'>";
                            echo "<img class='food-icon' src='./imgs/".$item[0]["image_platillo"]."' alt='".$item[0]["name_platillo"]."'>";
                        echo "</div>";
                        echo "<p class='activity-text'>".$item[0]["name_platillo"]."</p>";  
                        echo "<p class='activity-category'>Categoría: " . $categoryName . "</p>";
                        echo "<span class='activity-price'>$".$item[0]["price_platillo"]."</span>";
                        echo "<p class='activity-text'>".$item[0]["description_platillo"]."</p>";   
                        echo "<a class='btn read-btn' href='book.php?id=".$item[0]["id_platillo"]."'>Add to a cart</a>";
                    echo "</section>";
                ?>
                
            </div>

        </section>
    

    </main>
    <?php 
        include "footer.php";
    ?>
</body>
</html>

