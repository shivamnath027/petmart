<?php
session_start();
$host="localhost";
$user="root";
$password="";
$db="petmart";
$con=mysqli_connect($host,$user,$password,$db);
if(isset($_POST['username'])){
    $uname=$_POST['username'];
    $password=$_POST['password'];
    $sql="select * from login where email='".$uname."'AND password='".$password."' limit 1";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)==1)
    {    $_SESSION["username"] = $uname;
        $query1=mysqli_query($con,"select fname,lname,mobile,dob,email,gender,address from login where email='".$_SESSION["username"]."' ");
    {
        $row=mysqli_fetch_assoc($query1);
        $_SESSION["fname"] = $row["fname"];
        $_SESSION["lname"] = $row["lname"];
        $_SESSION["mobile"] = $row["mobile"];
        $_SESSION["dob"] = $row["dob"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["gender"] = $row["gender"];
        $_SESSION["address"] = $row["address"];
    }
     echo "<script> window.location.assign('main.php'); </script>";
        exit();
}
    else
    {    echo "<script>
         alert('INVALID CREDENTIALS');
         window.location.assign('log.php'); 
         </script>";
        exit();
    }
}
?>

<html>
    <title>LOGIN PAGE</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
 <style>
     body {
         background-image: url(DOGIMG/sel1.jpg);
         background-repeat: no-repeat;
         background-size: cover;
             
          }
     .login {
         margin-top: 80px;
     }
     .login .card {
         background: rgba(1,1,1,0.3);
         border-radius: 5px 5px 5px 5px;
         
     }
     .login label{
         font-size: 16px;
         color: black;
     }
     .login input {
         font-size: 20px !important;
         color: burlywood;
     }
     .login button:hover{
         padding: 0px 40px;
     }
     .login button1:hover{
         padding: 0px 30px;
     }
     .x {
         padding-left: 15%;
         padding-top: 3%;
     }
</style>
<body>
  <form action="#" method="POST">
    <div class="row login">
        <div class="col s12 l4 offset-l4">
             <div class="card white darken-1">
        <div class="card">
            <div class="card opacity">
            <div class="card-action transparent lighten-1black-text center-align"><h4>LOGIN TO PET MART!</h4></div> 
            <div class="card-content">
            <div class="form-field">
                <label class="white-text" for="email"><i class="material-icons left">email</i> Email</label>
                <input type="text" id="username" name="username">
                </div>  <br>
                 <div class="form-field">
                <label class="white-text" for="password"><i class="material-icons left">vpn_key</i> Password</label>
                <input type="password" id="password" name="password">
                </div>   <br>               
                <div class="form-field center-align">
                <button class="btn-large red darken-2 waves-effect waves-dark">Login</button>
                </div>
                <p class="center-align white-text">New User? Click here to register</p>
                <p class="center-align">  <a href="reg.php"><button1 class="btn-small INDIGO darken-2 waves-effect waves-dark"><i class="material-icons left">person_add</i> REGISTER</button1></a></p>
                <p class="white-text x"> Login as admin?  <a href="admin.php">Click here</a></p>
            </div>
        </div>
        </div>
      </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.materialboxed').materialbox();
    });
  </script>
    </body>  
</html>