<?php 
    if(!isset($_SESSION)){
        session_start();
    }

    include_once("Connection/connection.php");
    $con = connections();

    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM useradmin WHERE username = '$username' AND password = '$password'";
        $user = $con->query($sql) or die ($con_error);
        $row = $user->fetch_assoc();
        $table = $user->num_rows;

        if($table > 0){
            $_SESSION['UserLogin'] = $row["username"];
            $_SESSION['Access'] = $row["access"];
            echo header("Location: studentList.php");
        }else{
            echo "No user Found! Contact administrator";
        }
    }



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LOGIN</title>
        <link rel="stylesheet" href="CSS/login.css">
    </head>
    <body>
    <form action="" method="post">
            <h1>LOGIN PAGE</h1>
            <div class="input_data">
                <input type="text" name="username" id="username" required>
                <label>Username</label>
            </div>

            <div class="input_data">
                <input type="password" name="password" id="password" required>
                <label>Password</label>
            </div>

            <input type="submit" name="login" value="Login" id="login">

        </form>
        
    </body>
</html>