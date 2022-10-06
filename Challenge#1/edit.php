<?php
    include_once('connection.php');

    $id = $_GET['id'];
    $sqlQuery = "SELECT * FROM user WHERE user_id = {$id}";
    $result = $mysqli->query($sqlQuery);
    $row = $result->fetch_array();

    if(!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['gender'])){
        $sqlQuery = "UPDATE user SET 
            name = '{$_POST['name']}',
            email = '{$_POST['email']}',
            gender = '{$_POST['gender']}'
            WHERE user_id = {$id}";
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

<html>
<head>
    <title>Update</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="edit.php?id=<?php echo $id ?>" method="POST">
        Name: <input type='text' name='name' value="<?php echo $row['name'] ?>"><br>
        E-mail: <input type='text' name='email' value="<?php echo $row['email'] ?>"><br>
        <div class='radio-wrapper'>
            Male
            <input type='radio' id='m' name='gender' value='M' <?php echo ($row['gender'] === 'M') ? "checked" : "" ?>>
            Female
            <input type='radio' id='f' name='gender' value='F' <?php echo ($row['gender'] === 'F') ? "checked" : "" ?>>
        </div>
        <input type='submit' value="Update">
    </form>
</body>
</html>