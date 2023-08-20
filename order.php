<?php
session_start();
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
  <title>ORDER NOW</title>
  <style>
      
      .body{
          overflow-y: hidden;
      }
      .p{ background-image: url(DOGIMG/bck2.jpg);
          background: cover;
      }
            .p .ch{
            background: rgba(0,0,0,.5);
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
        .reg .cd {
            background-color: #e1bee7;
         background: rgba(0,0,0,.3);
     }
      .ali
      {
          padding-top: 5px;
      }
      .bt{
          padding-left: 500px;
      }
      .shamp{
          color: blueviolet;
      }
  </style>
</head>
    
<!-- navbar -->
<body>
<header> 
    <nav class="nav-wrapper black">
      <div class="container">
        <a href="#" class="brand-logo"><img src="logonew.jpg" height="60em" width="120em"></a>
        <a href="#" class="sidenav-trigger" data-target="mobile-menu">
          <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down">
          <li><a href="main.php" class="tooltipped btn-floating btn-small black" data-position="bottom" data-tooltip="HOME"> 
            <i class="material-icons">home</i></a></li>
            <li><a href="orderpets.php" class="tooltipped btn-floating btn-small black" data-position="bottom" data-tooltip="ADOPT PETS"> 
            <i class="material-icons">pets</i></a></li>
            <li><a href="myorders.php" class="tooltipped btn-floating btn-small black" data-position="bottom" data-tooltip="CART"> 
            <i class="material-icons">shopping_cart</i></a></li>
            <li><a  href='#' class='dropdown-trigger btn-floating btn-small black' data-target='dropdown1'><i class="material-icons left">account_box</i></a> 
            <!-- <! Dropdown Structure -->
            <ul id='dropdown1' class='dropdown-content'>
            <li><a href="account.php"><i class="material-icons right">info</i>Account Info</a></li>
            <li><a href="logout.php">Logout</a></li>
            </ul></li>
          </ul>
      </div>
    </nav>
  </header>
    
 
  <div class="slider">
    <ul class="slides">
      <!-- <li>
        <img class="img-responsive" src="img/slider2.jpg" > // random image
        <div class="caption center-align black-text text-darken-1">
          <h3>WELCOME TO PET MART!</h3>
          <h5 class="light grey-text text-lighten-3"></h5>
        </div>
      </li> -->
       <li>
        <img class="img-responsive" src="img/slider1.jpg"> // random image
        <div class="caption left-align white-text">
          <h2>PETMART!</h2>
          <h3 class="light white-text text-darken-2 ">DONT SHOP...ADOPT</h3>
        </div>
      </li>
      <!--
      <li>
        <img class="img-responsive" src="img/slider5.jpg"> // random image
        <div class="caption right-align white-text">
          <h2>PET MART!</h2>
          <h4 class="light white-text text-darken-2">PAWS TO ERASE YOUR FLAWS </h4>
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
    
<!-- Modal Structure -->
  <form action="#" method="POST">
        <div id="dose" class="modal">
    <div class="modal-content">
      <div class="row">
    <div class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">fastfood</i>
          <input type="text" id="autocomplete-input" name="itemname" class="autocomplete" required>
          <label for="autocomplete-input">Item Name</label>
          </div>
      </div>
    </div>
  </div>
        <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">queue</i>
        <input name="quantity" id="quantity" type="number" min="0" max="15" required>
          <label for="quantity">Quantity</label>    
        </div>
        <div class="input-field col s6">
         
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
            <button class="btn-small cyan white-text" type="submit" name="submit" >ADD</button>
        </div>
        </div>
    </div>
  </div>
</form>
        
<?php      
$host="localhost";
$user="root";
$password="";
$db="petmart";
$con=mysqli_connect($host,$user,$password,$db);
if(isset($_POST['submit']))
{
        $v1=$_SESSION["fname"];
        $v2=$_SESSION["lname"];
        $v3=$_SESSION["mobile"];
        $v4=$_SESSION["dob"];
        $v5=$_SESSION["email"];
        $v6=$_SESSION["gender"];
        $v7=$_SESSION["address"];
        $v8=$_POST["itemname"];
        $v9=$_POST["quantity"];
        $query="INSERT INTO orders(email,fname,mobile,address,itemname,quantity,datetime) VALUES('$v5','$v1','$v3','$v7','$v8', '$v9',now())";
        $result=mysqli_query($con,$query);
        if($result)
        {  echo "<script>
           alert('ADDED SUCCESSFULLY TO YOUR CART!');
           window.location.assign('order.php'); 
           </script>";
           exit();
        }
}
?>
        
<ul class="collapsible popout p">  
<!--breakfast--> 
    <li class="l">
      <div class="collapsible-header ch"><h5 class="white-text bt"><i class="material-icons">list</i>PET CARE</h5></div>
      <div class="collapsible-body"><span>
    <section class="container section row scrollspy " id="ORDER NOW">
        <div class="row reg">
        <div class="col s12 l12">
        <div class="card-panel hoverable cd">
        <div class="card-action transparent lighten-2 black-text">
   <div class="row">
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image">
          <img src="DOGIMG/shamp.jpg">
        
          <a href="#dose" class="btn-floating halfway-fab waves-effect waves-light green  modal-trigger"><i class="material-icons">add</i></a>
          <!--REMOVED PULSE HERE YOU KNOW FROM WHERE-->
        </div>
          <br>
         <center> <span class="card-title shamp"><b>SHAMPOO and HAIR CARE</b></span></center>
        <div class="card-content">
          <h5 class="black-text darken-4">	
Himalaya Flea And Tick Himalaya Erina-ep Tick& Flea Control Shampoo For Dogs & Cat By Pawsitively Pet Care - 200ml Dog Shampoo</h5>
          
          <p class="indigo-text">Price: &#8377;INR 206</p>
        </div>
          <div class="card-content">
          <h5 class="black-text darken-4">Forbis Aloe Rinse Conditioner - 750 ml by heads up for tails</h5>
         
          <p class="indigo-text">Price: &#8377;INR 1000</p>
        </div>
          <div class="card-content">
          <h5 class="black-text darken-4">Pet Head Life's an Itch Soothing Dog Shampoo - 475 ml by heads up for tails</h5>
         
          <p class="indigo-text">Price: &#8377;INR 945</p>
        </div>
          <div class="card-content">
          <h5 class="black-text darken-4">	
So Shiny-tea Tree Oil Dog Shampoo 250 ML</h5>
         
          <p class="indigo-text">Price: &#8377;INR 220</p>
        </div>
      </div>
    </div>      
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image">
          <img src="img/bath.jpg">
     
          <a href="#dose" class="btn-floating halfway-fab waves-effect waves-light green modal-trigger"><i class="material-icons">add</i></a>
        </div>
      <center> <span class="card-title shamp"><b>SCRUB and BODY CARE</b></span></center>
        <div class="card-content">
          <h5 class="black-text darken-4">	
Choostix Dog Bath Glove 1 pc</h5>
          
          <p class="indigo-text">Price: &#8377;INR 260</p>
        </div>
          <div class="card-content">
          <h5 class="black-text darken-4">	
KONG Boysenberry Zoom Groom Dog Grooming Brush by heads up for tails</h5>
         
          <p class="indigo-text">Price: &#8377;INR 1020</p>
        </div>
          <div class="card-content">
          <h5 class="black-text darken-4">Maharsh Comfortable Pet Bathing Tool Massager Shower Cleaning Washing Sprayers Dog Brush</h5>
         
          <p class="indigo-text">Price: &#8377;INR 900</p>
        </div>
          <div class="card-content">
          <h5 class="black-text darken-4">	
Cat Dog Pet Hair Fur Remover Shedd Grooming Brush Comb Vacuum Cleaner Trimmer A+</h5>
         
          <p class="indigo-text">Price: &#8377;INR 2567</p>
        </div>
      </div>
    </div>   
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image">
          <img src="DOGIMG/flea.jpg">
          
          <a href="#dose" class="btn-floating halfway-fab waves-effect waves-light green modal-trigger"><i class="material-icons">add</i></a>
        </div>
          <center> <span class="card-title shamp"><b>FLEA REPELLENTS</b></span></center>
        <div class="card-content">
          <h5 class="black-text darken-4">	
all4pets Fiprotic Tick and Fleas-free Spray (100 ml)</h5>
        
          <p class="indigo-text">Price: &#8377;400</p>
        </div>
          <div class="card-content">
          <h5 class="black-text darken-4">	
	
Frontline Dog Spot 20 - 40 Kg (3 Ppt)</h5>
        
          <p class="indigo-text">Price: &#8377;1400</p>
        </div>
          <div class="card-content">
          <h5 class="black-text darken-4">	
	
Dog Lovers Notix Anti-Tick and Flea Pet Care Powder for Dogs, 100 g</h5>
        
          <p class="indigo-text">Price: &#8377;140</p>
        </div>
          <div class="card-content">
          <h5 class="black-text darken-4">	
OUT Natural Flea and Tick Spray - 500ml</h5>
        
          <p class="indigo-text">Price: &#8377;900</p>
        </div>
      </div>
    </div>      
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image">
          <img src="DOGIMG/brush.jpg">
          
          <a href="#dose" class="btn-floating halfway-fab waves-effect waves-light green modal-trigger"><i class="material-icons">add</i></a>
        </div>
         <center> <span class="card-title shamp"><b>TEETH CARE</b></span></center>
        <div class="card-content">
         <h5 class="black-text darken-4">Petkin Liquid Oral Care - Dental Care Solution for Dogs and Cats - 240 ml by heads up for tails</h5>
         
          <p class="indigo-text">Price: &#8377;220</p>
        </div>
          <div class="card-content">
         <h5 class="black-text darken-4">	
Petkin Tooth-wipes Tooth and Gum Cleanser</h5>
         
          <p class="indigo-text">Price: &#8377;530</p>
        </div>
          <div class="card-content">
         <h5 class="black-text darken-4">Petkin Pet Dental Food Spray, 113 g</h5>
         
          <p class="indigo-text">Price: &#8377;310</p>
        </div>
          <div class="card-content">
         <h5 class="black-text darken-4">Trixie Dog Dental Hygiene Kit with Toothpaste and Brush</h5>
         
          <p class="indigo-text">Price: &#8377;428</p>
        </div>
      </div>
    </div>
  </div>
   
</div>
        </div>
</section>
</span>
</div>
</li>
           
            
<!--meals-->     
    <li class="l">
      <div class="collapsible-header ch"><h5 class="white-text bt"><i class="material-icons">list</i>PET FOOD</h5></div>
      <div class="collapsible-body"><span>
    <section class="container section row scrollspy " id="ORDER NOW">
        <div class="row reg">
        <div class="col s12 l12">
        <div class="card-panel hoverable cd">
        <div class="card-action transparent lighten-2 black-text">
   <div class="row">
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image">
          <img src="DOGIMG/dfood.jpg">
          
          <a href="#dose" class="btn-floating halfway-fab waves-effect waves-light green modal-trigger"><i class="material-icons">add</i></a>
        </div>
           <center> <span class="card-title shamp"><b>DOG FOOD</b></span></center>
        <div class="card-content">
         <h5 class="black-text darken-4">Meat Up Adult Dog Food, 3 kg (Buy 1 Get 1 Free)</h5>
          <p></p>
          <p class="indigo-text">Price: &#8377;630</p>
        </div>
          <div class="card-content">
         <h5 class="black-text darken-4">	
Purepet Chicken & Vegetables Puppy Dog Food, 10kg
              </h5>
          <p></p>
          <p class="indigo-text">Price: &#8377;1150</p>
        </div>
          <div class="card-content">
         <h5 class="black-text darken-4">	
Pedigree Adult Meat & Rice Dog Food - 3 KG</h5>
          <p></p>
          <p class="indigo-text">Price: &#8377;540</p>
        </div>
          <div class="card-content">
         <h5 class="black-text darken-4">Drools Chicken and Egg Puppy Dog Food, 6.5kg (1.2kg Extra Free Stock)</h5>
          <p></p>
          <p class="indigo-text">Price: &#8377;880</p>
        </div>
      </div>
    </div>      
    <div class="row">
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image">
          <img src="DOGIMG/cfood.jpg">
          
          <a href="#dose" class="btn-floating halfway-fab waves-effect waves-light green modal-trigger"><i class="material-icons">add</i></a>
        </div>
           <center> <span class="card-title shamp"><b>CAT FOOD</b></span></center>
        <div class="card-content">
         <h5 class="black-text darken-4">	
Royal Canin Second Age Kitten 36 Cat Food 200g</h5>
          <p></p>
          <p class="indigo-text">Price: &#8377;300</p>
        </div>
          <div class="card-content">
         <h5 class="black-text darken-4">	
	
Meo PERSIAN Cat Food 1.2 Kg
              </h5>
          <p></p>
          <p class="indigo-text">Price: &#8377;330</p>
        </div>
          <div class="card-content">
         <h5 class="black-text darken-4">	
Whiskas Gravy Chicken Cat Treat 100 g</h5>
          <p></p>
          <p class="indigo-text">Price: &#8377;80</p>
        </div>
          <div class="card-content">
         <h5 class="black-text darken-4">	
Drools Kitten(1-12 Months) Dry Cat Food, Ocean Fish, 4kg (3kg + 1kg Food Free Inside)</h5>
          <p></p>
          <p class="indigo-text">Price: &#8377;664</p>
        </div>
      </div>
    </div>   
       </div>
</div>
</div>
</div> 
</div>
</section>
</span>
</div>
</li>    
            
            
            
<!--fastfood-->
       <!-- <li class="l">
      <div class="collapsible-header ch"><h5 class="white-text bt"><i class="material-icons">list</i>PET ACCESSORIES</h5></div>
      <div class="collapsible-body"><span>
    <section class="container section row scrollspy " id="ORDER NOW">
        <div class="row reg">
        <div class="col s12 l12">
        <div class="card-panel hoverable cd">
        <div class="card-action transparent lighten-2 black-text">
   <div class="row">
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image">
          <img src="DOGIMG/ch.jpg" height="45%">
          <span class="card-title"></span>
          <a href="#dose" class="btn-floating halfway-fab waves-effect waves-light green modal-trigger"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
          <h5 class="black-text darken-4">	
Generic Adjustable Bell Buckle Velvet Neck Strap For Kitten Cat Puppy - Red</h5>
            <p></p>
          <p class="indigo-text">Price: &#8377;500</p>
        </div>
          
        
      </div>
    </div>      
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image">
          <img src="DOGIMG/bed.jpg" height="52%">
          <span class="card-title"></span>
          <a href="#dose" class="btn-floating halfway-fab waves-effect waves-light green modal-trigger"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
          <h5 class="black-text darken-4">Petsfusion Dtp56 S Pet Bed</h5>
            <p></p>
          <p class="indigo-text">Price: &#8377;800</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image">
          <img src="DOGIMG/h.jpg" height="45%">
          <span class="card-title"></span>
          <a href="#dose" class="btn-floating halfway-fab waves-effect waves-light green modal-trigger"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
          <h5 class="black-text darken-4">Smarty Pet Nylon Soft Padded Leash and Harness Set-0.75 Inch (Red)</h5>
            <p></p>
          <p class="indigo-text">Price: &#8377;500</p>
        </div>
      </div>
    </div>      
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image">
          <img src="DOGIMG/dox.jpg" height="45%">
          <span class="card-title"></span>
          <a href="#dose" class="btn-floating halfway-fab waves-effect waves-light green modal-trigger"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
          <h5 class="black-text darken-4">Doxters S14 100% Cotton Dog T Shirts  Size 14 For Puppies, Small & Medium Dogs
</h5>
            <p></p>
          <p class="indigo-text">Price: &#8377;300</p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div> 
</div>
</section>
</span>
</div>
</li> -->
    
</ul> 
        
<!-- footer -->
  <footer class="page-footer grey darken-3">
    <div class="container"  id="ABOUT US">
      <div class="row">
        <div class="col l6 s12">
          <h5>About Us</h5>
          <p>PETMART</p>
           
          <p>DESIGNED BY RSS</p>   
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
    <li><a href="main.php" class=" btn-floating purple darken-2" data-position="left" data-tooltip="HOME"><i class="material-icons">home</i></a></li>
    <li><a href="myorders.php" class="btn-floating yellow darken-1" data-position="left" data-tooltip="CART"><i class="material-icons">shopping_cart</i></a></li>
    <li><a href="account.php" class=" btn-floating green" data-position="left" data-tooltip="PROFILE"><i class="material-icons">account_box</i></a></li>
    <li><a href="logout.php" class="btn-floating blue" data-position="left" data-tooltip="LOGOUT"><i class="material-icons">person_add_disabled</i></a></li>
  </ul>
</div>  -->
  <!-- Compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.sidenav').sidenav();
      $('.materialboxed').materialbox();
      $('.parallax').parallax();
      $('.tabs').tabs();
      $('.datepicker').datepicker({ disableWeekends: true,yearRange: 1});
      $('.tooltipped').tooltip();
      $('.scrollspy').scrollSpy();
      $('.slider').slider({indicators: false,height:290,interval: 2500}); 
      $('.carousel').carousel();
      $('.collapsible').collapsible();
      $('.modal').modal();
      $('.dropdown-trigger').dropdown();
      $('.fixed-action-btn').floatingActionButton();
      $('input.autocomplete').autocomplete({
      data: {
        "Himalaya Flea And Tick Shampoo": null,
        "Forbis Aloe Rinse Conditioner": null,
        "Itch Soothing Dog Shampoo": null,
        "Itch Soothing Dog Shampoo": null,
        "Shiny-tea Tree Oil Dog Shampoo": null,
        "Cat Dog Pet Hair Fur Remover": null,
          "Choostix Dog Bath Glove 1 pc": null,
          "KONG Dog Grooming Brush": null,
          "Maharsh  Pet Bathing Tool": null,
          "Fiprotic Tick  Flea free Spray": null,
          "Frontline Dog Spot": null,
          "Notix Pet Care Powder": null,
          "OUT Flea and Tick Spray": null,
          "Petkin Liquid Oral Care": null,
          "Petkin Tooth-wipes": null,
          "Petkin Pet Dental Food Spray": null,
          "Trixie Dog Dental Hygiene Kit": null,
          "Meat Up Adult Dog Food": null,
          "Purepet Chicken Vegetables pf": null,
          "Drools Chicken and Egg pf": null,
          //here
          "Pedigree Adult Meat & Rice": null,
          "RoyalCanin Second Age Cat Food": null,
          "Meo PERSIAN Cat Food": null,
          "Drools Kitten Dry Cat Food": null,
          "Whiskas Gravy Cat Treat": null,
          "Bell Buckle Velvet Neck Strap": null,
          "Petsfusion Dtp56 S Pet Bed": null,
          "Smarty Pet Nylon Soft Harness": null,
          "Doxters S14 Cotton Dog TShirt": null,
      },
    });
    });
  </script>
</body>
</html>