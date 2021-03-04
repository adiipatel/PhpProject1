<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/all.min.css" class="css">                          <!--FONT AWESOME-->
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>        <!--ROBOTO Font--> 
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>    <!--Montserrat Font-->
    <link href='https://fonts.googleapis.com/css?family=Trispace' rel='stylesheet'>    <!--Trispace Font--> 
    <link href='https://fonts.googleapis.com/css?family=Nanum+Myeongjo' rel='stylesheet'>    <!--Nanum Myeongjo Font--> 
    <link href='https://fonts.googleapis.com/css?family=Heebo' rel='stylesheet'>    <!--Heebo Font-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Book Store</title>
</head>
<body>
    <header>                                                                            
        <div class="logo">                                                              <!--LOGO -->
            <span>BOOK</span> <h1>Store</h1> 
        </div>

        <div class="menu">                                                               <!--MENU -->
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="store.php">Books</a></li>
                </ul>
        </div>
    </header>

    <div class="container">
        <?php
        session_start();
        if(isset($_GET['name'])) {
            $_SESSION['name'] = $_GET['name'];
            $bookname = $_SESSION['name']; 
            echo "<h3 id='bname'>{$bookname}</h3>
                <span id='bs'>BEST SELLER!</span>";
        }
        
        ?>

        <form action="checkout.php" method="POST" style=" font-size:1.4em; padding: 2em 0 0 3.4em;">
        
            <label for="fname">First Name :</label>
            <input type="text" id="fname" name="fname" value="<?php echo isset($_POST['fname']) ? ($_POST['fname']) : ''; ?>"><br><br>

            <label for="lname">Last Name :</label>
            <input type="text" id="lname" name="lname" value="<?php echo isset($_POST['lname']) ? ($_POST['lname']) : ''; ?>"><br><br>

            <label for="pay">Payment Method :</label>
            <select name="payment" id="payment">
                <option name="debit" value="<?php echo isset($_POST['debit']) ? ($_POST['debit']) : ''; ?>">DEBIT</option><br><br>
                <option name="credit" value="<?php echo isset($_POST['credit']) ? ($_POST['credit']) : ''; ?>">CREDIT</option><br><br>
                <option name="cash" value="<?php echo isset($_POST['cash']) ? ($_POST['cash']) : ''; ?>">CASH</option><br><br>
            </select>
            <input type="submit" value="SUBMIT">

        </form>
        <h4 id="result" style="font-size: 1.3em; padding: 1em 0 0 3.3em;"></h4>
        <a href="store.php"><button style="font-size: 16px; margin: 0.5em 0 0 5em; background-color: #112b52;  cursor: pointer; border: none; color: white; padding: 20px;text-align: center;">Back to Store ?</button></a>
    </div>

    <footer>
        <div class="copyright">
            <p>&#169; 2002 - 2021. The BOOKStore</p>
            <a href="">Privacy Policy</a>
            <a href="">Terms and Conditions</a>
        </div>
    </footer>

</body>
</html>

<?php
require("mysqli_connect.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $bookname = $_SESSION['name'];
    $error = false;

    if((empty($_POST['fname']))  ||  (empty($_POST['lname'])) ||  (!isset($_POST['payment']))){
        echo "<script>
                    document.getElementById('result').innerHTML='Some fields are empty! Re-submit form.';
                    document.getElementById('result').style.color = 'red';
                    document.getElementById('bname').innerHTML='Error! Please Try Again.';
                    document.getElementById('bs').innerHTML='';
                </script>";
        $error = true;	
    }

    if($error == false){
            echo "<script>
                    document.getElementById('result').innerHTML='Order is placed Successfully!';
                    document.getElementById('result').style.color = 'green';
                    document.getElementById('bname').innerHTML='Thank You for buying!';
                    document.getElementById('bs').innerHTML='';
                </script>";

            $fname = mysqli_real_escape_string($dbc, $_POST['fname']);
            $lname = mysqli_real_escape_string($dbc, $_POST['lname']);
            $payment = mysqli_real_escape_string($dbc, $_POST['payment']);
            $user_data = "INSERT INTO bookinventoryorder(firstname,lastname,paymentoption,bookname) VALUES ('$fname','$lname','$payment','$bookname')";
            $new_quantity = "UPDATE bookinventory SET quantity=quantity-1 WHERE bookname='$bookname'";
            mysqli_query($dbc, $user_data);
            mysqli_query($dbc, $new_quantity);

    }
}

?>