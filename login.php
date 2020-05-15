<?php
    include('database.php');
    session_start();

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";

    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0){
        echo 1;
        $user = $_SESSION['usuario'] = $usuario;
    }else{
        echo 0;
        session_destroy();
    }
?>