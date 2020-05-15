<?php
    include('database.php');
    session_start();
    
    $id = $_POST['id'];
    $_SESSION['id'] = $id;
    echo $id;
    
?>