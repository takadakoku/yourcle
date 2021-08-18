<?php

require_once(__DIR__ . "/admin/config.php");

$url = $_SERVER['HTTP_REFERER'];

      setcookie("student_num", $row["student_num"], time()-60);
      setcookie("student_name", $row["student_name"], time()-60);
      setcookie("user_name", $row["user_name"], time()-60);
      setcookie("password", $row["password"], time()-60);
      setcookie("introduction", $row["introduction"], time()-60);
      setcookie("chat", $row["chat"], time()-60);
      setcookie("icon", $row["icon"], time()-60);


header("Location:index.php");


?>
