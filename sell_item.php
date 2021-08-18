<?php 

    require_once(__DIR__ . "/admin/config.php");
 
    $sell_item = new Sell_Item;
    $sell_item->seller_num = $_COOKIE["student_num"];
    $sell_item->resister();

    

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="style/sell_item.css">
    <link rel="stylesheet" href="style/style.css">
   <link rel="shortcut icon" href="parts/favicon.ico">
    <title><?= $title;?></title>
</head>
<body>
<?php get_header();?>
<div id="content">
    <form action="" method="POST" enctype="multipart/form-data">
        <div id="set_image">
            <label>画像を選択してください:</label>
            <input type="file" id="file-sample" name="img">
            <img width="40%" id="file-preview">
        </div>
<script>document.getElementById('file-sample').addEventListener('change', function (e) {
   
    var file = e.target.files[0];
    var blobUrl = window.URL.createObjectURL(file);
    var img = document.getElementById('file-preview');
    img.src = blobUrl;
});
</script>
        <div id="set_name">
          <p>商品名前</p>
          <input type="text" name="name" value="">
        </div>


        <div id="set_price">
            <p>販売価格</p>
            <input type="number" name="price" value="">
        </div>
        
        
        
        <div id="description">
             <textarea name="description" placeholder="商品説明（500文字以内）"></textarea>
        </div>
       
        <div id="submit">
             <input type="submit" name="submit" class="button" value="出品する">
        </div>   
    </form> 
    </div>
    <?php

;?>
    <?php get_footer(); ?>
</html>
</body>
