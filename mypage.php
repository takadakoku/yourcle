<?php
require_once(__DIR__ . "/admin/config.php");

  $mypage = new MyPage;
  $mypage->student_num = $_COOKIE["student_num"];
  $mypage->password = $_COOKIE["password"];
  $mypage->verify();

    $mypage->update_mypage();
    $mypage->get_mypage();
  
      
    $student_num = $_COOKIE["student_num"];
    $student_name = $_COOKIE["student_name"];
    $user_name = $_COOKIE["user_name"];
    $introduction = $_COOKIE["introduction"];
    $chat = $_COOKIE["chat"];
    $icon = $_COOKIE["icon"]; 
    $password = $_COOKIE["password"]; 
  
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/mypage.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
   <link rel="shortcut icon" href="parts/favicon.ico">
    <title><?= $title;?></title>
</head>
<body>
<?php echo get_header();?>
<div id="content">
    <div id="introduction">
    <form action="" method="POST" enctype="multipart/form-data">
        <div id="set_image">
            <label>画像を選択してください:</label>
            <input type="file" id="file-sample" name="img">
            <img width="40%" src="<?php echo $icon;?>" id="file-preview">
            <input type="hidden" name="hidden_img" value="<?php echo $icon;?>"> 
        </div>
        <p class="name">ユーザーネーム：<input type="text" name="user_name" value="<?php echo $user_name ;?>"></p>
        <p class="pass">パスワード：<input type="password" name="password" value="<?php echo $password;?>"></p>
        <div id="bio">
              <p class="intro">
              BIO
              <textarea name="introduction"><?php echo $introduction;?>
                        </textarea>
              </p>
            </div>
        <input type="submit" name="update" class="button" value="更新する">
     </form>
    </div>
   <p style="color: gray; margin-left: 5px;">menu</p>
    <div id="menu">

          <div class="box">
              <button class="btn" id="sell"><a href="sell_item.php" class="btn btn-custom01">
              <span class="btn-custom01-front">出品</span>
            </a></button> 
            <i class="fas fa-camera"></i>
          </div>
      
          <div class="box">
              <button class="btn" id="contract"><a href="chat_list.php" class="btn btn-custom01">
              <span class="btn-custom01-front">取引中</span>
            </a></button>
            <i class="far fa-handshake"></i>
          </div>

          <div class="box">
              <button class="btn" id="pending"><a href="item_list.php" class="btn btn-custom01">
              <span class="btn-custom01-front">出品中</span>
            </a></button>
            <i class="fas fa-clipboard-list"></i>
          </div>

          <div class="box">
            <button class="btn" id="post"><a href="item_list.php" class="btn btn-custom01">
            <span class="btn-custom01-front">投稿一覧
            </span>
          </a></button>
          <i class="far fa-comment-dots"></i>
        </div>

    </div>
    <div id="contact">
         <h3>お問い合わせ</h3>
         <a href="https://lin.ee/TqQEI4D"><img src="https://scdn.line-apps.com/n/line_add_friends/btn/ja.png" alt="友だち追加" height="36" border="0"></a>
    </div>

    <a href='sign_out.php'><input type="submit" name="logout" class="logout" value="ログアウト"></a>
</div>
<script>
document.getElementById('file-sample').addEventListener('change', function (e) {
   var file = e.target.files[0];
   var blobUrl = window.URL.createObjectURL(file);
   var img = document.getElementById('file-preview');
   img.src = blobUrl;
});
</script>   
<?php 
  if(!empty($_POST["submit"])){
     echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>
<script>swal('出品が完了しました！！', '','success');</script>";
} ;?>
<?php get_footer_mypage();?>
</body>
</html>
