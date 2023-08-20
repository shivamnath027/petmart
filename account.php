<!DOCTYPE html>
<?php
session_start();
    $host="localhost";
    $user="root";
    $password="";
    $db="petmart";
    $con=mysqli_connect($host,$user,$password,$db);
    if(isset($_GET['btn_delete'])){
        $sql1 = mysqli_query($con,"DELETE FROM login WHERE email='".$_SESSION["email"]."' ");
   //INVOKES THE TRIGGER AND INSERTS THE USER 'email' AND 'date&time' OF DELETION INTO THE TABLE 'login_log' IF THE USER DELETES HIS/HER ACCOUNT
        if($sql1){
            echo "<script> alert('User deleted');window.location.assign('log.php');</script>";
    }
}
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <title>MY ACCOUNT</title>
  <style>
       body {
         background-color: #f0f4c3;
         background-size: 1400px;
          }
    @media screen and (max-width: 670px){
      header{
        min-height: 500px;
      }
    }
    .section{
      padding-top: 4vw;
      padding-bottom: 4vw;
    }
    .tabs .indicator{
      background-color: #1a237e;
    }
    .tabs .tab a:focus, .tabs .tab a:focus.active{
      background: transparent;
    }
      .c{
          min-height: 5px;
      }
      .cd .car{
           background: rgba(0,0,0,.3);
      }
     
  </style>
</head>
    
<body>
<!-- navbar -->
<header>
    <nav class="nav-wrapper black">
      <div class="container">
        <a href="#" class="brand-logo">MY ACCOUNT</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="main.php" class="tooltipped btn-floating btn-small black" data-position="bottom" data-tooltip="HOME"> 
            <i class="material-icons">home</i></a></li>
          <li><a href="order.php" class="tooltipped btn-floating btn-small black" data-position="bottom" data-tooltip="ORDER NOW"> 
            <i class="material-icons">add_shopping_cart</i></a></li>
          <li><a href="myorders.php" class="tooltipped btn-floating btn-small black" data-position="bottom" data-tooltip="CART"> 
            <i class="material-icons">shopping_cart</i></a></li>
           <li><a href="logout.php">LOGOUT</a></li>
          </ul>
      </div>
    </nav>
  </header>
<div class="row cd">
<div class="col s12 m6 offset-l3">
<div class="card CENTER-ALIGN car">     
<div class="card-content">
<div id="MyProfile" class="tabcontent tc">
  <h3 class="center-align light-green accent-4">MY PROFILE</h3>
   <table class="highlight">
     <tr>
       <td>
       <i class="small material-icons indigo-text">account_circle<strong class="white-text"> NAME</strong>  </i>
       </td>  
       <td class="white-text">
       <?php
          echo  $_SESSION["fname"]; echo  " ",$_SESSION["lname"];  
       ?>       
       </td>      
     </tr>
     <tr>
       <td>
       <i class="small material-icons  indigo-text">phone_android<strong class="white-text"> CONTACT</strong>  </i>
       </td>  
       <td class="white-text">
       <?php
          echo  $_SESSION["mobile"]; 
       ?>       
       </td>      
     </tr>       
     <tr>
       <td>
       <i class="small material-icons  indigo-text">cake<strong class="white-text"> DATE OF BIRTH</strong>  </i>
       </td>  
       <td class="white-text">
       <?php
          echo  $_SESSION["dob"];  
       ?>       
       </td>      
     </tr>     
     <tr>
       <td>
       <i class="small material-icons  indigo-text">email<strong class="white-text"> EMAIL</strong>  </i>
       </td>  
       <td class="white-text">
       <?php
          echo  $_SESSION["email"]; 
       ?>       
       </td>      
     </tr>  
     <tr>
       <td>
       <i class="small material-icons  indigo-text">wc<strong class="white-text"> GENDER</strong>  </i>
       </td>  
       <td class="white-text">
       <?php
          echo  $_SESSION["gender"];  
       ?>       
       </td>      
     </tr>
       <tr>
       <td>
       <i class="small material-icons  indigo-text">person_pin<strong class="white-text"> ADDRESS</strong></i>  
       </td>  
       <td class="white-text">
       <?php
          echo  $_SESSION["address"]; 
       ?>       
       </td>      
     </tr>  
   </table>
 <br><br>
</div>
        </div>
        <div class="card-action">
          <a data-target="modal1" class="btn indigo lighten-1 white-text modal-trigger"><i class="tiny material-icons">create</i> EDIT PROFILE</a>
         <a href="account.php?btn_delete=btn_delete" class="btn red white-text"><i class="tiny material-icons">delete</i> DELETE ACCOUNT</a>
        </div>
        </div>
         </div>
    </div>
    <div id="modal1" class="modal">
    <div class="modal-content">
    <h4 class="center-align" >Edit Your Profile</h4>
    <div class="row">
        
 <!-- MODAL CONT START-->       
<?php
$host="localhost";
$user="root";
$password="";
$db="petmart";
$con=mysqli_connect($host,$user,$password,$db);
        
    $res=mysqli_query($con,"select * from login where email= '".$_SESSION["username"]."' ");
    while($row=mysqli_fetch_array($res))
    {
        $_SESSION["u0"]=$row[0];
        $_SESSION["u1"]=$row[1];
        $_SESSION["u2"]=$row[2];
        $_SESSION["u3"]=$row[3];
        $_SESSION["u4"]=$row[4];
        $_SESSION["u5"]=$row[5];
        $_SESSION["u6"]=$row[6];
        $_SESSION["u7"]=$row[7];
        $_SESSION["ed"] = $row[3];
    }
?>            
         
<!-- Modal Structure -->
    <form action="#" method="get" class="col s12">
           <div class="row">
        <div class="input-field col s12">
          <input disabled value="<?php
                                    echo  $_SESSION["email"]; 
                                    ?>  
                                 "id="disabled" type="text">
          <label for="disabled">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input disabled value="<?php
                                    echo  $_SESSION["fname"]; 
                                    ?>  
                                 "id="disabled" type="text">
          <label for="disabled">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="lname" type="text" name="lname" required value="<?php echo $_SESSION["u1"];?>">
          <label for="lname">Last Name</label>
        </div>  
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="mobile" type="text" name="mobile" required value="<?php echo $_SESSION["u4"];?>">
          <label for="mobile">Mobile</label>
        </div>
         <div class="input-field col s6">
          <input id="dob" type="date" name="dob" required value="<?php echo $_SESSION["u6"];?>">
          <label for="dob">Date Of Birth</label>
        </div>
      </div>
         <div class="row">
        <div class="input-field col s12">
          <input id="address" type="text" name="address" required value="<?php echo $_SESSION["u5"];?>" >
          <label for="address">Address</label>
        </div>
        </div>
         <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" name="password" required value="<?php echo $_SESSION["u7"];?>">
          <label for="password">Password</label>
        </div>
        </div>
      <a href="#!" class="black-text modal-close waves-effect waves-green btn-flat left">Close</a>
      <center> <input type="submit" value="UPDATE" class="btn" name="submit"></center>
          </form>
<?php
              $id=$_SESSION["ed"];
              if(isset($_GET['submit']))
              {  
                  $v1=$_GET['lname'];
                  $v3=$_SESSION["email"];
                  $v4=$_GET['mobile'];
                  $v5=$_GET['address'];
                  $v6=$_GET['dob'];
                  $v7=$_GET['password'];
                if( mysqli_query($con,"update login set lname='$v1',mobile='$v4',dob='$v6',address='$v5',password='$v7' where email='".$_SESSION["username"]."'"))
                 {    $_SESSION["lname"]=$v1;
                      $_SESSION["mobile"]=$v4;
                      $_SESSION["address"]=$v5;
                      $_SESSION["dob"]=$v6;
                      $_SESSION["password"]=$v7;
                      echo "<script> alert('updation successful'); window.location.assign('account.php'); </script>"; 
                      exit();
                 }   
     //INVOKES THE TRIGGER AND INSERTS THE USER 'email' AND 'date&time' OF UPDATION INTO THE TABLE 'login_log' IF THE USER UPDATES HIS/HER PROFILE
              }
?>
    </div>
    </div>
    </div> 
<br> <br> <br> <br> <br>
    
    <!-- Compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
    $(document).ready(function()
    {
      $('.sidenav').sidenav();
      $('.materialboxed').materialbox();
      $('.parallax').parallax();
      $('.tabs').tabs();
      $('.datepicker').datepicker({ disableWeekends: true,yearRange: 1});
      $('.tooltipped').tooltip();
      $('.scrollspy').scrollSpy();
      $('.slider').slider({indicators: false,height:600,interval: 2500}); 
      $('.carousel').carousel({indicators:true});
      $('.dropdown-trigger').dropdown();
      $('.modal').modal();
    });
  </script>
</body>
</html>