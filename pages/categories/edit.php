<?php
    $models= new Category();
    $id = isset($_GET['id']) && $_GET['id'] ? $_GET['id'] : null; 
    
    if($id) {
        // select
        $select_query = "SELECT * FROM categories WHERE id = " . $id;

        $result = mysqli_query($conn, $select_query);
        $category = mysqli_fetch_assoc($result); // []

        if(!$category) {
            die('category not found');
        }
    } else {
        die('invalid id');
    }

    // update
    if(isset($_POST['action']) && $_POST['action'] == 'update') {
        $title = isset($_POST['title']) ? $_POST['title'] : '' ;
        

        if($title) {

            $sql = "UPDATE categories SET title = '$title' WHERE id = ".$id;

            if(mysqli_query($conn, $sql)) {
                header('Location:?page=categories');
            } else {
                echo "Error";
            }
        }
    }

?>

<main>
    <div class="container-header">
        <h2>Categories</h2>
        <a href="?page=categories" class="btn">Back</a>
    </div>
    <div class="content">
        <form action="" method="post">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" value="<?= $category['title'] ?>">
            </div>     
            <div class="form-group">
                <input type="hidden" name="action" value="update">
                <button class="btn submit">Update</button>
            </div>
        </form>
    </div>
</main>