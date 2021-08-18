<?php

require_once(__DIR__ . "/admin/config.php");

$chat_list = new Chat_List;
$chat_list->student_num = $_COOKIE["student_num"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title;?></title>
    <link rel="stylesheet" href="style/chat_list.css">
   <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
    <?php get_header();?>
    <div id="content">
      <p><b>取引中</b></p>
         <?php $chat_list->get_list();?>
    </div>
    <?php get_footer();?>
</body>
</html>
