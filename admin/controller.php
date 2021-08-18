<?php

class DB_connect{
    private $user = 'root';
    private $pass = 'yvlLiz!RGv-RnZDZ';
    
    
    public function db_connect(){
        try {
     
            $dbh = new PDO('mysql:host=127.0.0.1;dbname=marketplace', $this->user, $this->pass);
         
        } catch (PDOException $e) { 
            print "エラー!: " . $e->getMessage() . "<br/gt;";
            die();
        }

        return $dbh;
        
    }
}

class Manager extends DB_connect{

    public $student_num;
    public $password;
        
    public function verify(){
        $dbh = $this->db_connect();
        $data = $dbh->query("SELECT * FROM student WHERE student_num = '$this->student_num' AND  password = '$this->password'");
        $row = $data->fetch(PDO::FETCH_ASSOC);
        if(empty($row)){
            exit();
        }
    }

}




class Search extends Manager{
    public function get_results(){
            
        $dbh = $this->db_connect();
        $value = h($_GET["text"]);
        $sth = $dbh->query("SELECT * FROM items WHERE item_name LIKE '%$value%'");
        $sth = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $sth;      
    
    }
}



class Sign_In extends Manager{

    
    public function sign_in(){
        $dbh = $this->db_connect();
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            if(isset($_POST["sign"])){
            $student_num = strtolower(h($_POST["student_num"]));
            $password = h($_POST["password"]);
            
            $sth = $dbh->query("SELECT * FROM student WHERE student_num = '$student_num' AND  password = '$password';") ;
            
                $row = $sth->fetch(PDO::FETCH_ASSOC);     
                setcookie("student_num", $row["student_num"], time() + 31556926);
                setcookie("student_name", $row["student_name"], time() + 31556926);
                setcookie("user_name", $row["user_name"], time() + 31556926);
                setcookie("password", $row["password"], time() + 31556926);
                setcookie("introduction", $row["introduction"], time() + 31556926);
                setcookie("chat", $row["chat"], time() + 31556926);
                setcookie("icon", $row["icon"], time() + 31556926);
            
                header("Location:mypage.php");
            }
         
        }
         
    }

}


class Item_List extends Manager{
    public function get_item_list(){
        $dbh = $this->db_connect();
        $student_num = $_COOKIE["student_num"];
        $sth = $dbh->query("SELECT * FROM items WHERE seller_num = '$student_num'");
        $items = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $items;
    }

}







class Edit_Item extends Manager{

    public $item_id;

    public function edit(){
    
        $dbh = $this->db_connect();
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            if(isset($_POST["delete"])){
                $item_id = $_POST["item_id"];
                $dbh->query("DELETE FROM items WHERE item_id = '$item_id'");
                header("Location:mypage.php");
            }else{
                $name = $_POST["name"];
                $price = $_POST["price"];
                $desctiption = $_POST["description"];
                $item_id = $_POST["item_id"];

                $dbh->query("UPDATE items SET item_name = '$name', price = '$price', description = '$desctiption' WHERE item_id = '$item_id'");
                header("Location:mypage.php");
            }
        }
    }

    
    public function get_item(){
        $dbh = $this->db_connect();
        $item_id = $_GET["hidden"];
        $get_item = $dbh->query("SELECT * FROM items WHERE item_id = '$item_id';");
        $this->row = $get_item->fetch(PDO::FETCH_ASSOC);
        return $this->row;
    }

}








class Chat_List extends Manager{

    public function get_index(){
        $dbh = $this->db_connect();
        $chats = $dbh->query("SELECT * FROM student WHERE student_num = '$this->student_num';");
        $row = $chats->fetch(PDO::FETCH_ASSOC); 
        $chats = $row["chat"];
        $rooms = explode(", ", $chats);
        return $rooms;
    }

    public function get_list(){
        $dbh = $this->db_connect();
        $rooms = $this->get_index();
        foreach($rooms as $room){
            if($room == 0){
                unset($room);
           }else{
             $sth = $dbh->query("SELECT * FROM items WHERE item_id = '$room';");
             $row = $sth->fetch(PDO::FETCH_ASSOC);
                 $name = $row["item_name"];
                 $name = str_replace(":sold", "", $name);
                 $picture = $row["picture"];
                 echo "<div class='item'>
                 <img src='$picture'>
                 <div class='name'>
                     <a href='chat.php?item_id=$room'>$name</a>
                 </div>
               </div>";
               };
        }
    }
}








class Details extends Manager{

    public function get_item_details(){
        
        $dbh = $this->db_connect();
        
        $id = $_GET['item_id'];
        $_SESSION["id"] = $id;
            
        $sth = $dbh->query("SELECT * FROM items WHERE item_id = '$id'");
        $this->row = $sth->fetch(PDO::FETCH_ASSOC);
        $student_num = $this->row["seller_num"];
        $_SESSION["item_name"] = $this->row["item_name"];
        $seller = $dbh->query("SELECT * FROM student WHERE student_num = '$student_num'");
        $this->student = $seller->fetch(PDO::FETCH_ASSOC);
    }


}


class Chat extends Manager{

    public $room_num;

    public function get_message(){
        $dbh = $this->db_connect();   
        $sth = $dbh->query("SELECT * FROM student WHERE student_num = '$this->student_num'");
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        $_SESSION['sender_name'] = $row["user_name"];
        $_SESSION['icon'] = $row['icon'];
        $rooms = $row["chat"];
      
        if(!strpos($rooms, ", " . $this->room_num)){
          echo "エラーが発生しました。";
          exit();
        }
        
        
        $messengers = $dbh->query("SELECT * FROM student WHERE chat LIKE '%$this->room_num%'");
        foreach($messengers as $messenger){
          if($this->student_num == $messenger['student_num']){
            $this->my_icon = $messenger['icon'];
            $this->my_name = $messenger['user_name'];
          }else{
            $this->his_icon = $messenger['icon'];
            $this->his_name = $messenger['user_name'];
          }
        }
    
        $sth = $dbh->query("SELECT * FROM message WHERE room_num = '$this->room_num'");
        return $sth;
    }

    public function send_message(){
        
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $dbh = $this->db_connect();
            $_SESSION["room_num"] = h($_POST["hidden"]);

            $message = h($_POST["text"]);
            $message = mb_convert_encoding($message, "HTML-ENTITIES");
        
        
            $dbh->query("INSERT INTO message(room_num, message, sender_id, time) VALUES($this->room_num, '$message', '$this->student_num', NOW())");
            echo "hoge";
            $room_num = ", " . $this->room_num;
            $to_mail = $dbh->query("SELECT * FROM student WHERE chat LIKE '%$room_num%'");
            
            foreach($to_mail as $mail){
                if($mail["student_num"] != $this->student_num){
                    $_SESSION["haruka"] = $mail["haruka"];
                }
            }
            
            header("Location:send_mail.php");
        
        }
    }


    
}


class Sell_Item extends Manager{


    public $seller_num;

    private function get_data(){
    
        if(isset($_POST["submit"])){
        
            $this->name = h($_POST["name"]);
            $this->price = h($_POST["price"]);
            $this->desctiption = h($_POST["description"]);
            $this->extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            $this->filename = md5(uniqid(rand(),1)) . "." . $this->extension;
            $this->img_path =  "item_pic_original/" . $this->filename;
            $this->compressed_pic = "item_pic_compressed/" . $this->filename; 
            $this->file_size = $_FILES["img"]["size"];   
    
            $this->name_length = mb_strlen($this->name);
            $this->price_length = mb_strlen($this->price);
            $this->desctiption_length = mb_strlen($this->desctiption);
        }
    }



    public function resister(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
        $dbh = $this->db_connect();
        $this->get_data();
        if(!empty($this->name) && !empty($this->price) && !empty($this->desctiption)){
            if($this->file_size > 10000000){
                echo "<script>alert('写真サイズが大きすぎます');</script>";
            }else{
            if($this->extension == "png" || $this->extension == "jpeg" || $this->extension == "jpg" || $this->extension == "JEPEG" || $this->extension == "JPG" || $this->extension == "HEIC"){
                
                if($this->name_length > 20){
                    echo "<script>alert('商品名は20文字以内です！')</script>";
                }else{
                    if(!is_numeric($this->price)){
                        echo "<script>alert('不正な文字が含まれています！');</script>";
                    }else{
                        if($this->price_length > 1000000000){
                            echo "<script>alert('一億円以上のものは売れませんm(__)m')</script>";
                        }else{
                            if($this->desctiption_length > 500){
                                echo "<script>alert('商品説明は500文字以内です。')</script>";
                            }else{
                                $dbh->query("INSERT INTO items(item_name, price, description, seller_num, picture, picture_compressed) VALUES('$this->name', '$this->price', '$this->desctiption', '$this->seller_num', '$this->img_path', '$this->compressed_pic')");
        
                                move_uploaded_file($_FILES["img"]["tmp_name"], "./item_pic_original/" . $this->filename);
                                
                                 $width = 200;
                                 $height = 200;
                                 $image = new Imagick('item_pic_original/' . $filename);
                                 $width_org = $image->getImageWidth();
                                 $height_org = $image->getImageHeight();
                                 $ratio = $width_org / $height_org;
                                 if ($width / $height > $ratio) {
                                 $width = $height * $ratio;
                                 } else {
                                 $height = $width / $ratio;
                                 }
                                 $image->scaleImage($width, $height);
                                 $image->setCompressionQuality(80);
                                 $image->writeImage('item_pic_compressed/' . $filename);
                                 $image->destroy();
    
                                header("Location:mypage.php", true, 307);
                            }
                        }
                    }
                }
            }else{
                echo "<script>alert('アップロードできないファイル形式です');</script>";
            }
        }
    
        }else{
            echo "<script>alert('正しく入力してください。')</script>";
        }

    }
    }

}


class Profile extends Manager{

    public $target;
    public $user_name;

    
    public function get_data(){
        $dbh = $this->db_connect();
        $sth = $dbh->query("SELECT * FROM student WHERE student_num = '$this->target'");
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        $this->user_name = $row["user_name"];
        $this->introduction = $row["introduction"];
        $this->icon = $row["icon"];


        $items = $dbh->query("SELECT * FROM items WHERE seller_num = '$this->target'");
        return $items;
    }
    


}

class Confirm extends Manager{


    public $id;
    public $item_name;

    public function buy(){
        
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $dbh = $this->db_connect();
        
            $this->item_name .= ":sold";
            $dbh->query("UPDATE items SET item_name = '$this->item_name' WHERE item_id = '$this->id'");
            $seller = $dbh->query("SELECT * FROM student WHERE student_num = '$this->seller_num'");
            $row = $seller->fetch(PDO::FETCH_ASSOC);     
            $_SESSION["haruka"] = $row["haruka"];
            $row["chat"] .=", " . $this->id;
            $new_no = $row["chat"];
            $dbh->query("UPDATE student SET chat = '$new_no' WHERE student_num = '$this->seller_num'");
            
            $buyer = $dbh->query("SELECT * FROM student WHERE student_num = '$this->student_num'");
            $row = $buyer->fetch(PDO::FETCH_ASSOC);
            
            $row["chat"] .=", " . $this->id ;  
            $new_num = $row["chat"];  
            
            $dbh->query("UPDATE student SET chat = '$new_num' WHERE student_num = '$this->student_num'");
    
            $statement = $dbh->query("SELECT * FROM student WHERE student_num = '$this->student_num';") ;
    
                $row = $statement->fetch(PDO::FETCH_ASSOC);     
                $_SESSION["student_num"] = $row["student_num"];
                $_SESSION["student_name"] = $row["student_name"];
                $_SESSION["chat"] = $row["chat"];

            header("Location:send_mail.php");
        }

    }

    public function get_data(){

        $dbh = $this->db_connect();

        $sth = $dbh->query("SELECT * FROM items WHERE item_id = '$this->id'");

        $row = $sth->fetch(PDO::FETCH_ASSOC);
        return $row;
            

    }
}


class MyPage extends Manager{

    public function get_mypage(){
        $dbh = $this->db_connect();
        $info = $dbh->query("SELECT * FROM student WHERE student_num = '$this->student_num'");
        $row = $info->fetch(PDO::FETCH_ASSOC);
        $_COOKIE["student_num"] = $row["student_num"];
        $_COOKIE["student_name"] = $row["student_name"];
        $_COOKIE["user_name"] = $row["user_name"];
        $_COOKIE["introduction"] = $row["introduction"];
        $_COOKIE["chat"] = $row["chat"];
        $_COOKIE["icon"] = $row["icon"];
    }

    
    public function update_mypage(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $dbh = $this->db_connect();
            if(isset($_POST["update"])){
               if(!empty($_FILES["img"]["name"])){
               $extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
                   if($extension == "png" || $extension == "jpeg" || $extension == "jpg" || $extension == "JEPEG" || $extension == "JPG" || $extension == "HEIC"){
                   
                       $filename = md5(uniqid(rand(),1)) . "." . $extension;
                       $img_path =  "photos/" . $filename;
                     
                       move_uploaded_file($_FILES["img"]["tmp_name"], $img_path);
                       
                         $width = 200;
                         $height = 200;
                         $image = new Imagick($img_path);
                         $width_org = $image->getImageWidth();
                         $height_org = $image->getImageHeight();
                         $ratio = $width_org / $height_org;
                         if ($width / $height > $ratio) {
                             $width = $height * $ratio;
                         } else {
                             $height = $width / $ratio;
                         }
                         $image->scaleImage($width, $height);
                         $image->setCompressionQuality(80);
                         $image->writeImage($img_path);
                         $image->destroy();
       
                         $dbh->query("UPDATE student SET icon = '$img_path' WHERE student_num = '$this->student_num'"); 
                   }else{
                       echo "<script>swal('アップロードできないファイル形式です');</script>";
                   }
       
               }
            

                     $user_name = h($_POST["user_name"]);
                     $password = h($_POST["password"]);
                     $introduction = h($_POST["introduction"]);
                     $name_lengtn = mb_strlen($user_name);
                     $password_length = mb_strlen($password);
                     $introduction_length = mb_strlen($introduction);
                     if($password_length > 12){
                       echo "<script>alert('パスワードは12文字以内です。')</script>";  
                     }else{
                       if($introduction_length > 300){
                         echo "<script>alert('自己紹介は300文字以内です')</script>";
                       }else{
                       if($name_lengtn > 16){
                         echo "<script>alert('ユーザーネームは15文字以内です')</script>";
                       }else{
                         $dbh->query("UPDATE student SET user_name = '$user_name', introduction = '$introduction', password = '$password' WHERE student_num = '$this->student_num'");
                       }
                       }
                     }    
            }
        }
    }
}



class Sign_Up extends Manager{
    public function sign_up(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $dbh = $this->db_connect();
            $name = $_POST["user_name"];
            $haruka = $_POST["haruka"];
            $id = mb_substr($haruka,0, 7);
            $password = password(4);
            if(!empty($id) && !empty($name) && !empty($haruka)){      
              $name_leng = mb_strlen($name);
              $id = strtolower($id);
    
              if($name_leng > 15){
                echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>";
                echo "<script>swal('出品が完了しました！！', '','success');</script>";
              }else{
                if(!strpos($haruka, "@haruka.otemon.ac.jp")){
                  echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>"; 
                  echo "<script>swal('出品が完了しました！！', '','success');</script>";
                }else{
                  $_SESSION["password"] = $password; 
                  $_SESSION["haruka"] = $haruka;
                  $_SESSION["name"] = $name;
                  $dbh->query("INSERT INTO student(student_num, user_name, password, chat, haruka, time) VALUES('$id', '$name', '$password', '0', '$haruka', NOW());");
                  header("Location:send_mail.php");
                 }
                }
              }else{
                echo "<script>alert('このメールアドレスはすでに使われています');</script>"; 
                }  
            }
                
        }
    }
// }








?>
