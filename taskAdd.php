<?php
    include('database.php');

    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $description = $_POST['description'];

        $query = "INSERT INTO tasj (name,descripcion) VALUES (?,?)";
        $result = mysqli_prepare($connection, $query);
        $ok = mysqli_stmt_bind_param($result,"ss", $name, $description);
        $ok = mysqli_stmt_execute($result);

        if(!$ok){
            die('Query fallido');
        }else{            
            echo 'Tarea agregada...';
        }
    }


    /* Sin consulta preparada
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $description = $_POST['description'];

        $query = "INSERT INTO tasj (name,descripcion) VALUES ('$name','$description')";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die('Query fallido');
        }else{
        echo 'Tarea agregada...';
        }
    }*/
?> 