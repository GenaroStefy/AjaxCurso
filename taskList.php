<?php
    include('database.php');
    session_start();

    if(isset($_SESSION['usuario'])){
        $query = "SELECT * FROM tasj";

        $result = mysqli_query($connection, $query);
    
        if(!$result){
            die("Error al traer datos" . mysqli_error($connection));
        }else{
            $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[]= array(
                'name' => $row['name'],
                'description' => $row['descripcion'],
                'id' => $row['id']
            );
        }       
        $jsonstring = json_encode($json);
        echo $jsonstring;  
        }   
    }else{
        echo 0;
        session_destroy();
    }
    
  
?>