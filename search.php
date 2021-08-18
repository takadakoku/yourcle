<?php

require_once(__DIR__ . "/admin/config.php");

  $student_num = $_COOKIE["student_num"];
  
  $search = new Search;
  $sth = $search->get_results();
  
 
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/search.css">
   <link rel="shortcut icon" href="parts/favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
   <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title><?= $title;?></title>
</head>
<body>
<?php get_header();?>
 
 <div id="search">    
      <form action="" method="GET">
      <input type="text" id="box" name="text" placeholder="Search">
        <input type="image" src="parts/search.png" id="submit" width="20px" value="&#xf002">
      </form>
      <h2>検索結果</h2>
  </div>
  <div id="content">
   <ul>
      <?php foreach($sth as $row) : ?>
         <?php if(strpos($row["item_name"], ":sold")){
               unset($row);
         }else{
           if($row["seller_num"] != $student_num){
           $item_id = $row["item_id"];
           $picture = $row["picture_compressed"];
           echo "<li><a href='details.php?item_id=$item_id'><img src='$picture'></a></li>"; 
           }
         } ;?>
         
      <?php endforeach ;?>
    </ul>
    
  </div>
   <?php get_footer(); ?>
  
</body>
</html>
