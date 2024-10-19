<?php 
    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_SESSION['UserLogin'])){
        echo "Welcome, ".$_SESSION['UserLogin']."!";
    }  else{
        echo "Welcome, Guest!";
    }

    


    include_once("Connection/connection.php");
    $con = connections();
    
    $sql = "SELECT * FROM `studentlist`";
    $user = $con->query($sql) or die ($con_error);
    $row = $user->fetch_assoc();

    // do{
    //     echo $row["first_name"]." ".$row["last_name"]."<br/>";
    // }while($row = $user->fetch_assoc());
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>STUDENT LIST</title>
        <link rel="stylesheet" href="CSS/studentList.css">
    </head>
    <body>
        <h1>STUDENT LIST</h1>
        <br/>
        <?php if(isset($_SESSION['UserLogin'])){ ?>
            <a href="logout.php">Logout</a>
        <?php }  else{ ?>
            <a href="login.php">Login</a>
        <?php }?>
        <a href="addList.php">Add Student List</a>
        <table>
            <thead>
                <tr>   
                    <th>Details</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                </tr>
            </thead>
            <tbody>
                <?php do{ ?>
                <tr>
                    <td><a href="details.php?ID=<?php echo $row["id"];?>">view</a></td>
                    <td><?php echo $row["first_name"]; ?></td>
                    <td><?php echo $row["last_name"]; ?></td>
                </tr>
                <?php }while($row = $user->fetch_assoc()); ?>
            </tbody>
        </table>
    </body>
</html>