<?php 
    /***
     * 0. include database connection file
     * 1. receive form values from post and insert them into the table (match table field with values from name atributte)
     * 2. for the destination_image insert the value "destination-placeholder.webp"
     * 3. redirect to destinations-list. php after complete the insert into
     */

     require_once '../database.php';
     $categories = $database->select("tb_information_dish","*");
     $categories1 = $database->select("tb_category_dish", ["id_category", "category_name"]);
     $message = "";
     if($_GET){
        $item = $database->select("tb_information_dish","*",[
            "id_platillo" => $_GET["id"],
        ]);
     }

     if($_POST){

        if(isset($_FILES["image_platillo"])){
            $errors = [];
            $file_name = $_FILES["image_platillo"]["name"];
            $file_size = $_FILES["image_platillo"]["size"];
            $file_tmp = $_FILES["image_platillo"]["tmp_name"];
            $file_type = $_FILES["image_platillo"]["type"];
            $file_ext_arr = explode(".", $_FILES["image_platillo"]["name"]);

            $file_ext = end($file_ext_arr);
            $img_ext = ["jpeg", "png", "jpg", "webp"];

            if(!in_array($file_ext, $img_ext)){
                $errors[] = "File type is not valid";
                $message = "File type is not valid";
            }

            if(empty($errors)){
                $filename = strtolower($_POST["name_platillo"]);
                $filename = str_replace(',', '', $filename);
                $filename = str_replace('.', '', $filename);
                $filename = str_replace(' ', '-', $filename);
                $img = "location-".$filename.".".$file_ext;
                move_uploaded_file($file_tmp, "../imgs/".$img);

                $database->insert("tb_information_dish", [
                    "name_platillo" => $_POST["name_platillo"],
                    "description_platillo" => $_POST["description_platillo"],
                    "description_platillo" => $_POST["description_platillo"],
                    "image_platillo" => $img,
                    "price_platillo" => $_POST["price_platillo"],
                    "category_platillo" => $_POST["category_platillo"]  
                ]);
                
            }
        }
        
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dishes</title>
    <link rel="stylesheet" href="../css/themes/admin.css">
</head>
<body>
    <div class="container">
        <h2>Edit Dishes</h2>
        <?php 
            echo $message;
        ?>
              <form method="post" action="add.php" enctype="multipart/form-data">
            <div class="form-items">
                <label for="name_platillo">Name Platillo</label>
                <input id="name_platillo" class="textfield" name="name_platillo" type="text">
            </div>
            <div class="form-items">
    <label for="category_platillo">Category_platillo</label>
    <select id="category_platillo" name="category_platillo" class="textfield">
        <?php
        foreach ($categories1 as $category) {
            $selected = ($_POST["category_platillo"] == $category["id_category"]) ? "selected" : "";
            echo "<option value='" . $category["id_category"] . "' $selected>" . $category["category_name"] . "</option>";
        }
        ?>
    </select>
</div>
            </div>
            <div class="form-items">
                <label for="description_platillo">Description_platillo</label>
                <textarea id="description_platillo" name="description_platillo" id="" cols="30" rows="10"><?php echo $item[0]["description_platillo"]; ?></textarea>
            </div>
            <div class="form-items">
                <label for="image_platillo">Image platillo</label>
                <img id="preview" src="../imgs/<?php echo $item[0]["image_platillo"]; ?>" alt="Preview">
                <input id="image_platillo" type="file" name="image_platillo" onchange="readURL(this)">
            </div>
            <div class="form-items">
                <label for="price_platillo">Destination Price</label>
                <input id="price_platillo" class="textfield" name="price_platillo" type="text" value="<?php echo $item[0]["price_platillo"] ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $item[0]["id_platillo"]; ?>">
            <div class="form-items">
                <input class="submit-btn" type="submit" value="Update Dishes">
            </div>
        </form>
    </div>

    <script>
        function readURL(input) {
            if(input.files && input.files[0]){
                let reader = new FileReader();

                reader.onload = function(e) {
                    let preview = document.getElementById('preview').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        
    </script>
    
</body>
</html>