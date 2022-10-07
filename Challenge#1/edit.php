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
    }
?>

<html>
<head>
    <title>Update</title>
    <style>
        <?php include "style.css" ?>
    </style>
</head>
<body>
    <form action="edit.php?id=<?php echo $id ?>" method="POST">
        <div class="title">Update User</div>
        <div class="input-field">
            <p>Name</p>
            <input type='text' name='name' value="<?php echo $row['name'] ?>">
        </div>
        <div class="input-field">
            <p>Email</p>
            <input type='text' name='email' value="<?php echo $row['email'] ?>">
        </div>
        <div class="input-field">
            <p>Gender</p>
            <div class='radio-wrapper'>
                <label for="m">Male</label>
                <input type='radio' id='m' name='gender' value='M' <?php echo ($row['gender'] === 'M') ? "checked" : "" ?>>
                <label for="f">Female</label>
                <input type='radio' id='f' name='gender' value='F' <?php echo ($row['gender'] === 'F') ? "checked" : "" ?>>
            </div>
        </div>
        <input type='submit' value="Update">
    </form>
</body>
</html>