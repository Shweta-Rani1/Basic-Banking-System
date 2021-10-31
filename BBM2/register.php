<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Register</title>


    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Gabriela&display=swap" rel="stylesheet">
</head>

<body>
    <?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "basicbanking";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if(!$conn){
		die("Could not connect to the database due to the following error: ".mysqli_connect_error());
	}    
    if(isset($_POST['name'],$_POST['email'],$_POST['balance'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $gender = $_POST['gender'];
        $balance=$_POST['balance'];
        $acc = rand(100000,1000000);
        $sql="INSERT INTO `register info` (`name`,`email`,`gender`,`balance`,`account`) VALUES ('$name','$email','$gender','$balance','$acc')";
        $result=mysqli_query($conn,$sql);

        //INSERT INTO `register info` (`name`, `email`, `gender`, `balance`, `account`) VALUES ('testname', '123sh@this.com', 'female', '2000', '263785934');
        if($result){
                   echo "<div class='alert alert-success alert-dismissible fade show hide' role='alert'>
                   <strong>Success!</strong> Your entry has been submitted successfully!
                   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                   <span class='errorClose' aria-hidden='true'>×</span>
                   </button>
                   </div>";
        }
    }else{
        echo "<div class='alert alert-danger alert-dismissible fade show hide' role='alert'>
        <strong>Error!</strong>We regret the inconvinience caused!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span class='errorClose' aria-hidden='true'>×</span>
        </button>
        </div>" ;
    }  

?>
<section class="login py-5 bg-light">
        <img src="images/menu.png" id="menuBtn">
        <div class="container pt-3">
            <div class="row g-0 pt-5">
                <div class=" ps-5 pt-5 mt-5 col-lg-5 ">
                    <img src="images/customers.png" class="img-fluid">
                </div>
                <div class="col-lg-7 text-center py5">
                    <h1>New User</h1>
                    <form action="register.php" method="post">
                        <div class="form-row py-3 pt-5">
                            <div class="offset-1 col-lg-10">
                                <input type="text" name="name" class="inp px-3" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-row pt-4">
                            <div class="offset-1 col-lg-10">
                                <input name="email" type="email" class="inp px-3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-row pt-5 ">
                            <div class="  offset-1 col-lg-10">
                                <select name="gender" class="inp px-3 form-selec " aria-label="Default select example">
                                    <option selected>Select Gender</option>
                                    <option value="F">Female</option>
                                    <option value="M">Male</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row pt-5 ">
                            <div class="offset-1 col-lg-10">
                                <input id="balance" name="balance" type="text" class="inp px-3" placeholder="Balance">
                            </div>
                        </div>
                        <div class="form-row pt-5 pb-5">
                            <div class="offset-1 col-lg-10">
                                <button type="submit" class="btn1">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
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

    <script>
        let menuBtn = document.querySelector('#connection');
        let sideNav = document.querySelector('#sideNav')
        let errorClose = document.querySelector('.errorClose')
        let hide = document.querySelector('.hide')
        let balance = document.querySelector('balance')

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

        errorClose.addEventListener('click', function () {
            hide.style.display = 'none'
        })

    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
        </script>



</body>

</html>