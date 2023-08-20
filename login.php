<?php
//error_reporting(0);
//login part

$host="localhost";
$user="root";
$password="";
$db="food";


$con=mysqli_connect($host,$user,$password,$db);


if(isset($_POST['username'])){
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="select * from loginn where email='".$uname."'AND password='".$password."' limit 1";
    
    $result=mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result)==1)
    {
        echo "<script> window.location.assign('main.php'); </script>";
        exit();
        
    }
    
    else
    {
         echo "<script> window.location.assign('errorlogin.php'); </script>";
        exit();
        
    }
    
}
?>
<html>
<head>
    <link rel="stylesheet" href="login.css">
 <title> Login Form in HTML5 and CSS3</title>
 <link rel="stylesheet" a href="css\style.css">
 <link rel="stylesheet" a href="css\font-awesome.min.css">
</head>
<body>
 <div class="container">
 <img src="image/login.png"/>
 <form>
 <div class="form-input">
 <input type="text" name="username" placeholder="Enter the User Name"/> 
 </div>
 <div class="form-input">
 <input type="password" name="password" placeholder="password"/>
 </div>
 <input type="submit" type="submit" value="LOGIN" class="btn-login"/>
 </form>
 </div>
</body>
</html>