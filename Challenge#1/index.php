<?php
    include_once('connection.php');

    $sqlQuery = "CREATE TABLE IF NOT EXISTS user(".
        "user_id INT NOT NULL AUTO_INCREMENT,".
        "name VARCHAR(100) NOT NULL,".
        "email VARCHAR(40) NOT NULL,".
        "gender CHAR(1) NOT NULL,".
        "PRIMARY KEY (user_id));";
    $mysqli->query($sqlQuery);
    if ($mysqli->errno) {
        echo $mysqli->error;
    }
?>

<html>
<head>
    <title>Challenge#1</title>
    <style>
        <?php include "style.css" ?>
    </style>
</head>
<body>
    <form action="create.php" method="POST">
        <div class="title">Add New User</div>
        <div class="input-field">
            <p>Name</p>
            <input type="text" name="name">
        </div>
        <div class="input-field">
            <p>Email</p>
            <input type="text" name="email">
        </div>
        <div class="input-field">
            <p>Gender</p>
            <div class="radio-wrapper">
                <label for="m">Male</label>
                <input type="radio" id="m" name="gender" value="M">
                <label for="f">Female</label>
                <input type="radio" id="f" name="gender" value="F">
            </div>
        </div>
        <input type="submit" value="Create">
    </form>
    <table>
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
            $sqlQuery = "SELECT * FROM user";
            $result = $mysqli->query($sqlQuery);
            while($row = $result->fetch_array()){
                echo "<tr>
                    <td>{$row['user_id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['gender']}</td>
                    <td><a href='edit.php?id={$row['user_id']}' class='edit-btn'>Edit</a></td>
                    <td><a href='delete.php?id={$row['user_id']}' class='delete-btn'>Delete</a></td>
                </tr>";
            }
        ?>
    </table>
</body>
</html>