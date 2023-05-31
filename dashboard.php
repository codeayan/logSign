<?php
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
  }
  echo "Welcome ".$_SESSION['sendusername'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
     <form method="POST">
        <button type="submit" name="logoutsub">Log out</button>
     </form>
     <?php
       if(isset($_POST['logoutsub'])){
         session_unset();
         session_destroy();

         header("location: login.php");
         exit;
       }
     ?>

<form method="POST">
        <button type="submit" name="destroysub">Delete account permanently</button>
     </form>
     <?php
       if(isset($_POST['destroysub'])){
        require 'partials/_dbcon.php';
        $getusername=$_SESSION['sendusername'];
        $sql="delete from user_details where user_name = '$getusername'";
        $sqlres=mysqli_query($connect, $sql);

        session_unset();
        session_destroy();
        
        header("location: login.php");
        exit;
       }
     ?>
</body>
</html>
