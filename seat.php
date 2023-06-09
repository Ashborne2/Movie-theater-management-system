<?php
// require_once './domfdp/src/Autoloader.php';
include('./include/db.inc.php');
include('./include/header.php');
?>


<?php

$erer = $_SESSION['username'];
$ashol_price = $_SESSION['prise'];

$sqlin = "SELECT * FROM `membership` WHERE user_name='" . $erer . "'";

$res = mysqli_query($conn, $sqlin);

//match  

if ($res) {
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_array($res);
            $muser = $row['user_name'];
            $bgi = $row['plan'];
            
            if ($bgi == 'Silver') {
                $cal = $ashol_price - (5 / 100) * $ashol_price;
            } 
            elseif ($bgi == 'Gold') {
                $cal = $ashol_price - (15 / 100) * $ashol_price;
            } 
            elseif ($bgi == 'Diamond') {
                $cal = $ashol_price - (30 / 100) * $ashol_price;
            }
            else{

            }

    } else {
        $cal = $ashol_price;
        
    }
} 
?>




<section class="seat_section_wrapper">
    <form method="post" class="flex gap_2">
        <div class="seat_title">
            <h2>Book a seat</h2>

            <div class="whole_seat_background">

                <div class="row warp">

                    <?php
                    for ($i = 1; $i <= 49; $i++) {
                        echo '<div class="seat">
                        <input type="radio" value="' . $i . '" name="seat_no" class="sel che" id="che' . $i . '">
                            <label for="che' . $i . '" class="lightup">' . $i . '</label>
                        </div>
                    ';
                    }
                    ?>
                </div>

                <?php

                if (isset($_POST['btn_confirm'])) {


                    // echo $_SESSION['movie-day_'];
                    // echo  $_SESSION['movie-time_'];
                    // echo $_SESSION['username'];
                    // echo $_POST['payment_'];
                    // echo $_POST['seat_no'];
                    // echo $_SESSION['movie_name'];





                    $sql11 = "INSERT INTO `booking` (`movie_name`, `user_name`, `seat_num`, `time_slot`, `date`, `paid`, `method`,`date_picked`) VALUES ('" . $_SESSION['movie_name'] . "', '" . $_SESSION['username'] . "', '" . $_POST['seat_no'] . "', '" . $_SESSION['movie-time_'] . "', '" . $_SESSION['movie-day_'] . "', '" . $cal . "', '" . $_POST['payment_'] . "','" . $_SESSION['mov_sel_date_'] . "')";


                    $result1 = mysqli_query($conn, $sql11);

                    if ($result1) {
                        echo '<div class="alert alert-success" role="alert">Payment successfull! </div>';
                        // header("refresh:3;url=index.php");
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Somthing want worng! </div>';
                    }
                }
                ?>

            </div>
        </div>


        <div class="form-body">
            <div class="row">
                <div class="form-holder">
                    <div class="form-content">
                        <div class="form-items">
                            <h3>Purchase Informantion</h3>
                            <p>Please Check Your Information and select the correct payment method</p>
                            <form class="requires-validation" novalidate>

                                <div class="col-md-12">
                                    <input class="form-control" type="text" value="<?php echo $_SESSION['username'] ?>" name="name" placeholder="Full Name" disabled>
                                </div>

                                <div class="col-md-12">
                                    <input class="form-control" type="email" value="<?php echo $_SESSION['user_email'] ?>" name="email" placeholder="E-mail Address" disabled>
                                </div>

                                <div class="col-md-12">
                                
                                    <input class="form-control" type="text" value="Discounted Price: £<?php echo $cal ?>" name="name" id="floatingInputValue" placeholder="" disabled>
                            
                                </div>

                                <div class="col-md-12">
                                    <select class="form-select mt-3" name="payment_">
                                        <option selected disabled value="">Please Select Your Payment Method</option>
                                        <option value="Credit Card">Credit Card</option>
                                        <option value="Master Card">Master Card</option>
                                        <option value="Paypal">Paypal</option>
                                    </select>
                                </div>

                                <!-- <div class="col-md-12 mt-3">
                                    <label class="mb-3 mr-1" for="gender">Want snacks:</label>

                                    <input type="radio" class="btn-check" name="gender" id="yes" autocomplete="off">
                                    <label class="btn btn-sm btn-outline-secondary" for="yes">Yes</label>

                                    <input type="radio" class="btn-check" name="gender" id="no" autocomplete="off">
                                    <label class="btn btn-sm btn-outline-secondary" for="no">No</label>
                                </div> -->

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck">
                                    <label class="form-check-label">I confirm that all data are correct</label>
                                </div>


                                <div class="form-button mt-3">
                                    <button id="submit" type="submit" name="btn_confirm" class="btn btn-primary">Confirm Payment</button>
                                    <a href="./index.php" class="btn btn-primary">Cancel</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </form>
</section>
<?php
ob_flush();
include('./include/footer.php');
?>




