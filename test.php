<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>multi-user role-based-login-system</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="margin: 50px;">
    <h1>List of Logins</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>role</th>
                <th>username</th>
                <th>password</th>
                <th>name</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sname = "localhost";
        $uname = "root";
        $password = "";
        $db_name = "my_db";
        
        $conn = mysqli_connect($sname, $uname, $password, $db_name);
        
        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if (!$result){
            die("Invalid query:" . $conn->error);
        }

        while($row = $result->fetch_assoc()){
            echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["role"] . "</td>
                <td>" . $row["username"] . "</td>
                <td>" . $row["password"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='update'>Update</a>
                    <a class='btn btn-danger btn-sm' href='delete'>Delete</a>
                </td>
            </tr>"; 
        }

         ?>

        </tbody>
    </table>
</body>
</html>