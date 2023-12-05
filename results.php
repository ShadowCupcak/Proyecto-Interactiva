
<?php
    require_once './database.php';
    // Reference: https://medoo.in/api/select
   // $items = $database->select("tb_destinations","*");

    if(isset($_GET["keyword"])){
    
      $items = $database->select("tb_information_dish","*", [
           "name_platillo[~]" => $_GET["keyword"]
     ]);

  
    }else{
      
      echo "not found";
  
    }
  

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camping Website</title>
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
        <!-- destinations -->
        <section class="search-container">
            <?php
                if (count ($items) > 0) {
                echo "<p class='activity-text'>We found:  <span class= 'activity-title' >".count ($items)."</span> Food</p>";
                 }
             ?>
            <div class="food-container">
          
                <?php  
                         if (count ($items) > 0) {
                          foreach($items as $item){
                            echo "<section class='food-activity'>";
                            echo "<div class='food-thumb'>";
                            echo "<img class='food-icon' src='./imgs/" . $item["image_platillo"] . "' alt='" . $item["name_platillo"] . "'>";
                            echo "</div>";
                            echo "<h3>" . $item["name_platillo"] . "</h3>";
                            echo "<span class='activity-price'>$".$item["price_platillo"]."</span>";
                        echo "<p class='activity-text'>".substr($item["description_platillo"], 0, 70)."...</p>";
                        echo "<a class='best-seller-button' href='platillo.php?id=".$item["id_platillo"]."'>View Details</a>";
                        echo "</section>";
                        }
                       }else{
                        echo "<h3 class='activity-title'>No results for ".$_GET["keyword"]."</h3>";

  
                       }
                    
                ?>
                
            </div>

            <!-- view all -->
    
            <!-- view all -->

        </section>
        <!-- destinations -->

        <?php 
            include "icons_menu.php";
        ?>

    </main>
    <?php 
        include "footer.php";
    ?>
</body>
</html>

