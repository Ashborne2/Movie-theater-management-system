<?php

include('./include/db.inc.php');
include('./include/header.php');

?>

<style>
    body {
        color: #6F8BA4;
    }

    .section {
        padding: 100px 0;
        position: relative;
    }

    .gray-bg {
        background-color: #f5f5f5;
    }

    img {
        max-width: 100%;
    }

    img {
        vertical-align: middle;
        border-style: none;
    }

    /* About Me 
---------------------*/
    .about-text h3 {
        font-size: 45px;
        font-weight: 700;
        margin: 0 0 6px;
    }

    @media (max-width: 767px) {
        .about-text h3 {
            font-size: 35px;
        }
    }

    .about-text h6 {
        font-weight: 600;
        margin-bottom: 15px;
    }

    @media (max-width: 767px) {
        .about-text h6 {
            font-size: 18px;
        }
    }

    .about-text p {
        font-size: 18px;
        max-width: 450px;
    }

    .about-text p mark {
        font-weight: 600;
        color: #20247b;
    }

    .about-list {
        padding-top: 10px;
    }

    .about-list .media {
        padding: 5px 0;
    }

    .about-list label {
        color: #20247b;
        font-weight: 600;
        width: 88px;
        margin: 0;
        position: relative;
    }

    .about-list label:after {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        right: 11px;
        width: 1px;
        height: 12px;
        background: #20247b;
        -moz-transform: rotate(15deg);
        -o-transform: rotate(15deg);
        -ms-transform: rotate(15deg);
        -webkit-transform: rotate(15deg);
        transform: rotate(15deg);
        margin: auto;
        opacity: 0.5;
    }

    .about-list p {
        margin: 0;
        font-size: 15px;
    }

    @media (max-width: 991px) {
        .about-avatar {
            margin-top: 30px;
        }
    }

    .about-section .counter {
        padding: 22px 20px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
    }

    .about-section .counter .count-data {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .about-section .counter .count {
        font-weight: 700;
        color: #20247b;
        margin: 0 0 5px;
    }

    .about-section .counter p {
        font-weight: 600;
        margin: 0;
    }

    mark {
        background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
        background-size: 100% 3px;
        background-repeat: no-repeat;
        background-position: 0 bottom;
        background-color: transparent;
        padding: 0;
        color: currentColor;
    }

    .theme-color {
        color: #fc5356;
    }

    .dark-color {
        color: #20247b;
    }



    .cus_table {
        background-color: #ffffff;
        color: black;
        justify-content: center;

    }

    .table-responsive {
        width: 60%;
    }

    .table-responsive h2 {
        font-family: poppins;
        padding: 20px;
    }
</style>

<section class="section about-section gray-bg" id="about">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-lg-6">
                <div class="about-text go-to">
                    <h3 class="dark-color">Customer Dashboard</h3>
                    <h6 class="theme-color lead"><?php echo $_SESSION['username'] ?></h6>
                    <div class="row about-list">
                        <div class="col-md-6">
                            <div class="media">
                                <label>Birthday</label>
                                <p>4th april 1998</p>
                            </div>
                            <div class="media">
                                <label>Address</label>
                                <p>California, USA</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="media">
                                <label>E-mail</label>
                                <p>info@domain.com</p>
                            </div>
                            <div class="media">
                                <label>Phone</label>
                                <p>820-885-3321</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-avatar">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" title="" alt="">
                </div>
            </div>
        </div>
        <div class="counter">
            <div class="row">
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="500" data-speed="500">500</h6>
                        <p class="m-0px font-w-600">Total Ticket bought</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="150" data-speed="150">
                            <?php
                            $gh = $_SESSION['username'];

                            $sql4 = "SELECT * FROM `membership` where user_name='$gh' ";
                            if ($result4 = mysqli_query($conn, $sql4)) {

                                while ($row = mysqli_fetch_array($result4)) {
                                    echo $row['plan'];
                                }
                            }
                            ?>
                        </h6>
                        <p class="m-0px font-w-600">Membership Plan</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="850" data-speed="850">850</h6>
                        <p class="m-0px font-w-600">Total watched</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="190" data-speed="190">TBA</h6>
                        <p class="m-0px font-w-600">TBA</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cus_table flex">

    <div class="table-responsive">
        <h2>Ticket purchase history</h2>
        <table class="table table-centered table-nowrap mb-0 rounded">
            <thead class="thead-light">
                <tr>
                    <th class="border-0 rounded-start">Movie Name</th>
                    <th class="border-0">Day</th>
                    <th class="border-0 rounded-end">Seat</th>
                    <th class="border-0 rounded-end">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `booking` WHERE user_name='" . $_SESSION['username'] . "'";
                if ($result = mysqli_query($conn, $sql)) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo '
                                <tr>
                                    <td class="border-0">
                                        <div><span class="h6">' . $row['movie_name'] . '</span></div>
                                    </td>
                                    <td class="border-0 font-weight-bold">' . $row['date'] . '</td>
                                    <td class="border-0 font-weight-bold">' . $row['seat_num'] . '</td>
                                    <td class="border-0 font-weight-bold">' . $row['date_picked'] . '</td>
                                </tr>
                            ';
                    }
                }
                ?>

                <!-- End of Item -->
            </tbody>
        </table>
    </div>
</section>


















<?php
include('./include/footer.php');
?>