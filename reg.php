<?php
$host="localhost";
$user="root";
$password="";
$db="petmart";
$con=mysqli_connect($host,$user,$password,$db);
 if(isset($_POST['submit']))
{   $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $gender=$_POST['gender']; 
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];
    $dob=$_POST['dob']; 
    $password=$_POST['password'];
    $query="INSERT INTO login(fname,lname,gender,email,mobile,address,dob,password) VALUES('$fname', '$lname','$gender', '$email', '$mobile', '$address','$dob', '$password');";
    $data=mysqli_query($con,$query);
    //INVOKES THE TRIGGER AND INSERTS THE USER 'email' AND 'date&time' OF REGISTRATION INTO THE TABLE 'login_log' IF A NEW USER IS REGISTERED
    if($data)
    {
     echo "<script> alert('Registration Successful'); window.location.assign('log.php'); </script>"; 
        exit(); 
    }
   else
    {
      echo("Error description: " . mysqli_error($con));
    }
  }
?>

<html>
<title>REGISTRATION PAGE</title>    
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
 <style>
     body {
         background-image: url(regcover.jpeg);
         background-size: cover;
          }
     .reg {
         margin-top: 70px;
        }
     .reg .card {
         background: rgba(0,0,0,.3);
     }
     .reg label{
         font-size: 16px;
         color: black;
     }
     .reg input {
         font-style: normal;
         font-size: 25px !important;
         color: white;
     }
     .reg button:hover{
         padding: 0px 30px;
     }
     .reg button1:hover{
         padding: 0px 50px;
     }
    </style>
 <body>
<form action="#" method="POST">
 <div class="row reg">
        <div class="col s12 l4 offset-l6">
        <div class="card">
            <div class="card-action transparent lighten-2 black-text center-align">
                <h5 class="black-text text-darken-2">REGISTER TO PET MART!</h5>
            </div>
            <div class="card-content"> 
                <label class="white-text" for="FNAME"><i class="material-icons left">account_circle</i> FIRST NAME</label>
                <input type="text" id="FNAME" name="fname" required>
                <br>
                  <div class="form-field">
                <label class="white-text" for="LNAME"><i class="material-icons left">account_circle</i> LAST NAME</label>
                <input type="text" id="LNAME" name="lname">
                </div><br>
                  <div class="form-field">
                <label class="white-text" for="GENDER"><i class="material-icons left">wc</i> GENDER</label>
                <input type="radio" id="GENDER" name="gender">
                <p>
                    <label>
                    <input name="gender" type="radio" value="male"/>
                    <span>MALE</span>
                    </label>
                </p>
                <p>
                    <label>
                    <input name="gender" type="radio" value="female" />
                    <span>FEMALE</span>
                    </label>
                </p>
                </div>  <br>   <br>
                
                <div class="form-field">
                <label class="white-text" for="EMAIL"><i class="material-icons left">email</i> EMAIL</label>
                <input type="text" id="EMAIL" name="email" required/>
                </div>   <br>
                <div class="form-field">
                <label class="white-text" for="PHONE"><i class="material-icons left">phone_android</i> PHONE NO.</label>
                <input type="text" id="PHONE" name="mobile" required>
                </div>   <br>            
                <div class="form-field">
                <label class="white-text" for="ADDR"><i class="material-icons left">person_pin</i> ADDRESS</label>
                <input type="text" id="ADDR" name="address" required>
                </div>   <br>            
                <div class="form-field">
                <label class="white-text" for="DOB"><i class="material-icons left">cake</i> DATE OF BIRTH</label>
                <input type="date" id="DOB"  name="dob" required>
                </div>   <br>
                <div class="form-field">
                <label class="white-text" for="pass"><i class="material-icons left">vpn_key</i> PASSWORD</label>
                <input type="password" id="pass" name="password" required>
                </div>   <br>
                <div class="col s3 l4 offset-l4">
                <button class="btn waves-effect waves-light" type="submit" name="submit">register
                </button>
                </div>   <br>   <br>
                <div class="form-field">
                <p class="white-text center-align">Already have an account? Click here to Login  <a href="log.php" class="btn-small red darken-2 waves-effect waves-dark">Login</a></p>
                </div>
            </div>
            </div>
        </div>
</div>
</form>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script>
    $(document).ready(function(){
      $('.sidenav').sidenav();
      $('.materialboxed').materialbox();
      $('.parallax').parallax();
      $('.tabs').tabs();
      $('.datepicker').datepicker();
      $('.tooltipped').tooltip();
      $('.scrollspy').scrollSpy();
    });
</script>
</body>   
</html>