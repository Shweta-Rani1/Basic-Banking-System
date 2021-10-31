<?php
session_start();
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"basicbanking");
if(!$con){
    die("Connection failed");
} 
$flag=false;

if (isset($_POST['transfer']))
{
$sender=$_POST['sender'];
$receiver=$_POST["reciever"];
$amount=$_POST["amount"];

// echo ($sender);
// echo ($receiver);
// echo ($amount);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer of Money</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <!-- <script src="jquery.min.js" type="text/javascript"></script>
	<script src="popper.min.js" type="text/javascript"></script>
	<script src="sweetalert.min.js" type="text/javascript"></script> -->
    <!-- <link ref="@(Url.Content("path of css"))" rel="stylesheet"> -->
    

    <style>
body{
  background-color:#2b67f8; 
}
@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
  
}

@media screen and (max-width: 400px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
        </script>
</body>
</html>
<?php

//  die;

//  echo $sender;
//  die;
$sql = "SELECT balance FROM register info WHERE name='$sender'";
$result = $con->query($sql);
//  echo $result->num_rows;
if ($result->num_rows > 0) {
  echo "";
  // output data of each row
          while($row = $result->fetch_assoc()) {
 if($amount>$row["balance"] or $row["balance"] + $amount < 100){
  $location='details.php?register info='.$sender;
  header("Location: $location&message=transactionDenied");
 }
else{
    $sql = "UPDATE `register info` SET balance=(balance-$amount) WHERE Name='$sender'";
    

if ($con->query($sql) === TRUE) {
  $flag=true;
} else {
  echo "Error in updating record: " . $conn->error;
}
 }
 
  }
} else {
  echo "NOT FOUND!!";
} 

if($flag==true){
$sql = "UPDATE `register info` SET balance=(balance+$amount) WHERE name='$receiver'";

if ($con->query($sql) === TRUE) {
  $flag=true;  
  
} else {
  echo "Error in updating record: " . $con->error;
}
}
if($flag==true){
    $sql = "SELECT * from register info where name='$sender'";
    $result = $con-> query($sql);
    while($row = $result->fetch_assoc())
     {
      $sen_acc=$row['account'];
 }
//  Transaction Detailed Stored in the DB

 $sql = "SELECT * from register info where name='$receiver'";
 $result = $con-> query($sql);
 while($row = $result->fetch_assoc())
  {
    $rec_acc=$row['account'];
} 
    echo $sender; 
    echo $receiver; 
    echo $sen_acc; 
    echo $amount;           
$sql = "INSERT INTO `transfer`(sender,sen_acc,receiver,rec_acc,amount) VALUES ('$sender','$sen_acc','$receiver','$rec_acc','$amount')";
if ($con->query($sql) === TRUE) {
} else 
{
  echo "Error updating record: " . $con->error;
}
}

if($flag==true){
  $location='details.php?register info='.$sender;
  header("Location: $location&message=success");//for redirecting it to detail page with message
}
?>
