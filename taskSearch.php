<?php
    include('database.php');

    $search = $_POST['search']; //VARIABLE QUE ENVIA DATA en el metodo de AJAX desde app.js

    if(!empty($search)){
        $query = "SELECT * FROM tasj WHERE name LIKE '$search%'";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die('Query error' . mysqli_error($connection));
        }

        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'name' => $row['name'],
                'description' => $row['descripcion'],
                'id' => $row['id']
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
?>