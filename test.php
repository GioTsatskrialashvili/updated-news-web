<?php

// Blog Database
$blog = new PDO("mysql:host=localhost;dbname=news;charset=utf8", 'root', '');
$stm = $blog->query("SELECT * FROM categories");
$stm->execute();
echo "blog categories: ";
// print_r( $stm->fetchAll() );



$stm = $blog->query("SELECT * FROM categories where id = 13");
$stm->execute();
print_r( $stm->fetch() );

// while( $row = $stm->fetch() ) {
//     print_r($row['title']. ' ');
// }

echo '<br><br><br><br>';
echo "news categories: ";

// News Database
$news = new PDO("mysql:host=localhost;dbname=news", 'root', '');
$stm = $news->query("SELECT * FROM categories");
$stm->execute();
while( $row = $stm->fetch() ) {
    print_r($row['title']. ' ');
}

