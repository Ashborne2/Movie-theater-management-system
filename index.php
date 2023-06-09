<?php
// session_start();
ob_start();
include('./include/db.inc.php');
include('./include/header.php');
?>




<!-- slider -->
<section>
    <div class="containerpt-5">
        <H2>Newest Popular Show</H2>
        <div class="row">
            <div class="col-12">
                <div class="slick">
                    <div class="slideitem">
                        <div class="bg" style="background-image:url(img/batman10.jpg)"></div>
                    </div>
                    <div class="slideitem">
                        <div class="bg" style="background-image:url(img/endgame.png)"></div>
                    </div>
                    <div class="slideitem">
                        <div class="bg" style="background-image:url(img/kong.jpg)"></div>
                    </div>
                    <div class="slideitem">
                        <div class="bg" style="background-image:url(img/sonic2.jpg)"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


<!-- upcoming moivies -->

<section class="upcoming-movie">
    <div class="title">
        <h1>
            Now Playing
        </h1>
    </div>
    <div class="options">
        <a href="#" class="btn active"> Now Playing</a>
        <a href="#" class="btn"> Upcoming Movies</a>
        <a href="#" class="btn"> Best of library</a>
    </div>
    <div class="Upcoming_movie_section flex">



        <?php
        $sql = "SELECT * FROM `movies` LIMIT 8 ";
        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $bg = $row['image'];
                    $date = date_create($row['date']);
                    $mprice = $row['price'];
                    echo '

                    <div class="cardi">
                    <a href="./movie.php?id='.$row['id'].'" class="movie_image">
                        <img src="./admin/' . $bg . '" alt="">
                    </a>
                    <div class="movie_info flex">
                        <div class="movie_info_content">
                            <p>' . $row['title'] . '</p>
                            <span>Drama , Action</span>
                            <div><span>£'.$mprice.' </span></div>
                            <div class="flex rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                        <div class="">
                            <a href="" class="btn_book">
                                <i class="fa-solid fa-cart-arrow-down"></i>
                            </a>
                        </div>
                    </div>
                </div>

            ';
                }
            } else {
                echo "No records matching your query were found.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        ?>




        <!-- <div class="cardi">
                <div class="movie_image">
                    <img src="img/spider.jpg" alt="">
                </div>
                <div class="movie_info flex">
                    <div class="movie_info_content">
                        <p>Blusting </p>
                        <span> drama & action</span>
                        <div class="flex rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <div class="">
                        <a href="" class="btn_book">
                            <i class="fa-solid fa-cart-arrow-down"></i>
                        </a>
                    </div>
                </div>
            </div> -->
    </div>
    <div class="browse_all_button flex">
        <!-- <button>Hello</button> -->
        <a href="./browse.php"> Browse All</a>
    </div>
</section>



<!-- single poster -->
<section class="single_poster">
    <div class="play_btn_upper">
        <a class="play-btn" id="play-btn" href="#"></a>
    </div>


    <div id="video-overlay" class="video-overlay">
        <!-- <a class="video-overlay-close">&times;</a> -->
        <a class="video-overlay-close">
            <button type="button" class="btn-close btn-close-white" aria-label="Close"></button>
        </a>
    </div>

</section>




<!-- pricing section -->
<section id="pricing-table">
    <div class="price-box-container">
        <?php

        if (isset($_SESSION['loggedin'])) {
            $query = "SELECT * FROM `membership` WHERE user_name='" . $_SESSION['username'] . "'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                echo ('<script>document.getElementById("pricing-table").style.display = "none";</script>');
            } else {
                if (isset($_POST['silver_btn'])) {
                    $sql1 = "INSERT INTO `membership` (user_name,plan) VALUES ('" . $username . "','Silver')";
                    $result1 = mysqli_query($conn, $sql1);
                    header("Refresh:0");
                }
                if (isset($_POST['gold_btn'])) {
                    $sql2 = "INSERT INTO `membership` (user_name,plan) VALUES ('" . $_SESSION['username'] . "','Gold')";
                    $result2 = mysqli_query($conn, $sql2);
                    header("Refresh:0");
                }
                if (isset($_POST['diamond_btn'])) {
                    $sql3 = "INSERT INTO `membership` (user_name,plan) VALUES ('" . $_SESSION['username'] . "','Diamond')";
                    $result3 = mysqli_query($conn, $sql3);
                    header("Refresh:0");
                }
        ?>
                <form method="post" class="flex">
                    <div class="price-box">
                        <div class="box-top-section">
                            <div class="plan-name">
                                <strong>Silver</strong>
                                <span>Small Benefits</span>
                            </div>
                            <div class="price-section">
                                <strong class="price">
                                    <span>$</span>
                                    <strong>16</strong>
                                    <span>/mo</span>
                                </strong>
                            </div>
                            <span class="per-month">or <strong>$19</strong> month-to-month</span>
                        </div>
                        <div class="box-features-section">
                            <div class="features-box">
                                <i class="fas fa-check"></i>
                                <span>Early notification</span>
                                <div class="feature-details">
                                    <p>Your Will be Notified Earlier than the Normal customers</p>
                                </div>
                            </div>
                            <div class="features-box">
                                <i class="fas fa-check"></i>
                                <span>Get 5% discount</span>
                                <div class="feature-details">
                                    <p>You Will get 5% discount in all movies that are playing.</p>
                                </div>
                            </div>
                            <div class="features-box">
                                <span></span>
                                <div class="feature-details">
                                    <p></p>
                                </div>
                            </div>
                            <div class="features-box">
                                <span></span>
                                <div class="feature-details">
                                    <p></p>
                                </div>
                            </div>

                            <button class="Choose-plan-btn" name="silver_btn" value="Silver">Choose Plan <i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                    <div class="price-box popular">
                        <div class="box-top-section">
                            <div class="top-bar">
                                <span>Popular</span>
                            </div>
                            <div class="plan-name">
                                <strong>Gold</strong>
                                <span>Medium Benefits</span>
                            </div>
                            <div class="price-section">
                                <strong class="price">
                                    <span>$</span>
                                    <strong>23</strong>
                                    <span>/mo</span>
                                </strong>
                            </div>
                            <span class="per-month">or <strong>$23</strong> month-to-month</span>
                        </div>
                        <div class="box-features-section">
                            <div class="features-box">
                                <i class="fas fa-check"></i>
                                <span>Get 15% Discount</span>
                                <div class="feature-details">
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt vel necessitatibus totam illum animi! Soluta nulla assumenda, laboriosam minima,</p>
                                </div>
                            </div>
                            <div class="features-box">
                                <i class="fas fa-check"></i>
                                <span>Get middle sit</span>
                                <div class="feature-details">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis dignissimos laudantium cum labore, aperiam tempora dolor.</p>
                                </div>
                            </div>
                            <div class="features-box">
                                <i class="fas fa-check"></i>
                                <span>Early Notification</span>
                                <div class="feature-details">
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut quibusdam ullam optio ipsam quidem laudantium voluptas perferendis</p>
                                </div>
                            </div>
                            <div class="features-box">
                                <i class="fas fa-check"></i>
                                <span>Premium hall access</span>
                                <div class="feature-details">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam facilis illum veritatis quae, provident vitae nobi..</p>
                                </div>
                            </div>

                            <!-- <a href="#" class="Choose-plan-btn">Choose Plan <i class="fas fa-chevron-right"></i></a> -->
                            <button class="Choose-plan-btn" name="gold_btn" value="Gold">Choose Plan <i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                    <div class="price-box">
                        <div class="box-top-section">
                            <div class="plan-name">
                                <strong>Diamond</strong>
                                <span>Massive Benefits</span>
                            </div>
                            <div class="price-section">
                                <strong class="price">
                                    <span>$</span>
                                    <strong>45</strong>
                                    <span>/mo</span>
                                </strong>
                            </div>
                            <span class="per-month">or <strong>$45</strong> month-to-month</span>
                        </div>
                        <div class="box-features-section">
                            <div class="features-box">
                                <i class="fas fa-check"></i>
                                <span>Get 30% discount</span>
                                <div class="feature-details">
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad sint minus quos beatae nobis est ullam in. Asperiores alias placeat provident excepturi molestias.</p>
                                </div>
                            </div>
                            <div class="features-box">
                                <i class="fas fa-check"></i>
                                <span>sadasdsa</span>
                                <div class="feature-details">
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis necessitatibus nam dicta delectus aliquam vel tempora molestiae quo architecto aliquid eum cupiditate saepe eius</p>
                                </div>
                            </div>
                            <div class="features-box">
                                <i class="fas fa-check"></i>
                                <span>Ticketing system</span>
                                <div class="feature-details">
                                    <p>Secure 256-bit SSL encryption for website visitors and agents connecting to your LiveChat.</p>
                                </div>
                            </div>

                            <div class="features-box">
                                <i class="fas fa-check"></i>
                                <span>Multiple brandings</span>
                                <div class="feature-details">
                                    <p>All your chats will be stored in the archives.</p>
                                </div>
                            </div>
                            <button class="Choose-plan-btn" name="diamond_btn" value="Diamond">Choose Plan <i class="fas fa-chevron-right"></i></button>
                            <!-- <a href="#" class="Choose-plan-btn">Choose Plan <i class="fas fa-chevron-right"></i></a> -->
                        </div>
                    </div>
                </form>

            <?php
            }
        } else {
            ?>

            <div class="price-box">
                <div class="box-top-section">
                    <div class="plan-name">
                        <strong>Silver</strong>
                        <span>Small Benefits</span>
                    </div>
                    <div class="price-section">
                        <strong class="price">
                            <span>$</span>
                            <strong>16</strong>
                            <span>/mo</span>
                        </strong>
                    </div>
                    <span class="per-month">or <strong>$19</strong> month-to-month</span>
                </div>
                <div class="box-features-section">
                    <div class="features-box">
                        <i class="fas fa-check"></i>
                        <span>Early notification</span>
                        <div class="feature-details">
                            <p>Your Will be Notified Earlier than the Normal customers</p>
                        </div>
                    </div>
                    <div class="features-box">
                        <i class="fas fa-check"></i>
                        <span>Get 5% discount</span>
                        <div class="feature-details">
                            <p>You Will get 5% discount in all movies that are playing.</p>
                        </div>
                    </div>
                    <div class="features-box">
                        <span></span>
                        <div class="feature-details">
                            <p></p>
                        </div>
                    </div>
                    <div class="features-box">
                        <span></span>
                        <div class="feature-details">
                            <p></p>
                        </div>
                    </div>

                    <a href="./signup.php" class="Choose-plan-btn" name="" value="Silver">Choose Plan
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
            <div class="price-box popular">
                <div class="box-top-section">
                    <div class="top-bar">
                        <span>Popular</span>
                    </div>
                    <div class="plan-name">
                        <strong>Gold</strong>
                        <span>Medium Benefits</span>
                    </div>
                    <div class="price-section">
                        <strong class="price">
                            <span>$</span>
                            <strong>23</strong>
                            <span>/mo</span>
                        </strong>
                    </div>
                    <span class="per-month">or <strong>$23</strong> month-to-month</span>
                </div>
                <div class="box-features-section">
                    <div class="features-box">
                        <i class="fas fa-check"></i>
                        <span>Get 15% Discount</span>
                        <div class="feature-details">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nesciunt vel necessitatibus totam illum animi! Soluta nulla assumenda, laboriosam minima,</p>
                        </div>
                    </div>
                    <div class="features-box">
                        <i class="fas fa-check"></i>
                        <span>Get middle sit</span>
                        <div class="feature-details">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis dignissimos laudantium cum labore, aperiam tempora dolor.</p>
                        </div>
                    </div>
                    <div class="features-box">
                        <i class="fas fa-check"></i>
                        <span>Early Notification</span>
                        <div class="feature-details">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut quibusdam ullam optio ipsam quidem laudantium voluptas perferendis</p>
                        </div>
                    </div>
                    <div class="features-box">
                        <i class="fas fa-check"></i>
                        <span>Premium hall access</span>
                        <div class="feature-details">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam facilis illum veritatis quae, provident vitae nobi..</p>
                        </div>
                    </div>

                    <!-- <a href="#" class="Choose-plan-btn">Choose Plan <i class="fas fa-chevron-right"></i></a> -->
                    <a href="./signup.php" class="Choose-plan-btn" name="" value="Gold">Choose Plan <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <div class="price-box">
                <div class="box-top-section">
                    <div class="plan-name">
                        <strong>Diamond</strong>
                        <span>Massive Benefits</span>
                    </div>
                    <div class="price-section">
                        <strong class="price">
                            <span>$</span>
                            <strong>45</strong>
                            <span>/mo</span>
                        </strong>
                    </div>
                    <span class="per-month">or <strong>$45</strong> month-to-month</span>
                </div>
                <div class="box-features-section">
                    <div class="features-box">
                        <i class="fas fa-check"></i>
                        <span>Get 30% discount</span>
                        <div class="feature-details">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad sint minus quos beatae nobis est ullam in. Asperiores alias placeat provident excepturi molestias.</p>
                        </div>
                    </div>
                    <div class="features-box">
                        <i class="fas fa-check"></i>
                        <span>Get access to the VIP Hall</span>
                        <div class="feature-details">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis necessitatibus nam dicta delectus aliquam vel tempora molestiae quo architecto aliquid eum cupiditate saepe eius</p>
                        </div>
                    </div>
                    <div class="features-box">
                        <i class="fas fa-check"></i>
                        <span>Ticketing system</span>
                        <div class="feature-details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati qui deleniti modi, minus consequatur a, vitae tene</p>
                        </div>
                    </div>

                    <div class="features-box">
                        <i class="fas fa-check"></i>
                        <span>Live chat Option</span>
                        <div class="feature-details">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, distinctio repellendus? Magnam nisi quod hic ab rerum! Neque soluta vitae corrupti voluptates, veritatis beatae, nulla sunt quibusdam sed nesciunt et.</p>
                        </div>
                    </div>
                    <a href="./signup.php" class="Choose-plan-btn" name="" value="Diamond">Choose Plan <i class="fas fa-chevron-right"></i></a>
                    <!-- <a href="#" class="Choose-plan-btn">Choose Plan <i class="fas fa-chevron-right"></i></a> -->
                </div>
            </div>

        <?php
        }
        ?>







    </div>
</section>



<!-- footer -->
<?php
ob_flush();
include('./include/footer.php');
?>