<?php
require_once(__DIR__ . "/admin/config.php");

$chat = new Chat;
$chat->student_num = $_COOKIE["student_num"];
$chat->password = $_COOKIE["password"];
$chat->verify();

$student_num = $chat->student_num;
$chat->room_num = $_GET["item_id"];
$room_num = $chat->room_num;

$chat->send_message();

$sth = $chat->get_message();
$my_icon = $chat->my_icon;
$his_icon = $chat->his_icon;


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title;?></title>
    <link rel="stylesheet" href="style/chat.css">
   <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
   <link rel="shortcut icon" href="parts/favicon.ico">
</head>
<body>
<?php get_header();?>
<div id="content">
  <div id="chat">
    <?php foreach($sth as $row) : ?>
          <div class="message_box">
    <?php $id = $row['sender_id']; 
     if($id == $_COOKIE['student_num']){
           echo "<p class='name'>$my_name</p>";
           echo "<img src='$my_icon'>";
          }else{
            echo "<p>$his_name</p>";
           echo "<a href='profile.php?student_num=$id'><img src='$his_icon'></a>";
          }
          
    ?> 
          
          <div class="message_part"> 
          <?php
               $message = $row['message'];
               $message = mb_convert_encoding($message, "UTF-8");
             ?>
            <p><?php echo $message;?></p>

    <?php $time = $row['time']; 
          if($id == $_COOKIE['student_num']){
           echo "<span>$time</span>";
          }else{
           echo "<span>$time</span>";
          }
    ?>
         
          </div>
      </div>  
    <?php endforeach ;?>  
    </div>
  <form action="" method="POST">
  <input type="hidden" name="hidden" value="<?= $room_num ;?>">
  <input type="text" id="text" name="text" placeholder="メッセージを入力してください">
  <input type="submit" class="button" id="submit" name="sent" value="送信"> 
  </form>        
</div>
<script>
elem = document.querySelectorAll(".message_box");
var num = elem.length - 1;
elem[num].setAttribute("id", "new");
height = document.documentElement.scrollHeight
scroll(0, height);

</script>
<?php get_footer();?>
</body>
</html>
