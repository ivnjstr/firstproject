<?php 
    include_once("Connection/connection.php");
    $con = connections();

    if(isset($_POST["submit"])){
        $firstname = $_POST["fname"];
        $lastname = $_POST["lname"];
        $email = $_POST["email"];

        $sql = "INSERT INTO `studentlist`(`first_name`, `last_name`, `email`) VALUES ('$firstname', '$lastname', '$email')";
        $con->query($sql) or die ($con_error);
        echo header("Location: studentList.php");
    }



?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ADD STUDENT</title>
        <link rel="stylesheet" href="CSS/addList.css">
    </head>
    <body>
        
        <form action="" method="post">
            <h1>ADD STUDENT LIST</h1>
            <div class="input_data">
                <input type="text" name="fname" id="fname" required>
                <label>Enter Firstname</label>
            </div>

            <div class="input_data">
                <input type="text" name="lname" id="lname" required>
                <label>Enter Lastname</label>
            </div>

            <div class="input_data">
                <input type="email" name="email" id="email" required>
                <label>Enter Email</label>
            </div>

            <input type="submit" name="submit" value="Submit Form" id="submit">

        </form>
        
    </body>
</html>