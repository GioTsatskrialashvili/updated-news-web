<?php
include 'helpers/db_connection.php';
  
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

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <header>
        <a href="index.php"><span class="logo">LOGO</span></a>
        <div class="user">
            <div>
                <img src="assets/img/user.png" alt="">
            </div>
            <div>
                <span>
                    John Doe
                </span>
                <span>Administrator</span>
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
            <a href="?page=dashboard">Dashboard</a>
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
</body>
</html>