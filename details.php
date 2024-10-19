<?php 
    if(!isset($_SESSION)){
        session_start();
    }

    include_once("Connection/connection.php");
    $con = connections();

    if(isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator"){
        echo "Welcome, ".$_SESSION['UserLogin']."!";
    }else{
        echo header ("Location: studentList.php");
    }

    $id = $_GET['ID'];
    $sql = "SELECT * FROM studentlist WHERE id = '$id'";
    $user = $con->query($sql) or die ($con_error);
    $row = $user->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DETAILS</title>
    </head>
    <body>
        <h1><?php echo $row["first_name"]; ?> <?php echo $row["last_name"]; ?></h1>
        <h4><?php echo $row["email"]; ?></h4>
        
    </body>
</html>