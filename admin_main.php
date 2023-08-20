<?php
session_start();
?>
<html lang="en">
<head>
<a href="form.php" >Item Details</a>
<a href="form1.php" >/Ordered Item list</a>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <title>MANAGER PAGE</title>
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
    <nav class="nav-wrapper black lighten-3">
      <div class="container">
        <a href="#" class="brand-logo"><img src="logonew.jpg" height="60em" width="120em"></a</a>
        <ul class="right hide-on-med-and-down">
         <li><a href="resp.php" class="tooltipped btn-floating btn-small black" data-position="bottom" data-tooltip="User Reviews"> 
            <i class="material-icons">drafts</i></a></li>
            <li><a href="login_log.php" class="tooltipped btn-floating btn-small black" data-position="bottom" data-tooltip="LOGOUT"> 
            <i class="material-icons">directions_run</i></a></li>
      </div>
    </nav>
  </header>

<!--order table-->   
<div id="Bookings" class="tabcontent">
  <h2 class="center-align" >ORDERS</h2>
  <div align="center">
  <table border="2" width="1300" class="striped 
                black-text centered" >
      <tr>
          <th class="center-align"><h5>ORDER ID</h5><br>  </th>  
          <th class="center-align"><h5>ITEM NAME</h5><br> </th> 
          <th class="center-align"><h5>QUANTITY</h5><br></th>
          <th class="center-align"><h5>EMAIL</h5><br>  </th> 
          <th class="center-align"><h5>USER NAME</h5><br>  </th> 
          <th class="center-align"><h5>PHONE</h5><br>  </th>   
          <th class="center-align"><h5>ADDRESS</h5><br> </th>
          <th class="center-align"><h5>DATE</h5><br></th>
        </tr> 
<?php
        $host="localhost";
        $user="root";
        $password="";
        $db="petmart";
        $con=mysqli_connect($host,$user,$password,$db);
        
        //CALLING THE STORED PROCEDURE 'orderDisplay()' and printing the orders table
        
        $run=mysqli_query($con,"CALL `orderDisplay`();");
        while($row=mysqli_fetch_array($run))
        {   $r0=$row[0];
            $r1=$row[1];
            $r2=$row[2];
            $r3=$row[3];
            $r4=$row[4];
            $r5=$row[5];
            $r6=$row[6];
            $r7=$row[7];
    echo "<tr align='center'>
        <td>$r0</td>
        <td>$r5</td>
        <td>$r6</td>
        <td>$r1</td>
        <td>$r2</td>
        <td>$r3</td>
        <td>$r4</td>
        <td>$r7</td>
         </tr>"  
   ;}
?>
      </table>     
    </div>   
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
    });
 </script>
</body>
</html>