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
  <title>CART</title>
  <style>
      .p{ background-image: url(cvr.jpg);
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
      .home
      {
          padding-top: 5px;
      }
      .bt{
          padding-left: 500px;
      }
  </style>

<!-- navbar -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">  
    </head>
    <body>
    <header> 
    <nav class="nav-wrapper black">
      <div class="container">
        <a href="#" class="brand-logo">My Orders!</a>
        <ul class="right hide-on-med-and-down">
         <li><a href="main.php" class="tooltipped btn-floating btn-small black" data-position="bottom" data-tooltip="HOME"> 
            <i class="material-icons">home</i></a></li>
            <li><a href="order.php" class="tooltipped btn-floating btn-small black" data-position="bottom" data-tooltip="ORDER NOW"> 
            <i class="material-icons">add_shopping_cart</i></a></li>
             <li><a  href='#' class='dropdown-trigger btn-floating btn-small black' data-target='dropdown1'><i class="material-icons left">account_box</i></a>
            <!-- Dropdown Structure -->
            <ul id='dropdown1' class='dropdown-content'>
            <li><a href="account.php"><i class="material-icons right">info</i>Account Info</a></li>
            <li><a href="logout.php">Logout</a></li>
            </ul></li>
          </ul>
      </div>
    </nav>
  </header>
    
   
        
        
        
<!--order table-->   
<div id="Bookings" class="tabcontent  lime lighten-3 black-text">
  
  <div align="center">
    <table border="2" width="1300" class="striped 
                black-text centered" >
      <tr>
          <th class="center-align"><h5>ORDER ID</h5><br>  </th> 
          <th class="center-align"><h5>ORDER DATE</h5><br></th>
          <th class="center-align"><h5>ITEM NAME</h5><br>  </th> 
          <th class="center-align"><h5>PRICE</h5><br>  </th> 
          <th class="center-align"><h5>QUANTITY</h5><br>  </th>   
          <th class="center-align"><h5>AMOUNT</h5><h6>[price*quantity]</h6></th> 
           
          <th class="center-align"><h5>EDIT</h5><br> </th> 
          <th class="center-align"><h5>DELETE</h5><br></th>
        </tr>
        
<?php
    $host="localhost";
    $user="root";
    $password="";
    $db="petmart";
    $con=mysqli_connect($host,$user,$password,$db);
    $_SESSION["total"]=0;
        if(isset($_GET['del']))
        {
            $id=$_GET['del'];
   
            if(mysqli_query($con,"delete from orders where id= '$id' "))
            {
            echo  "<script> alert('Order Deleted!!');window.location.assign('myorders.php'); </script>"; 
            }
        }
        $run=mysqli_query($con,"select * from orders where email= '".$_SESSION["username"]."' ");
  while($row=mysqli_fetch_array($run))
  { $_SESSION["ed"]=$row[0];
    $r1=$row[1];
    $r2=$row[2];
    $r3=$row[3];
    $r4=$row[4];
    $r5=$row[5];
    $_SESSION["quant"]=$row[6];
    $_SESSION["dt"]=$row[7];
   
   
    $run1=mysqli_query($con,"select pricelist.price from orders,pricelist where pricelist.itemname='$r5'");
    while($row1=mysqli_fetch_array($run1))
    {
     $_SESSION["price"]=$row1['price'];
    }
    $_SESSION["amount"]=$_SESSION['quant']*$_SESSION["price"];
    $_SESSION["total"]+=$_SESSION["amount"];
    echo "<tr align='center'>
        <td>{$_SESSION["ed"]}</td>
        <td>{$_SESSION["dt"]}</td>
        <td>$r5</td>
        <td>{$_SESSION['price']}</td>
        <td>{$_SESSION['quant']}</td>
        <td>&#8377; {$_SESSION['amount']}</td>
         <td><a href=\"#\"><i onclick=\"document.getElementById('id01').style.display='block'\" class=\"material-icons blue-text\">mode_edit</i></a></td>
        <td><a href='myorders.php?del=$row[0]'><i class=\"material-icons blue-text\">delete_forever</i></a></td>
         </tr>"  
   ;}
?>
      </table>
      <br>
      <br>
    
       <a class="waves-effect blue-grey darken-1 btn" href="payment.php"><i class="material-icons left">check_circle</i>PROCEED TO CHECKOUT</a>
  
    </div>   
 </div>
              
<!-- edit orders-->
  <div id="id01" class="w3-modal w3-animate-opacity">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-blue"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h2>UPDATE ORDERS</h2>
      </header>
      <div class="w3-container">   
<!-- MODAL CONT START-->
          <form action="#" method="GET">    
            <div class="input-field">
         <div class="input-field">
          <label>Enter Your Order ID</label><br> <input type="number" name="ordno">
         </div>        
         <div class="input-field">
          <label>QUANTITY</label><br> <input type="number" name="quantity">
         </div>
         </div> 
          <center> <input type="submit" value="UPDATE" class="btn" name="update"></center>
          </form>
<?php       
   if(isset($_GET['update']))
   {              
        $quant=$_GET['quantity'];
        $ordnum=$_GET['ordno'];
        if( mysqli_query($con,"update orders set quantity='$quant' where id= '$ordnum'"))
         {      echo "<script> alert('updation successful');  window.location.assign('myorders.php'); </script>"; 
                exit();
         }   
    }
?>
<!-- MODAL CONT END -->
</div>
</div>
</div>
 
<div class="fixed-action-btn">
  <a class="btn-floating btn-large red pulse">
    <i class="large material-icons">find_in_page</i>
  </a>
  <ul>
    <li><a href="main.php" class="tooltipped btn-floating purple darken-2" data-position="left" data-tooltip="HOME"><i class="material-icons">home</i></a></li>
    <li><a href="order.php" class="tooltipped btn-floating yellow darken-1" data-position="left" data-tooltip="ORDER NOW"><i class="material-icons">add_shopping_cart</i></a></li>
    <li><a href="account.php" class="tooltipped btn-floating green" data-position="left" data-tooltip="PROFILE"><i class="material-icons">account_box</i></a></li>
    <li><a href="logout.php" class="tooltipped btn-floating blue" data-position="left" data-tooltip="LOGOUT"><i class="material-icons">person_add_disabled</i></a></li>
  </ul>
</div>
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
      $('.dropdown-trigger').dropdown();
      $('.modal').modal();
      $('.fixed-action-btn').floatingActionButton();
         $('input.autocomplete').autocomplete({
      data: {
        "Butter Masala Dosa": null,
        "Idli Vada": null,
        "Alu Paratha": null,
        "Chole Bhature": null,
        "Poha": null,
        "South Indian Meal": null,
          "North Indian Meal": null,
          "Hydrabadi Meal": null,
          "Punjabi Meal": null,
          "Rajastani Meal": null,
          "Gobi Manchurian": null,
          "Vada Pav": null,
          "Italian Pasta": null,
          "Chicken Cutlet": null,
          "Chinese Noodles": null,
          "Mango Lassi": null,
          "Strawberry Milkshake": null,
          "Masala Soda": null,
          "Ginger Tea": null,
          "Coke": null,
      },
    });
    });
</script>
</body>
</html>