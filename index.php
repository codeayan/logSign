<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <div style="display:flex; align-items:center; justify-content:center; height:100vh">
       <div>
         <h1>Sign up.</h1>
         <form method="POST">
            <label for="">Enter your name : </label><br>
            <input type="text" name="getname"><br>

            <label for="">Enter username : </label><br>
            <input type="text" name="getusername"><br>

            <label for="">Enter password : </label><br>
            <input type="password" name="getpass"><br>

            <label for="">Confirm password : </label><br>
            <input type="password" name="conpass"><br><br>

            <button type="submit" name="sub">Sign Up</button>
         </form>

         <?php
           if(isset($_POST['sub'])){
            require 'partials/_dbcon.php';
            $getname=$_POST['getname'];
            $getusername=$_POST['getusername'];
            $getpass=$_POST['getpass'];
            $conpass=$_POST['conpass'];

            $sql="select user_name from user_details where user_name = '$getusername'";
            $sqlres=mysqli_query($connect, $sql);
            $rowcount=mysqli_num_rows($sqlres);

            if($rowcount !=0){
                echo "User name is not available. Try another one";
            }
            if($getpass != $conpass){
                echo "Confirm password properly";
            }
            if(($rowcount ==0) && ($getpass == $conpass)){
                echo "You have successfully signed up.";
                $gotologin = "<a href='login.php'>Log in.</a>";
                echo $gotologin;

                $sql="insert into user_details (full_name, user_name, password) values ('$getname','$getusername','$getpass')";
                $sqlres=mysqli_query($connect, $sql);
            }
           }
         ?>
       </div>
      </div>
</body>
</html>