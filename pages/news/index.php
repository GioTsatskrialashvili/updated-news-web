<?php


$limit=5;
$orderBy=' ORDER BY news.id desc';
if(isset($_GET['sort']) && $_GET['sort']){
    $sort=explode('-',$_GET['sort']);
    if($sort[0]=='id'){
        $orderBy='order by news.id';
    }elseif($sort[0]=='title'){
        $orderBy='ORDER by news.title';
    }
    $orderBy .=' ' . $sort[1];
    
}
$n='';
if(isset($_GET['p']) && $_GET['p']&& $_GET['p']>1){
    
    $n= ' OFFSET ' . ($_GET['p']-1) * $limit;
    
}

//count news
$sql = "SELECT COUNT(*) as cnt From news";
$result = mysqli_query($conn, $sql);
$count = mysqli_fetch_assoc($result);
$newsnumber=ceil($count['cnt'] / $limit);


if(isset($_GET['search']) && $_GET['search']){
    $search = isset($_GET['search']) && $_GET['search'] ? $_GET['search'] : null; 
    $sql = "SELECT news.id as news_id, news.title as news_title, news.text, news.category_id, categories.id as cat_id, categories.title as category_title 
FROM news 
 INNER JOIN categories ON news.category_id = categories.id where news.title || news.text like'%$search%'".$orderBy .' '.'LIMIT '.$limit .' '. $n;

$result = mysqli_query($conn, $sql);

$news = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
else{
    $sql = "SELECT news.id as news_id, news.title as news_title, news.text, news.category_id, categories.id as cat_id, categories.title as category_title 
FROM news 
 LEFT JOIN categories ON news.category_id = categories.id ".$orderBy .' LIMIT '.$limit .' '. $n;

$news = getAll($sql);
}






if(isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = $_POST['id'];

    $sql = "DELETE FROM news where id = " .$id;

    if(mysqli_query($conn, $sql)) {
        header('Location:?page=news');
    } else {
        echo "Error";
    }
}
?>

<main>
    <div class="container-header">
        <h2>News</h2>
        <a href="<?='?' .$_SERVER['QUERY_STRING'] . '&action=add'?>" class="btn">Add New</a>
    </div>
    <form action="" class='search-bar'>
        <input type="text" name='search' placeholder='search for text'>
        <button>Search</button>
    </form>
    <form action="" class='sort'>
            <select name="sort" id="">
                <option value="id-desc">Date desc </option>
                <option value="id-asc" <?= isset($_GET['sort']) && $_GET['sort']== 'id-asc'?'selected': ''?>>Date asc </option>
                <option value="title-asc"<?= isset($_GET['sort']) && $_GET['sort']== 'title-asc'?'selected': ''?>>Title asc </option>
                <option value="title-desc"<?= isset($_GET['sort']) && $_GET['sort']== 'title-desc'?'selected': ''?>>Title desc </option>
            </select>
            <button class='btn'>Sort</button>
        </form>
    
    <div class="content">
       
        <table>
            <tr><th>ID</th>
                <th>Title</th>
                <th>Text</th>
                <th>Category</th>
                
            </tr>
            <?php foreach($news as $value): ?>
                <tr>
                <td><?= $value['news_id'] ?></td>
                    <td><?= substr($value['news_title'],0,120)."..."; ?></td>
                    <td class='text'><?=substr( $value['text'],0,100). " ..."; ?></td>
                    <td><?= $value['category_title'] ?></td>
                   
                    <td class="actions">
                        <a class="edit" href="<?='?' .$_SERVER['QUERY_STRING'] . '&action=edit&id='.$value['news_id']?>">Edit</a>
                        <form action="" method="post">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?= $value['news_id'] ?>">
                            <button class="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
    </div>
    <div class="paging">
        <?php
        for($i=1; $i<=$newsnumber;$i++){?>
        <a href=" <?='?'.$_SERVER['QUERY_STRING'] ?>&p=<?=$i ?>"class='btn'><?=$i?></a>
        <?php
        }
        ?>
    </div>
</main>