<?php
$models= new Category();
    // insert
    if(isset($_POST['action']) && $_POST['action'] == 'insert') {
        $title = isset($_POST['title']) ? $_POST['title'] : '' ;
     

        if($title) {

            $sql = "INSERT INTO `categories`(`title`) VALUES ('$title')";

            if($model->insertCategory($sql)) {
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
                <input type="text" name="title">
            </div>
            <div class="form-group">
                <input type="hidden" name="action" value="insert">
                <button class="btn submit">Add</button>
            </div>
        </form>
    </div>
</main>