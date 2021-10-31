<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Users</title>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Gabriela&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>

<body>
    
<div style="font-family: 'Gabriela', serif;   font-size: 40px;
    text-align: center;
    margin: 20px;">Bank Users</div>
    <table>
        <tr>
            <th>User Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Balance</th>
            <th>Details</th>
        </tr>
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
        <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "basicbanking";

$conn = mysqli_connect($servername, $username, $password, $dbname);
//  echo "hello" ;
if(!$conn){
    die("Could not connect to the database due to the following error: ".mysqli_connect_error());
}

$sql = "SELECT * FROM `register info`";
$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);

if($num>0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo '<form method ="post" action = "details.php">';
        echo "<td>" . $row["id"]. "</td><td>". $row["name"]. "</td><td>" . $row["email"] . "</td><td>" . $row["gender"] . "</td><td>"  . $row["balance"] . "</td>";
        echo "<td ><a href='details.php?id={$row["id"]}&name={$row["name"]}&message=no' type='button' name='user'  id='users1' >  <span>Transfer</span></a></td>";
        echo "</tr>";
}
echo "</table>";
}
?>

<footer>
    
    <div class="follow">
      <h3 style="color: black; font-family: 'Baloo Bhai 2', cursive; font-size: 25px;">Follow Us</h3>
      <div class="social">
        <a href="#facebook" class="facebook">
          <i class="fa fa-facebook"></i>
        </a>
        <a href="#twitter" class="twitter">
          <i class="fa fa-twitter"></i>
        </a>
        <a href="https://www.linkedin.com/in/shweta-rani-54bb11206" class="linkedin">
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