<?php



    function h($str){
        return htmlspecialchars($str, ENT_QUOTES|ENT_HTML5, "UTF-8");
    } 

     
   

    

    function get_footer(){
        if(empty($_COOKIE["student_num"])){
          $url = "sign_in.php";
        }else{
          $url = "mypage.php";
        }

        echo " <ul id='nav'>
        <li><a href='index.php'><i class='fas fa-home'></i></a></li>
        <li><a href='search.php'><i class='fas fa-search'></i></a></li>
        <li onclick='prepare()'><a href='#'><i class='far fa-bell'></i></a></li>
        <li><a href='$url'><i class='fas fa-user-circle'></i></a></li>
        </ul>
        <script>function prepare(){
        swal('ただいま準備中ですm(__)m');
        }</script>
        <style type='text/css'>
        *{
        margin:0;
        padding:0;
        }
        
        #nav {
        list-style: none;
        overflow: hidden;
        position: fixed;
        bottom: 0%;
        background-color: white;
        width:100%;
        text-align: center;
        border-top: solid 1px gray;
        z-index: 10;
        }
        
        #nav li {
        width: 25%;
        text-align: center;
        float: left;
        margin-top: 12px;
        }
        #nav i{
        width: 50%;
        height: 42px;
        text-align: center;
        z-index: 10;
        color: #FFAAD8;
        font-size: 26px;
        }
        
        
        #nav li a {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        }";
}


    function get_header(){
      echo "<header>
      <div id='head'>
        <img src='parts/logo.png' id='logo' height='100%'>
      </div>
     </header>
     <style type='text/css'>
     -->
      header{
        border-bottom:solid 1px #9e9f9f;
      }

     #head{
      background-color:white;
      height: 50px;
      width: 100%;
      }
  
      #logo {
        position: relative;
        left: 2%;
        top:5px;
        width: 100px;
        height: 40px;
    }
      #sign_out {
        position: absolute;
        width: 48px;
        height: 48px;
        right: 3%;
    }
      #content{
        margin-bottom: 20%;
      }
        -->
      </style>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>";
      
      
}

function get_footer_mypage(){
    echo "<ul id='nav'>
    <li><a href='index.php'><i class='fas fa-home'></i></a></li>
    <li><a href='search.php'><i class='fas fa-search'></i></a></li>
    <li onclick='prepare()'><a href='#'><i class='far fa-bell'></i></a></li>
    <li><a href='mypage.php'><i class='fas fa-user-circle'></i></a></li>
    </ul>
    <script>function prepare(){
    swal('ただいま準備中ですm(__)m');
    }</script>
    <style type='text/css'>
    *{
    margin:0;
    padding:0;
    }
    
    #nav {
    list-style: none;
    overflow: hidden;
    position: fixed;
    bottom: 0%;
    background-color: white;
    width:100%;
    text-align: center;
    border-top: solid 1px gray;
    z-index: 10;
    height:50px;
    padding-bottom:5px;
    }
    
    #nav li {
    width: 25%;
    text-align: center;
    float: left;
    }
    #nav i{
    width: 50%;
    height: 46px;
    text-align: center;
    z-index: 10;
    color: #FFAAD8;
    font-size: 26px;
    }
    
    
    #nav li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    }";
}

    
   

   $title = "YOURCLE.net";
 
?>
