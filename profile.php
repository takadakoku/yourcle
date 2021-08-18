<?php
require_once(__DIR__ . "/admin/config.php");

$profile = new Profile;
$profile->target = $_GET["student_num"];
$items = $profile->get_data();
$user_name = $profile->user_name;
$icon = $profile->icon;
$introduction = $profile->introduction;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title;?></title>
    <link rel="stylesheet" href="style/profile.css">
   <link rel="shortcut icon" href="parts/favicon.ico">
   <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</head>
<body>
<?php get_header();?>
<div id="content">
<div id="introduction">
  <img src="<?= $icon ;?>" id="img">
  <h1><?= $user_name ;?></h1>
  <div id="self">
  <p><?= $introduction ;?></p>
  </div>
</div>
<div id="items">
    <p style="margin-left:10px;">出品中の商品</p>
    <?php foreach($items as $item) :?>
        <a href="details.php?item_id=<?php echo $item['item_id']; ;?>"><img src="<?php echo $item['picture'];?>"></a>
    <?php endforeach ;?>
</div>

</div>
<?php get_footer();?>
</body>
</html>
