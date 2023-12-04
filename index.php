<?php
    require_once 'database.php';
    // Reference: https://medoo.in/api/select
    $items = $database->select("tb_information_dish","*");
    
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
        <?php 
        
        ?>
        <!-- destinations -->
      
        <?php
echo "<h2 class='title-featured'> Featured Dishes</h2>";
echo "<div class='food-container'>";

// Utiliza un contador para limitar la cantidad de elementos mostrados a 4
$count = 0;

foreach ($items as $item) {
    if ($count < 10) {
        echo "<section class='food-activity'>";
        echo "<img class='food-icon' src='./imgs/" . $item["image_platillo"] . "' alt='" . $item["name_platillo"] . "'>";
        echo "<a class='best-seller-button' href='destination.php?id=" . $item["id_platillo"] . "'>View More</a>";
        echo "</section>";

        $count++;
    } else {
        break;  // Rompe el bucle después de mostrar 4 elementos
    }
}


echo "</div>";
?>
<?php 
        include "icons_menu.php";
    ?>
         

        </section>
        <!-- destinations -->


    </main>
    <?php 
        include "footer.php";
    ?>
</body>
</html>
