<?php
    include_once('connection.php');

    $id = $_GET['id'];
    $sqlQuery = "DELETE FROM user WHERE user_id = {$id}";
    if($mysqli->query($sqlQuery)){
        header('Location: index.php');
        exit();
    }if($mysqli->errno){
        throw new Exception($mysqli->error);
    }
?>