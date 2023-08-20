<html>
<head>
    <!-- <title>Display</title>
    <style>
        body
        {
            /* background: #D071f9; */
            background: rgb(70,130,180);
        }
        table
        {
            background-color: white;
        }
    </style> -->
    <title>Ordered Item List</title>
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
//student address - login
//student marks -  review
// Create connection by passing these connection parameters
$conn = new mysqli($servername, $username, $password, $dbname);
// echo "inner join on login : ";
// echo "<br>";
// echo "<br>";
// //sql query to display all student_address table based on student id using  inner join
// $sql = "SELECT  * from login INNER JOIN review on login.email=review.emailid";
// $result = $conn->query($sql);
// //display data on web page
// while($row = mysqli_fetch_array($result)){
//     echo " EMAIL-ID : ". $row['email'], " ----- FNAME : ". $row['fname'] ," ----- ADDRESS : ". $row['address'] ;
//     echo "<br>";
// }
  
// echo "<br>";
// echo "inner join on review: ";
// echo "<br>";
// echo "<br>";
// //sql query to display all student_marks  table based on student id using  inner join
// $sql1 = "SELECT  * from review INNER JOIN login on login.email=review.emailid";
// $result1 = $conn->query($sql1);
// //display data on web page
// while($row = mysqli_fetch_array($result1)){
//     echo " EMAIL-ID : ". $row['emailid'], " ----- REVIEWS : ". $row['reviews'] ," -----COMMENT : ". $row['radio'] ;
//     echo "<br>";
      
// }
  
$query = "SELECT fname,mobile,itemname from orders where email in(select email from login where login.email = email)";

// $result = $conn->query($sql);
$data = mysqli_query($conn,$query);
//while($row= mysqli_fetch_assoc($result)){
    // echo '<tr>';
  //  echo '<td>'. $row['id'].'</td>';
    //echo '/tr> ';
//}
// $record = mysqli_fetch_array($result);

// print_r($record);

$total = mysqli_num_rows($data);





//echo $result;
if($total != 0)
{
    ?>

    <h2 align="center">Ordered Item List</h2>
<center><table border="1" cellspacing="7" width="50">
        <tr>
        <th width="5%">FNAME</th>
        <th width="5%">MOBILE</th>
        <th width="5%">ITEMNAME</th>
        </tr>
    <?php
    while($result = mysqli_fetch_assoc($data))
    {
        echo "<tr>
            <td>".$result['fname']."</td>
            <td>".$result['mobile']."</td>
            <td>".$result['itemname']."</td>
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