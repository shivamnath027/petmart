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
          overflow-x: hidden;
      }
      .l{ background-image: url(DOGIMG/bf.jpg);
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
  </style>
</head>
    
<!-- navbar -->
<body>
<header> 
    <nav class="nav-wrapper black">
      <div class="container">
          <a href="#" class="brand-logo"><img src="logonew.jpg" height="60em" width="120em"></a>
      
        <a href="#" class="sidenav-trigger" data-target="mobile-demo">
          <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down">
          <li><a href="main.php" class="tooltipped btn-floating btn-small black" data-position="bottom" data-tooltip="HOME"> 
            <i class="material-icons">home</i></a></li>
            <li><a href="order.php" class="tooltipped btn-floating btn-small black" data-position="bottom" data-tooltip="PET ACCESSORIES"><i class="material-icons left ali">add_shopping_cart</i></a></li>
            <li><a href="myorders.php" class="tooltipped btn-floating btn-small black" data-position="bottom" data-tooltip="CART"> 
            <i class="material-icons">shopping_cart</i></a></li>
            <li><a  href='#' class='dropdown-trigger btn-floating btn-small black' data-target='dropdown1'><i class="material-icons left">account_box</i></a>
            <!-- Dropdown Structure -->
            <ul id='dropdown1' class='dropdown-content'>
            <li><a href="account.php"><i class="material-icons right">info</i>Account Info</a></li>
            <li><a href="logout.php">Logout</a></li>
            </ul></li>
          </ul>
      </div>
    </nav>
         <ul class="sidenav" id="mobile-demo">
         <li><a href="main.php"  ><i class="material-icons left ali">home</i>HOME</a></li>
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
    
 
    <div>
<img src="DOGIMG/g2.jpeg" width="100%" height="80%">
    </div>
    
<!-- Modal Structure -->
  <form action="#" method="POST">
        <div id="animal" class="modal">
    <div class="modal-content">
      <div class="row">
    <div class="col s12">
      <div class="row">
         
        <div class="input-field col s6">
          <i class="material-icons prefix">animal</i>
          <div class="input-field col s12">
    <select required name="dog">
      <option value="" disabled selected >Choose your option</option>
        <optgroup label="pups">
      <option value="BEAGLE PUP">BEAGLE PUP</option>
      <option value="LABRADOR RETRIEVER">LABRADOR RETRIEVER</option>
      <option value="SIBERIAN HUSKY">SIBERIAN HUSKY</option>
          <option value="MALE HUSKY">MALE HUSKY</option>
             </optgroup>
      <optgroup label="kits">
        <option value="PERSIAN">PERSIAN</option>
        <option value="MAIN COON">MAIN COON</option>
          <option value="HIMALAYAN BREED">HIMALAYAN BREED</option>
          <option value="SHORT HAIR BREED">SHORT HAIR BREED</option>
      </optgroup>
    </select>
    <label>Select</label>
  </div>
          </div>
      </div>
    </div>
  </div>
        <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">queue</i>
        <input name="quantity" id="quantity" type="number" min="1" max="3" required>
          <label for="quantity">COUNT</label>    
        </div>
        <div class="input-field col s6">
         
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
            <button class="btn-small cyan white-text" type="submit" name="submit">ADD</button>
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
        $v8=$_POST['dog'];
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
      <div class="collapsible-header ch"><center><h5 class="white-text bt"><i class="material-icons">list</i>DOGS</h5></center></div>
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
          <img class="materialboxed" src="DOGIMG/pup1.jpg" height="46%">
          <span class="card-title">LABRADOR RETRIEVER</span>
          <a href="#animal" class="btn-floating halfway-fab waves-effect waves-light green modal-trigger"><i class="material-icons">add</i></a>
          <!--Removed Pulse from a href="#animal" as green pulse modal-trigger" -->
        </div>
        <div class="card-content">
          <h5 class="black-text darken-4">LABRADOR RETRIEVER</h5>
            <p>Dog Name: Honey <br/> Age:3 years <br/> Status: Availabe <br/> Condition:Vaccinated<br/> Location: Bangalore<br/> Requirements: Loving home with lot of play area<br/></p>
          <p class="indigo-text">Price: &#8377;INR 10,000 </p>
        </div>
      </div>
    </div>      
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image">
          <img class="materialboxed" src="DOGIMG/pup2.jpg" height="47%">
          <span class="card-title">BEAGLE PUP</span>
          <a href="#animal" class="btn-floating halfway-fab waves-effect waves-light green  modal-trigger"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
          <h5 class="black-text darken-4">BEAGLE PUP</h5>
          <p>Dog Name: BOGO <br/> Age:3 months <br/> Status: Availabe <br/> Condition:Vaccinated<br/> Location: Mumbai<br/> Requirements: Timely vaccination<br/></p>
          <p class="indigo-text">Price: &#8377;INR 4000</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image">
          <img class="materialboxed" src="DOGIMG/pup3.jpg" height="46%">
          <span class="card-title">MALE HUSKY</span>
          <a href="#animal" class="btn-floating halfway-fab waves-effect waves-light green  modal-trigger"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
          <h5 class="black-text darken-4">MALE HUSKY</h5>
          <p>Dog Name: Bliss <br/> Age:1 year <br/> Status: Available <br/> Condition:Vaccinated<br/> Location: bangalore<br/> Requirements:Constant attention<br/></p>
          <p class="indigo-text">Price: &#8377;INR 35000</p>
        </div>
      </div>
    </div>      
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image">
          <img class="materialboxed" src="DOGIMG/pup4.jpg" height="46%">
          <span class="card-title">SIBERIAN HUSKY</span>
          <a href="#animal" class="btn-floating halfway-fab waves-effect waves-light green  modal-trigger"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
         <h5 class="black-text darken-4">SIBERIAN HUSKY</h5>
          <p>Dog Name: Bliss <br/> Age:8 months <br/> Status: Available <br/> Condition:Vaccinated<br/> Location: bangalore<br/> Requirements:LOTS OF PLAY TIME <br/></p>
          <p class="indigo-text">Price: &#8377;INR 20,000</p>
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
           
            
<!--cats--> 


    <li class="l">
      <div class="collapsible-header ch"><h5 class="white-text bt"><i class="material-icons">list</i>CATS</h5></div>
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
         <img class="materialboxed" src="DOGIMG/kit1.jpg" height="46%">
          <span class="card-title">PERSIAN</span>
          <a href="#animal" class="btn-floating halfway-fab waves-effect waves-light green  modal-trigger"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
         <h5 class="black-text darken-4">PERSIAN</h5>
          <p>Dog Name: Lucy <br/> Age:6 months <br/> Status: Available <br/> Condition:Vaccinated<br/> Location: bangalore<br/></p>
          <p class="indigo-text">Price: &#8377;6000</p>
        </div>
      </div>
    </div>      
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image">
          <img class="materialboxed" src="DOGIMG/kit2.jpg" height="46%">
          <span class="card-title">MAIN COON</span>
          <a href="#animal" class="btn-floating halfway-fab waves-effect waves-light green  modal-trigger"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
         <h5 class="black-text darken-4">MAIN COON</h5>
          <p>Dog Name: Blossom <br/> Age:4 months <br/> Status: Available <br/> Condition:Vaccinated<br/> Location: bangalore<br/></p>
          <p class="indigo-text">Price: &#8377;8000</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image">
          <img class="materialboxed" src="DOGIMG/kit3.jpg" height="46%">
          <span class="card-title">HIMALAYAN BREED</span>
          <a href="#animal" class="btn-floating halfway-fab waves-effect waves-light green  modal-trigger"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
        <h5 class="black-text darken-4">HIMALAYAN BREED</h5>
          <p>Dog Name: SNOW <br/> Age:1 year <br/> Status: Available <br/> Condition:Vaccinated<br/> Location: bangalore<br/></p>
          <p class="indigo-text">Price: &#8377;INR 10,000</p> 
        </div>
      </div>
    </div>      
    <div class="col s12 m6">
      <div class="card">
        <div class="card-image">
          <img class="materialboxed" src="DOGIMG/kit4.jpg" height="46%">
          <span class="card-title">SHORT HAIR BREED</span>
          <a href="#animal" class="btn-floating halfway-fab waves-effect waves-light green  modal-trigger"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
        <h5 class="black-text darken-4">SHORT HAIR BREED</h5>
          <p>CAT Name: QUEEN <br/> Age:2 yearS <br/> Status: Available <br/> Condition:Vaccinated<br/> Location: bangalore<br/></p>
          <p class="indigo-text">Price: &#8377;INR 15000</p> 
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
            
            
            

      

</ul> 
        
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
      document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.materialboxed');
    var instances = M.Materialbox.init(elems, options);
  });

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
    
    });
      document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('select').formSelect();
  });
        
  </script>
</body>
</html>