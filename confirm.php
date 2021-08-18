<?php

require_once(__DIR__ . "/admin/config.php");
     
$confirm = new Confirm;
$confirm->student_num = $_COOKIE["student_num"];
$confirm->password = $_COOKIE["password"];
$confirm->verify();

$confirm->id = $_SESSION["id"];
$confirm->item_name = $_SESSION["item_name"];
$confirm->buy();
$row = $confirm->get_data();
   


$picture = $row["picture"];
$item_name = $row["item_name"];
$price = $row['price'];   
$seller_num = $row["seller_num"];


    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title><?= $title;?></title>
    <link rel="stylesheet" href="style/confirm.css">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <?php get_header();?>
    <div id="content">
    <div class="main">
        
            <img src="<?= $picture; ?>" width="20%"></a>
            <h2 class="name"><?= $item_name ;?></h2>
            
        </div>

        <div class="detail">
            
        
        
    </div>
    <div class="sumwhraper">
        <h2 style="color:red">合計<?= number_format($price);?>円</h2>
        <form action="" method="POST">
        <button type="submit" class="button" name="" action="index.php" autofocus　class="button">
            購入する
        </button>
        </form>
    </div>
    </div>
    <?php get_footer(); ?>
</body>
</html>
