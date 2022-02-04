<?php

class Category extends Database{
    public function insertCategory($title) {
        $stm = $this->connection->prepare("INSERT INTO categories (title) VALUES (:title)");
        $stm->bindParam(':title', $title);
        return $stm->execute();
    }
}