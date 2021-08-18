<?php

require_once(__DIR__ . "/admin/config.php");

    $item_list = new Item_List;
    $items = $item_list->get_item_list();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title;?></title>
    <link rel="stylesheet" href="style/item_list.css">
   <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> 
   <link rel="shortcut icon" href="parts/favicon.ico">
</head>
<body>
    <?php get_header();?>
    <div id="content">
      <p><b>出品中</b></p>
            <?php foreach($items as $item){
                if(!strpos($item["item_name"], ":sold")){
                    $picture = $item['picture'];
                    $item_id = $item['item_id'];
                    $item_name = $item['item_name'];
                    echo "<div class='item'>
                            <img src='$picture'>
                            <div class='name'>
                                <form action='edit_item.php' action='GET'>
                                    <input type='hidden' name='hidden' value='$item_id'>
                                    <input type='submit' name='submit' value='$item_name'>
                                </form>
                            </div>   
                        </div>";
                }
            }?>
    </div>
    <?php get_footer();?>
</body>
</html>
