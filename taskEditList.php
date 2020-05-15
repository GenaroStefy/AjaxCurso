<?php
    include('database.php');
    session_start();
    
    $id = $_SESSION['id'];
    $query = "SELECT id, name, descripcion FROM tasj WHERE id = ?";
    $result = mysqli_prepare($connection, $query);
    $ok = mysqli_stmt_bind_param($result,"i",$id);
    $ok = mysqli_stmt_execute($result);
    
    if(!$ok){ 
        die("Query fallando");  
    }else{
        $ok = mysqli_stmt_bind_result($result,$id,$name,$description);
        $json = array();
        while(mysqli_stmt_fetch($result)){
            $json[]= array(
                'name' => $name,
                'description' => $description,
                'id' => $id
            );
            $jsonstring = json_encode($json[0]);
            echo $jsonstring;     
                        
        }  
        mysqli_stmt_close($result);
    }
    
?>