<?php 
    require_once '../database.php';
    // Reference: https://medoo.in/api/select
    $items = $database->select("tb_information_dish","*");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Dishes</title>
</head>
<body>
    <h2>Registered Dishes</h2>
    <table>
        <?php
            foreach($items as $item){
                echo "<tr>";
                echo "<td>".$item["name_platillo"]."</td>";
                echo "<td><a href='edit.php?id=".$item["id_platillo"]."'>Edit</a> <a href='delete.php?id=".$item["id_platillo"]."'>Delete</a></td>";
                echo "</tr>";
            }
            echo "<td><a href='add.php?'>Add</a>";
        ?>
        
    </table>
    
</body>
</html>