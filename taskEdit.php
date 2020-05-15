<?php
    include('database.php');
    
    session_start();
    
    //$id = $_POST['id'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $query = "UPDATE tasj SET name = ?, descripcion = ? WHERE id = ?";
    $result = mysqli_prepare($connection, $query);
    $ok = mysqli_stmt_bind_param($result,"ssi",$name,$description, $id);
    $ok = mysqli_stmt_execute($result);

    if(!$ok){
        die("Query fallando...");
    }else{
        echo "Tarea actualizada correctamente...";        
    }
?>