<?php 

require_once(__DIR__ . "/admin/config.php");

    $edit_item = new Edit_Item;
    $edit_item->item_id = $_GET["hidden"];
    $item_id = $edit_item->item_id;
    $edit_item->edit();
    $row = $edit_item->get_item();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="style/edit_item.css">
   <link rel="shortcut icon" href="parts/favicon.ico">
    <title><?= $title;?></title>
</head>
<body>
<?php echo get_header();?>
<div id="content">
   <form action="" method="POST">
       <input type="hidden" name="item_id" value="<?php echo $item_id ;?>">
       <input type="submit" name="delete" value="削除する">
   </form>
    <form action="" method="POST" enctype="multipart/form-data">
        <div id="set_image">
            <img src="<?php echo $row['picture'] ;?>" width="40%" id="file-preview">
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
          <input type="text" name="name" value="<?php echo $row['item_name'];?>">
        </div>
        <div id="set_price">
            <p>販売価格</p>
            <input type="text" name="price" value="<?php echo $row['price'];?>">
        </div>
        <div id="description">
             <textarea name="description" placeholder="商品説明"><?php echo $row['description'];?></textarea>
        </div>
       
        <div id="submit">
             <input type="submit" name="submit" value="更新する">
        </div>   
            <input type="hidden" name="item_id" value="<?php echo $item_id;?>">
    </form> 
    </div>
    <?php get_footer(); ?>
</body>
</html>
