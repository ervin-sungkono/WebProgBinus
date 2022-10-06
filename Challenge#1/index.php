<?php
    include_once('connection.php');

    $sqlQuery = "CREATE TABLE IF NOT EXISTS user(".
        "user_id INT NOT NULL AUTO_INCREMENT,".
        "name VARCHAR(100) NOT NULL,".
        "email VARCHAR(40) NOT NULL,".
        "gender CHAR(1) NOT NULL,".
        "PRIMARY KEY (user_id));";
    if ($mysqli->errno) {
        echo $mysqli->error;
    }
?>

<html>
<head>
    <title>Challenge#1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="create.php" method="POST">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <div class="radio-wrapper">
            Male
            <input type="radio" id="m" name="gender" value="M">
            Female
            <input type="radio" id="f" name="gender" value="F">
        </div>
        <input type="submit" value="Create">
    </form>
    <table>
        <tr>
            <th>ID</th>
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
                    <td><a href='edit.php?id={$row['user_id']}'>Edit</a></td>
                    <td><a href='delete.php?id={$row['user_id']}'>Delete</a></td>
                </tr>";
            }
        ?>
    </table>
</body>
</html>