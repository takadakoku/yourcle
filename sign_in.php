<?php

require_once(__DIR__ . "/admin/config.php");

$sign_in = new Sign_In;
$sign_in->sign_in();


?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="parts/favicon.ico">
<title><?= $title;?></title>
<link rel="stylesheet" href="style/sign_in.css">
<link rel="stylesheet" href="style/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
   <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
  <?php echo get_header();?>
  <div id="content">
    <h1>Sign In</h1>
  <form action="" method="POST">
    <p>学籍番号</p>
    <input type="text" class="box textbox" name="student_num" placeholder="Student Number" value="">
    <p>パスワード</p>
    <input type="password" class="box textbox" name="password" placeholder="PASSWORD" value="">
    <input type="hidden" name="url" class="box" value="<?=$url;?>">
    <input type="submit" id="submit" name="sign" value="SIGN IN" class="button">
  </form>
  <div id="line"></div>
  <h2>まだアカウントをお持ちでないですか？</h2>
  <a href="sign_up.php">新規登録</a>
  </div>
  <?php get_footer(); ?>
</body>
</html>
