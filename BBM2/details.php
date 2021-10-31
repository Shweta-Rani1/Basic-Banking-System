<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database table</title>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Gabriela&display=swap" rel="stylesheet">
    <link rel="stylesheet" href= "style.css">
</head>

<body>
  <?php
   if (isset($_GET['id'])) {
echo"<table>
        <tr>
            <th>Account Number</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Balance</th>
        </tr>";
   }
  ?>
<?php
    session_start();
    $server = "localhost";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($server, $username, $password, "basicbanking");
    
    if (!$conn) {
      die("Connection failed");

    }
    if(isset($_GET['id'])){
    $_SESSION['id'] = $_GET['id'];
    $_SESSION['name'] = $_GET['name'];
    $_SESSION['sender'] = $_SESSION['id'];
    }
?>
<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $name = $_GET['name'];
        $sql = "SELECT * FROM register info WHERE id='$id'";

      $result = mysqli_query($conn, $sql);

      
      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";

        echo "<td>". $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["balance"] . "</td>";

        echo "</tr>";
        
      }
    }
?>
<div style="font-family: 'Gabriela', serif;  font-size: 40px;
            text-align: center; margin: 20px;">Transaction</div>
        <!-- <h3> Send Money to Loved Ones : )</h3> -->
        </div>
        <div class="card container">
<?php
    
    if (isset($_GET['message']) && $_GET['message'] == 'success') {
        echo "<h2><p style='color:green;' class='messagehide'>Transaction was completed successfully</p></h2>";
      }
      if (isset($_GET['message']) && $_GET['message'] == 'transactionDenied') {
        echo "<h3><p style='color:red;' class='messagehide'>Transaction Failed </p></h3>";
      }
?>
      <form action="transfer.php" method="POST">

        
        <b>Sender</b>&nbsp&nbsp&nbsp: &nbsp&nbsp
        <select name="sender" id="dropdown" class="textbox" required>
          
 <?php
         if(isset($_GET['id'])){
             echo "<option>".$name."</option>";

          }else{
            $db = mysqli_connect("localhost", "root", "", "basicbanking");
            $res = mysqli_query($db, "SELECT * FROM `register info` ");
            
          echo ("<option>Select Payee</option>");
          while ($row = mysqli_fetch_array($res)) {
           
            echo ("<option> " . "  " . $row['name'] . "</option>");
          }
        }
    ?>
    
        </select>
        <br><br>
        <b>Reciever</b>&nbsp&nbsp&nbsp:&nbsp&nbsp
        <select name="reciever" id="dropdown" class="textbox" required>
          <option>Select Recipient</option>
 <?php
 if(isset($_GET['id'])){
    $db = mysqli_connect("localhost", "root", "", "basicbanking");
    $res = mysqli_query($db, "SELECT * FROM register info WHERE id!='$id' ");
    while ($row = mysqli_fetch_array($res)) {
    echo ("<option> " . "  " . $row['name'] . "</option>");

 }
}else{
          $db = mysqli_connect("localhost", "root", "", "basicbanking");
          $res = mysqli_query($db, "SELECT * FROM `register info` ");
          while ($row = mysqli_fetch_array($res)) {
          echo ("<option> " . "  " . $row['name'] . "</option>");
        }
    }
    ?>
    
  </select>
<!--             
            <b> From</b>&nbsp&nbsp&nbsp&nbsp :&nbsp&nbsp <span style="font-size:1.2em;"><input id="myinput"
                    name="sender" class="textbox" disabled type="text" value=''></input></span>
            <br><br>
         -->
         
        <br><br>

            <b>Amount :  &#8377;</b>
            <input name="amount" type="number" min="100" class="textbox" required>
            <br><br>
            
            <a href="transfer.php"><button id="transfer" class="button" name="transfer" ;>Transfer Money</button></a>
            </form>
        </div>

        <div style="font-family: 'Gabriela', serif;   font-size: 40px;
        text-align: center;
        margin: 20px; ">
        <?php
        if(isset($_GET['id']))
        {
         echo "<h3>Customer Details</h3>";
        }
          ?>
        </div>
        <nav id="sideNav">
        <ul>
            <li><a href="index.html">HOME</a></li>
            <li><a href="users.php">EXISTING USERS</a></li>
            <li><a href="history.php">PASSBOOK</a></li>
            <li><a href="details.php">TRANSFER MONEY</a></li>
            <li><a href="register.html">NEW USER</a></li>
        </ul>
        </nav>
        <div id="connection">
            <img src="images/menu.png" id="menuBtn">
        </div>

        
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

        <script>
            let menuBtn = document.querySelector('#connection');
            let sideNav = document.querySelector('#sideNav')

            let condition = true;

            menuBtn.addEventListener('click', function () {
                if (condition) {
                    sideNav.style.right = '0px';
                    condition = false;
                } else {
                    sideNav.style.right = '-250px';
                    condition = true;
                }
            })
            $(function() {
            setTimeout(function() {
            $('.messagehide').fadeOut('slow');
            }, 3000);
            });
            $(".messagehide").click(function () {
    $(this).val('Please wait..');
    $(this).attr('disabled', true);
    setTimeout(function() { 
        $(this).attr('disabled', false);
        $(this).val('Submit');
    }, 3000);
});
        </script>
    </table>
</body>
</html>