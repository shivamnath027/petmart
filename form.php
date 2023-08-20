<html>
<head>
    <!-- <title>Display</title>
    <style>
        body
        {
            /* background: #D071f9; */
            background: 	rgb(135,206,250);
        }
        table
        {
            background-color: white;
        }
    </style> -->


    <title>Item Details</title>
    <style>
        body
        {
            /* background: #D071f9; */
            background:	rgb(173,216,230);
        }
        table
        {
            background-color: white;
        }
    </style>



<html lang="en">
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
    
    <body>
    <header> 
    <nav class="nav-wrapper black lighten-3">
      <div class="container">
        <a href="#" class="brand-logo"><img src="logonew.jpg" height="60em" width="120em"></a</a>
        <ul class="right hide-on-med-and-down">
         <!-- <li><a href="resp.php" class="tooltipped btn-floating btn-small black" data-position="bottom" data-tooltip="User Reviews"> 
            <i class="material-icons">drafts</i></a></li> -->
            <!-- <li><a href="logout.php" class="tooltipped btn-floating btn-small black" data-position="bottom" data-tooltip="LOGOUT"> 
            <i class="material-icons">directions_run</i></a></li> -->
      </div>
    </nav>
  </header>


</head>
</head>
</html>

<?php
$servername = "localhost";
//username
$username = "root";
//empty password
$password = "";
//database is the database name
$dbname = "petmart";

$conn = new mysqli($servername, $username, $password, $dbname);

$query = "SELECT * FROM `orders` RIGHT OUTER JOIN `pricelist` ON orders.itemname = pricelist.itemname";

// $result = $conn->query($sql);
$data = mysqli_query($conn,$query);


$total = mysqli_num_rows($data);





//echo $result;
if($total != 0)
{
    ?>

    <h2 align="center">ITEM DETAILS</h2>
<center><table border="1" cellspacing="7" width="50">
        <tr>
        <th width="5%">ID</th>
        <th width="5%">EMAIL</th>
        <th width="5%">FNAME</th>
        <th width="5%">MOBILE</th>
        <th width="5%">ADDRESS</th>
        <th width="5%">ITEMNAME</th>
        <th width="5%">QUANTITY</th>
        <th width="5%">DATETIME</th>
        <th width="5%">ITEMNAME</th>
        <th width="5%">PRICE</th>
        </tr>
    <?php
    while($result = mysqli_fetch_assoc($data))
    {
        echo "<tr>
            <td>".$result['id']."</td>
            <td>".$result['email']."</td>
            <td>".$result['fname']."</td>
            <td>".$result['mobile']."</td>
            <td>".$result['address']."</td>
            <td>".$result['itemname']."</td>
            <td>".$result['quantity']."</td>
            <td>".$result['datetime']."</td>
            <td>".$result['itemname']."</td>
            <td>".$result['price']."</td>
        </tr>
        ";
    }
}
else
{
    echo "No records Found";
}

//print_r($result)
//close the connection
  
//$conn->close();
?>
</table></center>