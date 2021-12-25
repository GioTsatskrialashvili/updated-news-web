<?php

  session_start();

include 'helpers/db_connection.php';
include 'helpers/functions.php';
isAdmin();
  if(isset($_GET['page'])&& $_GET['page']){
      $page = $_GET['page'];
  }else{
      $page='dashboard';
  }
  if(isset($_GET['action'])&& $_GET['action']){
    $action = $_GET['action'];
}else{
    $action='index';
}
if( isset($_COOKIE['mode']) && $_COOKIE['mode'] == 'dark' ) {
    $mode = 'light';
    $current_mode = 'dark';
} elseif((isset($_COOKIE['mode']) && $_COOKIE['mode'] == 'light') || !isset($_COOKIE['mode'])) {
    $mode = 'dark';
    $current_mode = 'light';
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body  class="<?= $current_mode ?>">

    <header>
        <a href="index.php"><span class="logo">LOGO</span></a>
        <div class="user">
            <div>
                   
                       
                    <button onclick="changeMode(this)" data-mode="<?= $mode ?>" class="btn" id="mode"><?= ucfirst($mode) ?> Mode</button>
                   
            </div>
            <div>
                <img src="assets/img/user.png" alt="">
            </div>
            <div>
                <span>
                    <?= $_SESSION['user_name']?>
                </span>
                <span><a href="logout.php" class='logout'>Log out</a></span>
            </div>
            <div>
                <button>
                    <img class="arrow" src="assets/img/down-arrow.png" alt="">
                </button>
            </div>
        </div>
    </header>

    <aside>
    <ul>
    <li class='<?= $page == 'dashboard'?'active': ''?>'>
            <a href="?page=dashboard">Subscribe</a>
        </li>
        <li class='<?= $page == 'categories'?'active': ''?>'>
            <a href="?page=categories">Categories</a>
        </li>
       
        <li class='<?= $page == 'news'?'active': ''?>'>
            <a  href="?page=news">News</a>
        </li>
       
    </ul>
    </aside>
   <?php
    include 'pages/'.$page.'/'.$action.'.php';
    
   ?>
    <script src="assets/js/script.js"></script>
</body>
</html>