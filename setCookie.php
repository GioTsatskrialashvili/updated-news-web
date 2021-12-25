<?php

    if( isset($_POST['action']) && $_POST['action'] == 'change-mode' ) {
        setcookie('mode', $_POST['value'], time() + 84600);
        echo"ok";
    }

    

?>