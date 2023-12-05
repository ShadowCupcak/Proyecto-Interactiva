<?php
    require_once '../database.php';
    
    include('simple_html_dom.php');
    /*



    */

    //link
    $link = "https://www.allrecipes.com/recipes/726/world-cuisine/european/spanish/";

    $filenames = [];
    $menu_item_names = [];
    $menu_item_descriptions = [];
    $image_urls = [];

    $menu_items = 36;

    $items = file_get_html($link);

    //save meals info and filenames for the images
    foreach ($items->find('.card--no-image') as $item){
        
        $title = $item->find('.card__title-text');
        
        $details = file_get_html($item->href);
        $description = $details->find('.article-subheading');
        $image = $details->find('.primary-image__image');

        if(count($image) > 0){
            $image_urls[] = $image[0]->src;
        }else{
            $replace_img = $item->find('.universal-image__image');
            if(count($replace_img) > 0){
                $image_urls[] = $replace_img[0]->{'data-src'};
            }
        }
       
        if(count($description) > 0){
            if($menu_items == 0) break;

            $menu_item_names[] = trim($title[0]->plaintext);
            $menu_item_descriptions[] = $description[0]->plaintext;
            
            $filename = strtolower(trim($title[0]->plaintext));
            $filename = str_replace(' ', '-', $filename);
            $filenames[] = $filename;

            $menu_items--;
        }

    }
  
 

    foreach($filenames as $index=>$item){
        echo "******************";
        echo "<br>";
        echo $item;
        echo "<br>";
        echo $menu_item_names[$index];
        echo "<br>";
        echo $menu_item_descriptions[$index];
        echo "<br>";
        echo $image_urls[$index];
        echo "<br>";
        echo rand (1*10, 70*10)/10;
        echo "<br>";
        //$menu_items--;
        //if($menu_items == 0) break;
        
        $database->insert("tb_information_dish",[
        "name_platillo" => $menu_item_names[$index],
        "image_platillo" => $item.'.jpg',
        "category_platillo" => $menu_item_names[$index],
        "estado_platillo" => "0",
        "description_platillo" => $menu_item_descriptions[$index],
        "price_platillo" =>  random_int(1*10, 70*10)/10
 
    ]);

    }
    foreach ($filenames as $index=>$image){
        file_put_contents("imgs/".$image.".jpg", file_get_contents($image_urls[$index]));
    }

    //get and download images
   
   //esta funcion es para cargar las imagenes 
  

    //operacion para insertar
    //insert info
    // Reference: https://medoo.in/api/insert
    /*$database->insert("tb_name",[
        "field"=> value,
        "field"=> value
    ]);
    
*/
?>
