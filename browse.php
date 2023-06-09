<?php

include('./include/db.inc.php');
include('./include/header.php');
?>



<section>

    <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active movie_car">
                <img src="img/spider3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>SPIDERMAN: NO WAY HOME </h5>
                    <p>Genre : Action , Drama , Fantasy</p>
                </div>
            </div>
            <div class="carousel-item movie_car">
                <img src="img/it2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>IT : CHAPTER 2</h5>
                    <p>Genre : Horror , Drama</p>
                </div>
            </div>
            <div class="carousel-item movie_car">
                <img src="img/batman12.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>BATMAN</h5>
                    <p>Genre : Action , Drama , Aesthetic , Crime</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<!-- <td>". $row['id'] ." </td> -->
<section class="browse_movie_section">
    <div class="browse_movie_section_title">
        <h1>PLAYING NOW</h1>
    </div>

    <div class="movies_container">
        <?php
        $sql = "SELECT * FROM `movies` ";
        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $bg = $row['image'];
                    $date = $row['date'];
                    $mprice = $row['price'];
                    $date_pi= $row['ter_date'];
                    
                    echo '

                   
                <div class="movie-card">
                    <div class="movie-header" style="background-image: url(./admin/'. $bg . ');">
                        <div class="header-icon-container">
                            <a href="./movie.php?id='.$row['id'].'">
                                <i class="fa-solid fa-play"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="movie-content">
                        <div class="movie-content-header">
                            <a href="#">
                                <h3 class="movie-title">' . $row['title'] . '</h3>
                            </a>
                            <div class="imax-logo"></div>
                        </div>
                        <div class="movie-info">
                            <div class="info-section">
                                <label>Added at</label>
                                <span>' .$date. '</span>
                            </div><!--date,time-->
                            <div class="info-section">
                                <label>Ends Showing</label>
                                <span>' .$date_pi. '</span>
                            </div><!--date,time-->
                            <div class="info-section">
                                <label>Price</label>
                                <span>£'.$mprice.'</span>
                            </div>
                            <!-- <div class="info-section">
                                <label>Row</label>
                                <span>F</span>
                            </div> -->
                            <!-- <div class="info-section">
                                <label>Seat</label>
                                <span>21,22</span>
                            </div> -->
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



    </div>
    <!--container-->
</section>


<section class="newsletter_container flex">

    <div class="News-container flex flex_col gap_1">
        <div>
            <h1>Get update for the latest movies</h1>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary news_sub_button" type="button" id="button-addon2">Subscribe</button>
        </div>

    </div>
</section>



<?php
include('./include/footer.php');
?>