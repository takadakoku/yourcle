<?php

require_once(__DIR__ . "/admin/config.php");

     $details = new Details;
     $details->get_item_details();
      
     $row = $details->row;
     $student = $details->student;
     

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        echo "<script>location.href='confirm.php';</script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title;?></title>
    <link rel="stylesheet" href="style/detail.css">
    <link rel="stylesheet" href="style/style.css">
   <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
  <?php get_header();?>
    <div id="content">
    <div id="main">
        <img src="<?= $row['picture'] ;?>" width="20%"></a>
    </div>
    <div class="detail">
      <div id="wrap">
        <h2 class="name"><?= $row["item_name"] ;?></h2>
        <h4 style="color:red;"><?=number_format($row['price']);?>円</h4>
        <p><?= $row["description"] ;?></p>   
       <?php echo $_SESSION["$id"] ;?>
      </div>
    </div>
    <div id="seller">
    <p>出品者</p>
        <div id="icon">
            <a href="profile.php?student_num=<?php echo $student["student_num"];?>"><img src="<?php echo $student['icon'];?>" width="20%"></a>
            <h3><?php echo $student["user_name"];?></h3>
        </div>
    </div>
    
    <form action="" name="a_form" method="POST">
        <input type="submit" class="button" name="a_form" value="購入する">
    </form>
    </div>
  <?php get_footer(); ?>
</body>
</html>
