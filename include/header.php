<?php
session_start();

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Management system</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha512-iQQV+nXtBlmS3XiDrtmL+9/Z+ibux+YuowJjI4rcpO7NYgTzfTOiFNm09kWtfZzEB9fQ6TwOVc8lFVWooFuD/w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="sweetalert2.min.css">

    <link rel="stylesheet" href="css.css">
</head>

<body>
    <nav>
        <div class="nav flex">
            <input type="checkbox" id="nav-check">
            <div class="nav-header">
                <!-- <div class="nav-title">
                    RR Movies
                </div> -->
                <a class="navbar-brand nav-title" href="./index.php" >
                    <img src="./img/navlogo2.JPG" alt="" width="35" height="40" class="d-inline-block align-text-top navlogo">
                    RR Movies
                </a>
            </div>


            <div class="nav-btn">
                <label for="nav-check">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
            </div>

            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="about.php">About Us</a>
                <a href="contact.php">Contact us</a>
                <a href="browse.php">Browse</a>
                
                <?php 
                if(isset($_SESSION['loggedin'])){

                    if($_SESSION['Role'] == 'cus'){
                        echo'<a href="customer.php">Profile</a>';
                    }
                  
                }
                ?>
            </div>


            <div class="seeerch flex">

            <?php
            if (isset($_SESSION['username'])) {
                // echo $_SESSION['username'];
              echo'
              <p class="fst-italic loggedinname">'.$_SESSION['username'].'</p>';
            }

                        if (!isset($_SESSION['loggedin'])) {
                            echo'
                            <a href="./signup.php" class="btn btn-light">Login</a>';
                        }else{
                            echo'<a href="./logout.php" class="btn btn-light">Logout</a>';
                           //$gfdg='<a href="customer.php">Customer</a>';
                        }

                
                        

                        
            ?>

<!-- 
            <a href="./signup.php" class="btn btn-light">Login</a>
            <a href="./logout.php" class="btn btn-light">Logout</a> -->
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="nav_search_btn" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>