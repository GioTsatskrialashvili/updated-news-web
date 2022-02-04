<?php

class News extends Database{
    public function insertNews($title, $text, $category, $image) {
        $stm = $this->connection->prepare("INSERT INTO news (title, text, category_id, image) 
                                                VALUES (:title, :text, :category_id, :image)");
        $stm->bindParam(':title', $title);
        $stm->bindParam(':text', $text);
        $stm->bindParam(':category_id', $category_id);
        $stm->bindParam(':image', $image);
        return $stm->execute();
    }
}