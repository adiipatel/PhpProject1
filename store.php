<?php
    require("mysqli_connect.php");
?>
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

    <div class="book-info">
            <div class="book-heading">
                <h2>Books available</h2>
                <span></span>
                <a href="#">Find out more<i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="book-cards">
                <?php
                $query = "SELECT * FROM bookinventory";
                $result = @mysqli_query($dbc, $query);
            
                while ($card = mysqli_fetch_array($result)) {
                echo "<div class='card'>
                        <img src=\"{$card['img']}\" alt=''>
                        <h4>{$card['bookname']}</h4>
                        <span></span>
                        <a href='checkout.php?name={$card['bookname']}'>In-stock: {$card['quantity']}</a>
                    </div>";
                }
                ?>
            </div>
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