<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Gabriela&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href= "style.css">
</head>
<body>
<div style="font-family: 'Gabriela', serif;   font-size: 40px;
    text-align: center;
    margin: 20px;">Bank Users</div>
    <table>
        <tr>
        <th>Sender's Name</th>
        <th>Sender's Account</th>
        <th>Reciever's Name</th>
        <th>Reciever's Account </th>
        <th>Amount</th>
        <th>Date and Time</th>
        </tr>
    <?php
     session_start();
     $server = "localhost";
     $username = "root";
     $password = "";
     $conn = mysqli_connect($server, $username, $password, "basicbanking");
     
     if (!$conn) {
       die("Connection failed".mysqli_connect_error());
 
     }
    
     $sql = "SELECT * FROM `transfer`";
     $result = mysqli_query($conn, $sql);
     $num = mysqli_num_rows($result);
     

     if($num > 0){
    
        while($row = mysqli_fetch_assoc($result)){
            // echo var_dump($row);
            // $row = mysqli_num_rows($result);
            echo "<tr>";
            echo "<td>" . $row["sender"]. "</td><td>". $row["sen_acc"]. "</td><td>" . $row["receiver"] . "</td><td>" . $row["rec_acc"] . "</td><td>"  . $row["amount"] . "</td><td>"  . $row["created_by"]."</td>";
            echo "</tr>";
            }
            
    }
    echo "</table>";
    
?> 
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

    <!-- <img src="images/menu.png" id="menuBtn"> -->
    <section id="features">
        <div class="feature-row">
            <div class="feature-col">
                <img src="images/Customer-service-culture.jpg">
                <a href="users.php"> <button class="button">Bank Users</button></a>
            </div>
            <div class="feature-col">
                <img src="images/transactions.png"><h4></h4>
                <a href="history.php"><button class="button">Transaction History</button></a>
            </div>
            <div class="feature-col">
                <img src="images/transferMoney.png">
                <a href="details.php"><button class="button">Transfer Money</button></a>
            </div>
        </div>
    </section>
    <footer>
    
        <div class="follow">
          <h3 style="color: blue; font-family: 'Baloo Bhai 2', cursive; font-size: 25px;">Follow Us</h3>
          <div class="social">
            <a href="#facebook" class="facebook">
              <i class="fa fa-facebook"></i>
            </a>
            <a href="#twitter" class="twitter">
              <i class="fa fa-twitter"></i>
            </a>
            <a href="https://www.linkedin.com/in/shweta-rani-54bb11206/" class="linkedin">
              <i class="fa fa-linkedin"></i>
            </a>
            <a href="#instagram" class="instagram">
              <i class="fa fa-instagram"></i>
            </a>
          </div>
        </div>
        <p class="text-copy">
          Copyright &copy; 2021 Made by <b>Shweta Rani</b> <br> For the Project of  <b>The Sparks Foundation</b>
        </p>
    </footer>
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
    </script>
    </table>
</body>
</html>