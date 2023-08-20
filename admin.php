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
    $sql="select * from admintable where uname='".$uname."'AND password='".$password."' limit 1";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)==1)
    {    $_SESSION["uname1"] = $uname;
        $query1=mysqli_query($con,"select uname,rest_addr,phone from admintable where uname='".$_SESSION["uname1"]."' ");
    {
        $row=mysqli_fetch_assoc($query1);
        $_SESSION["uname"] = $row["unmae"];
        $_SESSION["rest_addr"] = $row["rest_addr"];
        $_SESSION["phone"] = $row["phone"];
    }
     echo "<script> window.location.assign('admin_main.php'); </script>";
        exit();
}
    else
    {    echo "<script>
         alert('INVALID CREDENTIALS');
         window.location.assign('admin.php'); 
         </script>";
        exit();
    }
}
?>

<html>
    <title>MANAGER LOGIN</title>
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
         background-image: url(DOGIMG/admin.jpeg);
         background-size: cover;
          }
     .login {
         margin-top: 80px;
     }
     .login .card {
         background: rgba(0,0,0,.6);
     }
     .login label{
         font-size: 16px;
         color: black;
     }
     .login input {
         font-size: 20px !important;
         color: black;
     }
     .login button:hover{
         padding: 0px 40px;
     }
     .login button1:hover{
         padding: 0px 30px;
     }
     .x {
       padding-left: 27%;  
        padding-top: 2%;
     }
    </style>
    <body><form action="#" method="POST">
    <div class="row login">
        <div class="col s12 l4 offset-l4">
        <div class="card">
            <div class="card-action transparent lighten-2 black-text center-align">
                <h4 class="white-text" >LOGIN AS ADMIN</h4>
            </div> 
            <div class="card-content">
            <div class="form-field">            
                <label class="white-text" for="uname"><i class="material-icons left">mail</i>Username</label>
                <input class="white-text" type="text" id="username" name="username">
                </div><br>
                 <div class="form-field">
                <label class="white-text" for="password"><i class="material-icons left">vpn_key</i> Password</label>
                <input class="white-text" type="password" id="password" name="password">
                </div><br> 
                <div class="form-field center-align">
                <button class="btn-large red darken-2 waves-effect waves-dark">Login</button>
                </div>
                <p class="white-text x"> Login as user?  <a href="log.php">Click here</a></p>
            </div>
            </div>
        </div>
        </div></form>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.sidenav').sidenav();
      $('.materialboxed').materialbox();
      $('.datepicker').datepicker();
    });
  </script>
    </body>  
</html>