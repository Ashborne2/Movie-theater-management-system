<?php
ob_start();
include('./include/db.inc.php');
include('./include/header.php');
?>

<?php
$msg = "";
// If upload button is clicked ...
if (isset($_POST['Csubmit'])) {

    $Comment_Name = $_POST['ComName'];
    $Comment_Email = $_POST['ComEmail'];
    $thecomment = $_POST['thecomment'];
    if (empty($Comment_Name)) {
        $msg = '<div class="alert alert-danger" role="alert">Name Missing</div>';
    } elseif (empty($Comment_Email)) {
        $msg = '<div class="alert alert-danger" role="alert">Email Missing</div>';
    } elseif (empty($thecomment)) {
        $msg = '<div class="alert alert-danger" role="alert">Please, Write your comment</div>';
    } else {
        $sqlq = "INSERT INTO comment (name,email,comment) VALUES ('$Comment_Name', '$Comment_Email', '$thecomment' )";
        // execute query
        $result = mysqli_query($conn, $sqlq);
        if ($result) {
            $msg = '<div class="alert alert-success" role="alert">Commented</div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Failed to comment</div>';
        }
    }
}
?>

<section class="des">
    <div class="seperator">

        <?php

        $movie_id = $_GET['id'];

        $sqlqe = "SELECT * FROM `movies` where id ='$movie_id'";
        if ($resultre = mysqli_query($conn, $sqlqe)) {
            if (mysqli_num_rows($resultre) > 0) {
                while ($row = mysqli_fetch_array($resultre)) {
                    $bg = $row['image'];
                    $background = $row['background'];
                    $title = $row['title'];
                    $_SESSION['movie_name'] = $title;
                    $mprice = $row['price'];
                    $_SESSION['prise'] = $mprice;
                }
        ?>
                <div class="movie_card" id="bright">
                    <div class="info_section">
                        <div class="movie_header">
                            <img class="locandina" src="./admin<?php echo $bg ?>" />
                            <h1><?php echo $title ?></h1>
                            <h4>2017, Lorem</h4>
                            <span class="minutes">117 min</span>
                            <p class="type">Action, Crime, Fantasy</p>
                        </div>
                        <div class="movie_desc">
                            <p class="text">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus praesentium laborum qui suscipit ipsum error odit quia nisi quaerat culpa alias molestiae repudiandae, reiciendis veniam, corporis facilis aliquam vitae. Ab?
                            </p>
                        </div>
                        <div class="mprice">
                            Price: £<?php echo $mprice ?>
                        </div>
                        <div class="movie_social">
                            <ul>
                                <li><i class="fa-solid fa-share-from-square"></i></li>
                                <li><i class="fa-solid fa-heart"></i></li>
                                <li><i class="fa-solid fa-message"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="blur_back bright_back" style="background-image: url('./admin<?php echo $background ?>');"></div>
                </div>

        <?php
            } else {
                echo "No records matching your query were found.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

        ?>

    </div>

    <!-- time selection -->
    <div class="timing">
        <h2>Chose your time</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <!-- date -->
            <div class="timing_division">
                <h3>Chose the Day:</h3>
                <select name="movie_day" id="" class="form-select">
                    <option value="Sunday" class="opt">Sunday</option>
                    <option value="Monday" class="opt">Monday</option>
                    <option value="Tuesday" class="opt">Tuesday</option>
                    <option value="Wednesday" class="opt">Wednesday</option>
                    <option value="Thursday" class="opt">Thursday</option>
                    <option value="Friday" class="opt">Friday</option>
                    <option value="Saturday" class="opt">Saturday</option>
                </select>
            </div>

            <div class="timing_division flex flex_col justify_center">
                <h3>Chose the date:</h3>
                <input type="date" id="start" name="mov_sel_date" value="<?php echo date("Y-m-j");?>" min="<?php echo date("Y-m-j");?>" max="<?php echo date("Y-m-j", strtotime("+2 month"))?>" style="width: 200px;">

            </div>
            <!-- movie time -->
            <div class="timing_division">
                <h3>Chose the Time:</h3>
                <div class="middle">
                    <label>
                        <input type="radio" value="8:00" name="movie-time" checked />
                        <div class="front-end box">
                            <span>8:00</span>
                        </div>
                    </label>

                    <label>
                        <input type="radio" value="9:00" name="movie-time" />
                        <div class="back-end box">
                            <span>9:00</span>
                        </div>
                    </label>

                    <label>
                        <input type="radio" value="10:00" name="movie-time" />
                        <div class="back-end box">
                            <span>10:00</span>
                        </div>
                    </label>

                    <label>
                        <input type="radio" value="12:00" name="movie-time" />
                        <div class="back-end box">
                            <span>12:00</span>
                        </div>
                    </label>

                </div>

            </div>

            <div class="flex justify_center my-4">
                <button type="submit" name="btn_book" class="btn btn-primary">Book a seat</button>

            </div>
            <?php
            if (isset($_POST['btn_book'])) {

                // echo $_SESSION['movie-day_'];
                // echo  $_SESSION['movie-time_'];
                // echo  $_SESSION['mov_sel_date_'];
                
                if ($_SESSION['loggedin']) {
                    $_SESSION['movie-day_'] = $_POST['movie_day'];
                    $_SESSION['movie-time_'] = $_POST['movie-time'];
                    $_SESSION['mov_sel_date_'] = $_POST['mov_sel_date'];

                    header("Location:./seat.php");
                } else {
                    header("Location:./signup.php");
                }
            }
            ?>
        </form>
    </div>

</section>







<!-- comments -->
<section class="comment-box">

    <div id="feedback_section">
        <div class="comment_container flex">
            <div class="feedbacks">
                <h1>Comments</h1>



                <?php
                $sqlqw = "SELECT * FROM `comment` ";
                if ($resultshow = mysqli_query($conn, $sqlqw)) {
                    if (mysqli_num_rows($resultshow) > 0) {
                        while ($row = mysqli_fetch_array($resultshow)) {
                            $showcomment = $row['comment'];
                            $showcomment_name = $row['name'];
                            echo '

                        <div class="feedback flex">
                                <div class="feedback_user_img">
                                    <img src="./img/avater.jpg" alt="">
                                </div>

                            <div class="feedback_user_comment">
                                <h2>' . $showcomment_name . '</h2>
                                <p>' . $showcomment . '</p>
                            </div>
                        </div>';
                        }
                    } else {
                        echo "No records matching your query were found.";
                    }
                } else {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
                ?>

            </div>


            <!-- leave a comment section -->
            <div class="comment_form">
                <h1>Leave a Comment</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <?php
                    echo $msg;
                    ?>
                    <div class="input_row flex">
                        <input type="text" name="ComName" id="" placeholder="Name*">
                        <input type="email" name="ComEmail" id="" placeholder="Email*">
                    </div>
                    <textarea name="thecomment" id="" cols="30" rows="10" placeholder="Message*"></textarea>

                    <button type="submit" class="post_btn" name="Csubmit">Send</button>

                </form>
            </div>
        </div>
    </div>

</section>

<?php
ob_flush();
include('./include/footer.php');
?>