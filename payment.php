<?php

session_start();

    $host="localhost";
    $user="root";
    $password="";
    $db="petmart";
    $con=mysqli_connect($host,$user,$password,$db);
$_SESSION["total"]=0;
$run=mysqli_query($con,"select * from orders where email= '".$_SESSION["username"]."' ");
while($row=mysqli_fetch_array($run))
  { $_SESSION["ed"]=$row[0];
    $r1=$row[1];
    $r2=$row[2];
    $r3=$row[3];
    $r4=$row[4];
    $r5=$row[5];
    $_SESSION["quant"]=$row[6];
    $_SESSION['dt']=$row[7];
   
   
    $run1=mysqli_query($con,"select pricelist.price from orders,pricelist where pricelist.itemname='$r5'");
    while($row1=mysqli_fetch_array($run1))
    {
     $_SESSION["price"]=$row1['price'];
    }
    $_SESSION["amount"]=$_SESSION['quant']*$_SESSION["price"];
    $_SESSION["total"]+=$_SESSION["amount"];
  }
if(isset($_post['submit']))
{
    window.location.assign('thankyou.php'); 
}
?>
<html>
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
    <style>
        html, body
{
    height: 100%;
    color: black;
    /* font-family: 'Barlow', sans-serif; */
    /* font-family: 'Roboto Condensed', sans-serif; */
    font-family: 'Open Sans', sans-serif;
    font-weight: 400;
}

body
{
    font-size: 62.5%;
}

body
{
    /* background-image:url(DOGIMG/bck3.jpg); */
    /* background-size: cover; */
   
    
}

.main-wrapper
{
    border-radius: 15px 15px 15px 15px;
    -moz-border-radius: 15px 15px 15px 15px;
    -webkit-border-radius: 15px 15px 15px 15px;
    border: none;
    -webkit-box-shadow: 0px 20px 10px 10px rgba(0,0,0,0.1);
    -moz-box-shadow: 0px 20px 10px 10px rgba(0,0,0,0.1);
    box-shadow: 0px 20px 10px 10px rgba(0,0,0,0.1);
}

.basket-header
{
    border-radius: 15px 0 0 0;
    -moz-border-radius: 15px 0 0 0;
    -webkit-border-radius: 15px 0 0 0;
    padding-left: 25px !important;
}

.creditcard-header
{
    border-radius: 0 15px 0 0;
    -moz-border-radius: 0 15px 0 0;
    -webkit-border-radius: 0 15px 0 0;
    padding-left: 35px !important;
}

.panel-wrapper
{
}

.panel-header
{
    background: #166D9A;
    height: 80px;
    padding: 15px 20px 0 20px;
}

.panel-wrapper .basket-header .column-titles
{
    color: #A2C6DD;
    padding: 0;
    margin: 0;
    /* font-family: 'Anton', sans-serif; */
    display: none;
    visibility: hidden;
}

.fix-overflow
{
    padding-right: 5px !important;
}

.panel-wrapper .basket-body
{
    overflow-x: hidden;
    overflow-y: auto;
}

.panel-wrapper .creditcard-body
{
    padding: 30px 40px 0 40px;
}

.panel-wrapper .panel-body
{
    font-weight: 400;
    font-size: 1.2em;
    outline: none !important;
    min-height: 350px;
    max-height: 350px;
}

.basket-body
{
    background: #F9F9F9;
}

.creditcard-body
{
    background: white;
}

.basket-body .row.product
{
    margin: 5px 0 5px 0;
    padding:  5px 0 5px 0;
    border-bottom: solid 1px #eeeeee;
}

.basket-body .row.product div
{
    color: #777879;
    padding: 0 10px 0 10px;
}

.basket-body .row.product .product-image
{
}

.product-image img
{
    -o-object-fit: contain;
    object-fit: contain;
    width: 100%;
    min-width: 100%;
    max-width: 100%;
    max-height: 80px;
}

.card-wrapper
{
    height: 100%;
}

.padding-top-10
{
    padding-top: 10px !important;
}

.padding-top-20
{
    padding-top: 20px !important;
}

.padding-horizontal-40
{
    padding: 0 40px 0 40px;
}

.align-right
{
    text-align: right;
}

.align-center
{
    text-align: center;
}

.emphasized
{
    /* font-family: 'Anton', sans-serif; */
    /* font-family: 'Roboto Condensed', sans-serif; */
    /* font-family: 'Raleway', sans-serif; */
    font-family: 'Open Sans', sans-serif;
    font-weight: 600;
    font-size: 1.6em;
    color: white;
}

.description
{
    /* font-family: 'Anton', sans-serif; */
    /* font-family: 'Roboto Condensed', sans-serif; */
    /* font-family: 'Raleway', sans-serif; */
    font-family: 'Open Sans', sans-serif;
    font-weight: 400;
    font-size: 1.2em;
    color: #A2C6DD;
}

.panel-footer
{
    padding-top: 10px;
    height: 150px;
}

.basket-footer
{
    background: #166D9A;
    border-radius: 0 0 0 15px;
    -moz-border-radius: 0 0 0 15px;
    -webkit-border-radius: 0 0 0 15px;
}

.basket-footer .title, .basket-footer .subtitle
{
}

.creditcard-footer
{
    background: white;
    border-radius: 0 0 15px 0;
    -moz-border-radius: 0 0 15px 0;
    -webkit-border-radius: 0 0 15px 0;
    padding: 75px 30px 0 30px;
}

.basket-footer .row .subtitle, .basket-footer .row .title
{
}

.panel-footer hr
{
    margin: 3px 0 3px 0;
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #197fb3;
    padding: 0;
}

.panel-footer button
{
    border: solid 1px #166D9A;
    background: #166D9A;
    font-family: 'Open Sans', sans-serif;
    font-weight: 400;
    color: white;
    font-size: 1.4em;
    text-transform: uppercase;
    padding: 10px 15px 11px 15px;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    
}

.panel-footer button:hover
{
    cursor: pointer;
}

button.cancel
{
    background: white;
    color: #166D9A;
}

button.cancel:hover
{
    background: #ff0000;
    border-color: #ff0000;
    color: white;
}

button.confirm:hover
{
    background: #00b300;
    border-color: #00b300;
    color: white;
}

.dive
{
    margin-top: 5px;
}

.sub
{
    font-size: 75%;
    color: #aaaaaa;
}

.very
{
    font-size: 2.2em;
}

.creditcard-body form
{
    font-size: 1.3em;
}
 
.creditcard-body form i.fa
{
    margin-right: 10px;
    color: #166D9A;
}

.creditcard-body form fieldset
{
    border-bottom: dotted 2px #D0D0D0;
    margin-bottom: 25px;
}

.creditcard-body form input
{
    border: none;
    font-weight: 600;
    color: #555555;
    width: 85%;
    outline: none;
}

.creditcard-body form input::placeholder
{
    color: #D0D0D0;
}

.creditcard-body form label
{
    color:  #aaaaaa;
}

.additional
{
    font-weight: 300;
    font-size: 80%;
}

.fa-info-circle
{
    color: #aaaaaa !important;
}

span.month.focused.active
{
    background: #166D9A !important;
    background-image: none !important;
}


@media (max-width: 992px)
{
}

@media (max-width: 767px)
{
    
    .basket-header
    {
        border-radius: 15px 15px 0 0;
        -moz-border-radius: 15px 15px 0 0;
        -webkit-border-radius: 15px 15px 0 0;
    }
    
    .basket-footer
    {
        background: #166D9A;
        border-radius: 0;
        -moz-border-radius: 0;
        -webkit-border-radius: 0;
    }    
    
    .creditcard-header
    {
        border-radius: 0;
        -moz-border-radius: 0;
        -webkit-border-radius: 0;
    }
    
    .creditcard-footer
    {
        border-radius: 0 0 15px 15px;
        -moz-border-radius: 0 0 15px 15px;
        -webkit-border-radius: 0 0 15px 15px;
    }
    
}

        </style></head>







<div class="container-fluid background">
    <div class="row padding-top-20">
        <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-8 offset-md-1 offset-lg-1 offset-xl-2 padding-horizontal-40">
           <div class="row">
            <div class="col-12 main-wrapper">
                    <div class="row">
         <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div id="template" class="row panel-wrapper">
            <div class="col-12 panel-header basket-header">
                                    <div class="row">
                <div class="col-6 basket-title">
                                <span class="description">review your</span><br><span class="emphasized">Cart Summary</span>
                                        </div>
                                 
                                    </div>
                           <div class="row column-titles padding-top-10">
                                        >
                                   <div class="col-5 align-center"><span>Name</span></div>
                         <div class="col-2 align-center"><span>Quantity</span></div>
                                 <div class="col-3 align-right"><span>Price</span></div>
                                    </div>                                    
                      </div>
                                 
        
    <table border="2" width="1300" class="striped 
                black-text centered">    
         <tr>
          
          <th class="center-align"><h5>ITEM NAME</h5><br>  </th> 
          
          <th class="center-align"><h5>AMOUNT</h5><h6>[price*quantity]</h6></th> 
          
        </tr>
<?php
    $host="localhost";
    $user="root";
    $password="";
    $db="petmart";
    $con=mysqli_connect($host,$user,$password,$db);
    $_SESSION["total"]=0;
    $fromdate=date('y,m,d');
        
        $run=mysqli_query($con,"select * from orders where email= '".$_SESSION["username"]."' and datetime ='".$fromdate."'");
  while($row=mysqli_fetch_array($run))
  { $_SESSION["ed"]=$row[0];
    $r1=$row[1];
    $r2=$row[2];
    $r3=$row[3];
    $r4=$row[4];
    $r5=$row[5];
    $_SESSION["quant"]=$row[6];
    $_SESSION['dt']=$row[7];
   
   
    $run1=mysqli_query($con,"select pricelist.price from orders,pricelist where pricelist.itemname='$r5'");
    while($row1=mysqli_fetch_array($run1))
    {
     $_SESSION["price"]=$row1['price'];
    }
    $_SESSION["amount"]=$_SESSION['quant']*$_SESSION["price"];
    $_SESSION["total"]+=$_SESSION["amount"];
    echo "<tr align='center'>
        
        <td>$r5</td>
        
        <td>&#8377; {$_SESSION['amount']}</td>
        <br>
         
         </tr>"  
   ;}
?>
      </table>
                                <div class="col-12 panel-footer basket-footer">
                                    <hr>
                                    <div class="row">
                                        <div class="col s8 align-right description"><div class="dive">Subtotal</div></div>
                                        <div class="col s10 align-right"><span class="emphasized"><?php echo  $_SESSION["total"];?></span></div>
                                        
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col s10 align-right description"><div class="dive">Total</div></div>
                                        <div class="col s10 align-right"><span class="very emphasized">&#8377;<?php echo  $_SESSION["total"];?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="row panel-wrapper">
                                <div class="col-12 panel-header creditcard-header">
                                    <div class="row">
                                        <div class="col-12 creditcard-title">
                                            <span class="description">please enter your</span><br><span class="emphasized">Credit Card Information</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 panel-body creditcard-body">
                                    <form action="thankyou.php" method="POST">
                                        <fieldset>
                                            <label for="card-name">Name on the Card</label><br>
                                            <i class="fa fa-user-o" aria-hidden="true"></i><input type='text' id='card-name' name='card-name' placeholder='John Doe' title='Name on the Card' required>
                                        </fieldset>
                                        <fieldset>
                                            <label for="card-number">Card Number</label><br>
                                            <i class="fa fa-credit-card" aria-hidden="true"></i><input type='text' id='card-number' name='card-number' placeholder='1234 5678 9123 4567' title='Card Number' required maxlength="16">
                                        </fieldset>
                                        <fieldset>
                                            <label for="card-expiration">Expiration Date</label><br>
                                            <i class="fa fa-calendar" aria-hidden="true"></i><input type='text' id='card-expiration' name='card-expiration' placeholder='MM/YY' title='Expiration' class="card-expiration" required>
                                        </fieldset>
                                        <fieldset>
                                            <label for="card-ccv">CVC/CCV</label>&nbsp;<i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="The CVV Number on your credit card or debit card is a 3 digit number on VISA, MasterCard and Discover branded credit and debit cards. On your American Express branded credit or debit card it is a 4 digit numeric code."></i><br>
                                            <i class="fa fa-lock" aria-hidden="true"></i><input type='text' id='card-ccv' name='card-ccv' placeholder='123' title='CVC/CCV' required maxlength="3">
                                        </fieldset>
                                    
                                </div>
                                <div class="col-12 panel-footer creditcard-footer">
                                    <div class="row">
                                        <div class="col-12 align-right"> <a class="waves-effect red darken-1 btn" href="main.php"><i class="material-icons left">cclear</i>CANCEL</a>&nbsp;<button class="btn waves-effect waves-light" type="submit" name="submit">SUBMIT?
                </button></div>
                </form>
             </div>
                       </div>
                   </div>
               </div>
            </div>
         </div>
        </div>  
      </div>
    </div>
</div>
    
    <script type="text/javascript">
    $( document ).ready ( function ()
{
    console.log ( 'ready!' );
    $('[data-toggle="tooltip"]').tooltip();
    var template = $( '#template' ).html ();
    Mustache.parse ( template );
    var rendered = Mustache.render ( template, get_basket () );
    $( '#template' ).html ( rendered );
    if ( $('.basket-body').hasScrollBar () )
    {
        $('.column-titles').addClass('fix-overflow');
        $('.basket-body').niceScroll({autohidemode: false,cursorcolor:"#ffffff",cursorborder:"1px solid #D0D0D0",cursorborderradius: "0",background: "#ffffff"});
    }
    else
    {
        $('.column-titles').removeClass('fix-overflow');
    }
    
    $('.card-expiration').datepicker({
    format: "mm/yyyy",
    startView: "months", 
    minViewMode: "months"        
});
});



//https://stackoverflow.com/questions/4814398/how-can-i-check-if-a-scrollbar-is-visible


(function($) {
    $.fn.hasScrollBar = function() {
        return this.get(0).scrollHeight > this.height();
    }
})(jQuery);

</script>
