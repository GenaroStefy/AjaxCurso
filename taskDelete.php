<?php
    include('database.php');

    if(isset($_POST['id'])){
        $id = $_POST['id'];

        $query = "DELETE FROM tasj WHERE id = ?";
        $result = mysqli_prepare($connection, $query);
        $ok = mysqli_stmt_bind_param($result,"i",$id);
        $ok = mysqli_stmt_execute($result);
        
        if(!$ok){
            die('Query fallido');
        }else{
            echo "Tarea eliminada";
        }
    }


    /*Sin consultas preparadas
     if(isset($_POST['id'])){
        $id = $_POST['id'];

        $query = "DELETE FROM tasj WHERE id = $id";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die('Query fallido');
        }else{
            echo "Tarea eliminada";
        }
    }
    */


?>