<?php
    require_once './database.php';
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

        <section class="food-container">
            <div class="food-activity">
          
                <form method="get" action="results.php">
                    <label for="search" class="activity-title">Search</label>
                    <input id="search" class="search" type="text" name="keyword">
                    <select name="filter" id="filter" class= "filter">
            


             </select>
                    <input type="submit" class= "btn search-btn" value="Search dish" >
                </form>
                
            </div>


        </section>

    </main>
    <?php 
        include "icons_menu.php";
    ?>
    <?php 
        include "footer.php";
    ?>
</body>
</html>
