<?php

require_once(__DIR__ . "/admin/config.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title;?></title>
    <link rel="stylesheet" href="style/index.css">
   <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
   <link rel="shortcut icon" href="parts/favicon.ico">
</head>
<body>
<?php get_header();?>
 <div id="content">
  <div id="img">
    <img src="parts/background.png" height="250px" width="100%">
      <form action='search.php' method='GET'>
        <input type="text" id="box" name="text" placeholder="　Search">
        <input type="image" src="parts/search.png" id="submit" width="20px" value="&#xf002">
      </form>
  </div>
 <h2 class="howto">このアプリの使い方を確認</h2>
 <img class="images" src="parts/how_to.png">
 <div class="questioner">
  <p>お問い合せはこちら</p>
  <a href="https://lin.ee/TqQEI4D"><img src="https://scdn.line-apps.com/n/line_add_friends/btn/ja.png" alt="友だち追加" height="36" border="0"></a>
 </div>
      <img class="images2" src="parts/what_is.png">
      <a href="https://www.notion.so/886a3d4b2d6e4fe08ce0631897d80223"><img class="images3" src="parts/recruit.png"></a>
      <img src="parts/logo.png" id="smalllogo">
      <ul id="sns">
        <li><a href="https://twitter.com/Yourcle1"><i class="fab fa-twitter fa-tw"></i></a></li>
        <li><a href="https://www.instagram.com/yourcle2021/"><i class="fab fa-instagram fa-in"></i></a></li>
        <li><a href="https://lin.ee/TqQEI4D"><i class="fab fa-line fa-line"></i></a></li>
      </ul>
 </div>
  <?php get_footer();?>
</body>
</html>
