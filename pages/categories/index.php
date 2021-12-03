<?php
$sql = "SELECT * FROM categories";
$result = mysqli_query($conn, $sql);
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

if(isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = $_POST['id'];

    $sql = "DELETE FROM categories where id = " .$id;

    if(mysqli_query($conn, $sql)) {
        header('Location:categories.php');
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