<?php

    include 'helpers/db_connection.php';

    if(isset($_POST['action']) && $_POST['action'] == 'subscribe') {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $phonenumber = $_POST['phonenumber'];
    
        $query = "INSERT INTO subscription (name, email, phonenumber) VALUES ('$name','$email','$phonenumber')";

        $result = query($query);

    }