<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// 設置した場所のパスを指定する
require('PHPMailer-master/src/PHPMailer.php');
require('PHPMailer-master/src/Exception.php');
require('PHPMailer-master/src/SMTP.php');
require_once(__DIR__ . "/admin/config.php");

// Composerを利用した場合、requireは下記だけでOK
// require('path/to/vendor/autoload.php');

// 続きの処理
// 文字エンコードを指定
mb_language('uni');
mb_internal_encoding('UTF-8');

$referer = $_SERVER['HTTP_REFERER'];
if(preg_match("/chat.php/", $referer)){
  $name = $_COOKIE["user_name"];
  $haruka = $_SESSION["haruka"];
  
// インスタンスを生成（true指定で例外を有効化）
$mail = new PHPMailer(true);

// 文字エンコードを指定
$mail->CharSet = 'utf-8';

try {
  // デバッグ設定
  // $mail->SMTPDebug = 2; // デバッグ出力を有効化（レベルを指定）
  // $mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str<br>";};

  // SMTPサーバの設定
  $mail->isSMTP();                          // SMTPの使用宣言
  $mail->Host       = 'smtp.lolipop.jp';   // SMTPサーバーを指定
  $mail->SMTPAuth   = true;                 // SMTP authenticationを有効化
  $mail->Username   = 'info@yourcle.net';   // SMTPサーバーのユーザ名
  $mail->Password   = 'Y0oo-5-U_j9ZE_U-';           // SMTPサーバーのパスワード
  $mail->SMTPSecure = 'ssl';  // 暗号化を有効（tls or ssl）無効の場合はfalse
  $mail->Port       = 465; // TCPポートを指定（tlsの場合は465や587）

  // 送受信先設定（第二引数は省略可）
  $mail->setFrom('info@yourcle.net', '差出人名'); // 送信者
  $mail->addAddress($haruka, '受信者名');   // 宛先
  $mail->addReplyTo('info@yourcle.net', 'お問い合わせ'); // 返信先
  $mail->addCC($haruka, '受信者名'); // CC宛先
  $mail->Sender = 'info@yourcle.net'; // Return-path
  // 送信内容設定
  $mail->Subject = 'メッセージを受け取りました。'; 
  $mail->Body    = '当アプリをご利用いただきありがとうございます。'
. $name . 'さんよりメッセージが届いています。
メッセージ画面よりご確認ください。
ユアクル運営
------------------------------------------
Home Page：
LINE：@316dydfa
お問い合せは、LINEからお願いいたします。パスワードはです。';


  // 送信
  $mail->send();
unset($_SESSION["haruka"]);
header("Location:$referer");
} catch (Exception $e) {
  // エラーの場合
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}

if(preg_match("/confirm.php/", $referer)){
  $haruka = $_SESSION["haruka"];
  $name = $_COOKIE["user_name"];
  $item_name = $_SESSION['item_name'];
  $mail = new PHPMailer(true);

// 文字エンコードを指定
$mail->CharSet = 'utf-8';

try {
  // デバッグ設定
  // $mail->SMTPDebug = 2; // デバッグ出力を有効化（レベルを指定）
  // $mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str<br>";};

  // SMTPサーバの設定
  $mail->isSMTP();                          // SMTPの使用宣言
  $mail->Host       = 'smtp.lolipop.jp';   // SMTPサーバーを指定
  $mail->SMTPAuth   = true;                 // SMTP authenticationを有効化
  $mail->Username   = 'info@yourcle.net';   // SMTPサーバーのユーザ名
  $mail->Password   = 'Y0oo-5-U_j9ZE_U-';           // SMTPサーバーのパスワード
  $mail->SMTPSecure = 'ssl';  // 暗号化を有効（tls or ssl）無効の場合はfalse
  $mail->Port       = 465; // TCPポートを指定（tlsの場合は465や587）

  // 送受信先設定（第二引数は省略可）
  $mail->setFrom('info@yourcle.net', '差出人名'); // 送信者
  $mail->addAddress($haruka, '受信者名');   // 宛先
  $mail->addReplyTo('info@yourcle.net', 'お問い合わせ'); // 返信先
  $mail->addCC($haruka, '受信者名'); // CC宛先
  $mail->Sender = 'info@yourcle.net'; // Return-path

  // 送信内容設定
  $mail->Subject = '出品した商品が購入されました。'; 
  $mail->Body    = '当アプリをご利用いただきありがとうございます。'
 . $name . 'さんが' . $item_name . 'を購入しました
メッセージ画面よりご確認ください。
ユアクル運営
------------------------------------------
Home Page：
LINE：@316dydfa
お問い合せは、LINEからお願いいたします。パスワードはです。';
unset($_SESSION["haruka"]);
header("Location:index.php");
  // 送信
  $mail->send();

} catch (Exception $e) {
  // エラーの場合
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


}

if(preg_match("/sign_up.php/", $referer)){
  $mail = new PHPMailer(true);
  $password = $_SESSION["password"]; 
  $haruka = $_SESSION["haruka"];
  $name = $_SESSION["name"];

  $mail->CharSet = 'utf-8';
  
  try {
   
    $mail->isSMTP();                          // SMTPの使用宣言
    $mail->Host       = 'smtp.lolipop.jp';   // SMTPサーバーを指定
    $mail->SMTPAuth   = true;                 // SMTP authenticationを有効化
    $mail->Username   = 'info@yourcle.net';   // SMTPサーバーのユーザ名
    $mail->Password   = 'Y0oo-5-U_j9ZE_U-';           // SMTPサーバーのパスワード
    $mail->SMTPSecure = 'ssl';  // 暗号化を有効（tls or ssl）無効の場合はfalse
    $mail->Port       = 465; // TCPポートを指定（tlsの場合は465や587）
  
    // 送受信先設定（第二引数は省略可）
    $mail->setFrom('info@yourcle.net', '差出人名'); // 送信者
    $mail->addAddress($haruka, '受信者名');   // 宛先
    $mail->addReplyTo('info@yourcle.net', 'お問い合わせ'); // 返信先
    $mail->addCC($haruka, '受信者名'); // CC宛先
    $mail->Sender = 'info@yourcle.net'; // Return-path
  
    // 送信内容設定
    $mail->Subject = '初回パスワードのお知らせ'; 
    $mail->Body    = $name . '様
  ユアクルにご登録ありがとうございます。
  
  初回のパスワードをお知らせします。
  Password：' . $password . '　
  以降は、マイページ画面から変更できます。お客様ご自身でパスワードのご変更お願いいたします。
  
  
  ユアクル運営
  ------------------------------------------
  Home Page：
  LINE：@316dydfa
  お問い合せは、LINEからお願いいたします。パスワードは' . $password . 'です。';  
  
    // 送信
    $mail->send();
    header("Location:sign_in.php");
  } catch (Exception $e) {
    // エラーの場合
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }  

}




?>
