<?php
$model= new Category();

// $sql = "SELECT * FROM categories";
// $result = mysqli_query($conn, $sql);
$categories = $model->getAll("SELECT * FROM categories ORDER BY id DESC");

if(isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = isset($_POST['id'])?$_POST['id']:null;
if($id){
    $sql = "DELETE FROM categories where id = " .$id;
}
    if($model->queryExecute($sql)) {
        header('Location:?page=categories');
    } else {
        echo "Error";
    }
}
?>

<main>
    <div class="container-header">
        <h2>Categories</h2>
        <a href="<?='?' .$_SERVER['QUERY_STRING'] . '&action=add'?>" class="btn">Add New</a>
    </div>
    <div class="content">
        <table>
            <tr>
                <th>Id</th>
                <th>Title</th>
                
                
            </tr>
            <?php foreach($categories as $value): ?>
                <tr>
                    <td><?= $value['id'] ?></td>
                    <td><?= $value['title'] ?></td>
                  
                    <td class="actions">
                        <a class="edit" href="<?='?' .$_SERVER['QUERY_STRING'] . '&action=edit&id='.$value['id']?>">Edit</a>
                        <form action="" method="post">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?= $value['id'] ?>">
                            <button class="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
    </div>
</main>