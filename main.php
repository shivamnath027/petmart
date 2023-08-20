<?php
$host="localhost";
$user="root";
$password="";
$db="petmart";
$con=mysqli_connect($host,$user,$password,$db);
if(isset($_POST['submit']))
{   
    $emailid=$_POST['emailid'];
     $reviews=$_POST['reviews'];
     $radio=$_POST['radio'];
     $query="INSERT INTO review(emailid,reviews,radio) VALUES('$emailid', '$reviews','$radio')";
    $data=mysqli_query($con,$query);
    if($data)
    {
     echo "<script> alert('REVIEWS SUCCESSFULLY SUBMITTED'); window.location.assign('main.php'); </script>"; 
        exit();
    }
   else
    {
      echo("Error description: " . mysqli_error($con));
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
  <title>PETMART</title>
  <style>
      
    @media screen and (max-width: 670px){
      header{
        min-height: 800px;
      }
    }
      
    .carousel {
      overflow: hidden;
      pointer-events: none;  /* Disable interaction with carousel  */
      }
    
    .tabs .indicator{
      background-color: #1a237e;
    }
    .tabs .tab a:focus, .tabs .tab a:focus.active{
      background: transparent;
    }
      .ali
      {
          padding-top: 5px;
      }
      .slider{
          max-width: 100%;
          max-height: 100%;
      }
  </style>
</head>

    
<body>
<!-- navbar -->
<header>
    <nav class="nav-wrapper black">
      <div class="container">
        <a href="#" class="brand-logo"><img src="logonew.jpg" height="60em" width="120em"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">pets</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="orderpets.php"  ><i class="material-icons left ali">pets</i>ADOPT PETS</a></li>
          <li><a href="order.php"><i class="material-icons left ali">add_shopping_cart</i>ORDER PET ACCESSORIES</a></li>
          <li><a href="myorders.php"><i class="material-icons left ali">shopping_cart</i>CART</a></li>
            <li><a  href='account.php'><i class="material-icons left">account_box</i>ACCOUNT</a></li>
            
           
          </ul>
      </div>
    </nav>
     <ul class="sidenav" id="mobile-demo">
         <li><a href="orderpets.php"  ><i class="material-icons left ali">pets</i>ADOPT PETS</a></li>
          <li><a href="order.php"><i class="material-icons left ali">add_shopping_cart</i>ORDER PET ACCESSORIES</a></li>
          <li><a href="myorders.php"><i class="material-icons left ali">shopping_cart</i>CART</a></li>
          <li>
              <a class='dropdown-trigger btn black white-text' href='#' data-target='dropdown1'><i class="material-icons left">account_box</i>MY ACCOUNT</a>
            <!-- Dropdown Structure -->
            <ul id='dropdown1' class='dropdown-content'>
            <li><a href="account.php"><i class="material-icons right">info</i>Account Info</a></li>
            <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
    </ul>
  </header>
    
    <div class="slider">
    <ul class="slides">
      <li>
        <img class="img-responsive" src="img/slider2.jpg" > <!-- random image -->
        <div class="caption center-align white-text text-darken-1">
          <h3>WELCOME TO PETMART! 🐶 😽</h3>
         
        </div>
      </li>
      <!-- <li>
        <img class="img-responsive" src="img/slider1.jpg">  // random image 
        <div class="caption left-align white-text">
          <h2>PET MART!</h2>
          <h3 class="light white-text text-darken-2 ">DONT SHOP...ADOPT</h3>
        </div>
      </li> -->
      <!-- <li>
        <img class="img-responsive" src="img/slider5.jpg">  random image
        <div class="caption right-align white-text">
          <h2>PET MART!</h2>
          <h4 class="light white-text text-darken-2">PAWS TO ERASE YOUR FLAWS 🐾🐾</h4>
        </div>
      </li>
      <li>
        <img class="img-responsive" src="img/slider4.jpg">  //random image
        <div class="caption left-align white-text text-darken-2">
          <h1>NEED TO ADAPT?</h1><br>
          <h3 class="white-text left-align text-darken-2">NO! JUST ADOPT</h3>
        </div>
      </li> -->
    </ul>
  </div>
      
    
<!-- MENU -->
    <div class="row">
        <div class="col s12 l6">
      <div class="scrollspy center-align" id="MENU">
        <h2 class="indigo-text text-darken-4"><br>PETMART</h2>
        <h5>Animals are reliable, many full of love, true in their affections, predictable in their actions, grateful and loyal.<br/>PET MART WELCOMES YOU WITH FUR BALLS TO ADOPT AND A VIVID RANGE OF PET CARE AND COMFORT PRODUCTS FOR YOUR ANIMAL FRIENDS.
          </h5>
        
        </div> </div>
<!-- carousal -->
<div class="col s12 l6">
 <div class="carousel">
    <a class="carousel-item" href="#one!"><img src="DOGIMG/d1.jpeg"></a>
    <a class="carousel-item" href="#two!"><img src="DOGIMG/c3.jpeg"></a>
    <a class="carousel-item" href="#three!"><img src="DOGIMG/b2.jpeg"></a>
    <a class="carousel-item" href="#four!"><img src="DOGIMG/d4.jpeg"></a>
    <a class="carousel-item" href="#five!"><img src="DOGIMG/p4.jpeg"></a>
  </div>
</div>   
   </div> 
<!-- tabs -->
       
    
<!-- parallax -->
  <div class="parallax-container">
    <div class="parallax">
      <img src="img/parallax2.jpg" alt="" class="responsive-img" >
    </div>
  </div>
    
<!--reviews-->
  <section class="section container scrollspy">
    <div class="row">
      <div class="col s12 l5">
        <h2 class="indigo-text">YOUR REVIEWS</h2>
          <h5 class="black-text text-darken-4">Do Share Your Reviews With Us</h5>
        <p>User reviews are heartly welcomed...</p>
        <p>Please let us know about your experience with our 'PETMART'</p>
        <p>Help us to serve you better!!!</p>
      </div>
      <div class="col s12 l5 offset-l2">
         <form action="#" method="POST">
          <div class="form-field">
            <label class="BLACK-text" for="EMAIL"><i class="material-icons left">email</i> EMAIL</label>
             <input type="text" id="EMAIL" name="emailid">
          </div><br>
          <div class="form-field">
                <label class="black-text" for="REVIEWS"><i class="material-icons left">chat</i> YOUR REVIEWS</label>
                <input type="text" id="REVIEWS" name="reviews">
          </div><br>       
    <div class="form-field">
        <label class="black-text" for="RADIO"><i class="material-icons left"></i></label>
        <input type="radio" id="RADIO" name="radio">
        <p>
            <label>
                <input name="radio" type="radio" value="EXCELLENT"/>
                <span>EXCELLENT</span>
            </label>
        </p>
        <p>
            <label>
                <input name="radio" type="radio" value="GOOD"/>
                <span>GOOD</span>
            </label>
        </p>
        <p>
            <label>
                <input name="radio" type="radio" value="AVERAGE"/>
                <span>AVERAGE</span>
            </label>
        </p>
        <p>
            <label>
                <input name="radio" type="radio" value="NOT SATISFACTORY"/>
                <span>NOT SATISFACTORY</span>
            </label>
        </p>
    </div>
    <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
      <i class="material-icons right">send</i>
    </button>
    </form>
    </div>
    </div>
</section>
    
  <!-- footer -->
  <footer id="ABOUT US" class="page-footer grey darken-3">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5>About Us</h5>
          <p>PETMART</p>
          <p>DESIGNED BY RSS </p>
          
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#">Facebook</a></li>
            <li><a class="grey-text text-lighten-3" href="#">Twitter</a></li>
            <li><a class="grey-text text-lighten-3" href="#">Linked In</a></li>
            <li><a class="grey-text text-lighten-3" href="#">Instagram</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright grey darken-4">
      <div class="container center-align">&copy; 2023 PETMART</div>
    </div>
  </footer>
    
 <!-- <div class="fixed-action-btn">
  <a class="btn-floating btn-large red pulse">
    <i class="large material-icons">find_in_page</i>
  </a>
  <ul>
    <li><a href="order.php" class="tooltipped btn-floating purple darken-2" data-position="left" data-tooltip="ORDER NOW"><i class="material-icons">add_shopping_cart</i></a></li>
    <li><a href="myorders.php" class="tooltipped btn-floating yellow darken-1" data-position="left" data-tooltip="CART"><i class="material-icons">shopping_cart</i></a></li>
    <li><a href="account.php" class="tooltipped btn-floating green" data-position="left" data-tooltip="PROFILE"><i class="material-icons">account_box</i></a></li>
    <li><a href="logout.php" class="tooltipped btn-floating blue" data-position="left" data-tooltip="LOGOUT"><i class="material-icons">person_add_disabled</i></a></li>
  </ul>
</div>  -->
 
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
      // $('.fixed-action-btn').floatingActionButton();
    });
  </script>
</body>
</html>