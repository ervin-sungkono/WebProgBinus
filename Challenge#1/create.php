<?php
    include_once('connection.php');

    if(!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['gender'])){
        $sqlQuery = "INSERT INTO user VALUES(NULL,'{$_POST['name']}','{$_POST['email']}','{$_POST['gender']}')";
        if($mysqli->query($sqlQuery)){
            header('Location: index.php');
            exit();
        }if($mysqli->errno){
            throw new Exception($mysqli->error);
        }
    }else{
        echo('Please fill in all the fields');
    }
?>