<?php
$page = 'admin_home';
include('../include/db.inc.php');
include('./include/admin_header.php');




?>

<style>
  .counter {
    padding: 22px 20px;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
    color: rgb(240, 48, 86);
  }

  .counter .count-data {
    margin-top: 10px;
    margin-bottom: 10px;
  }

  .counter .count {
    font-weight: 700;
    color: #20247b;
    margin: 0 0 5px;
  }

  .counter p {
    font-weight: 600;
    margin: 0;
  }
</style>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="my-3">Welcome To Dashboard </h1>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->




  <div class="counter">
    <div class="row">
      <div class="col-6 col-lg-3">
        <div class="count-data text-center">
          <h6 class="count h2" data-to="500" data-speed="500">500</h6>
          <p class="m-0px font-w-600">Total work hour</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="count-data text-center">
          <h6 class="count h2" data-to="150" data-speed="150">
            <?php

            $qu_movie1 = "SELECT * FROM `movies`";

            $qu_movie1_result = mysqli_query($conn, $qu_movie1);

            echo mysqli_num_rows($qu_movie1_result);
            ?>
          </h6>
          <p class="m-0px font-w-600">Total movie playing now</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="count-data text-center">
          <h6 class="count h2" data-to="850" data-speed="850">

            <?php

            $sum = "SELECT SUM(paid) as sums FROM `booking`";

            $sum_result = mysqli_query($conn, $sum);

            while ($row77 = mysqli_fetch_assoc($sum_result)) {
              echo number_format((float)$row77['sums'], 2, '.', '');;
            }
            ?>
          </h6>
          <p class="m-0px font-w-600">Total Earning</p>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="count-data text-center">
          <h6 class="count h2" data-to="190" data-speed="190">
            <?php

            $qu1 = "SELECT * FROM `booking`";

            $qu_result = mysqli_query($conn, $qu1);

            echo mysqli_num_rows($qu_result);
            ?>
          </h6>
          <p class="m-0px font-w-600">Total ticket Sold</p>
        </div>
      </div>
    </div>
  </div>







  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <div class="col-md-12">


      <!-- TABLE -->
      <div class="card">
        <div class="card-header border-transparent">
          <h1 class="card-title"><strong class="text-primary">Movie Sold</strong></h1>

          <div class="card-footer clearfix">
            <button class="aa btn btn-sm btn-secondary float-right">Print</button>
          </div>
        </div>


        <!-- /.card-header -->
        <div class="card-body py-2">
          <div class="table-responsive">
            <!-- Student Table -->
            <table class="table m-0 table-hover" id="std">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Movie Title</th>
                  <th>Customer Name</th>

                  <th>Seat Number</th>
                  <th>Show Time</th>
                  <th>Day</th>
                  <th>Paid</th>
                  <th>Payment Method</th>
                  <!-- <th>Date of birth</th> -->
                  <!-- <th>Edit</th> -->
                </tr>
              </thead>
              <tbody>
                <?php
                $sqlq1w = "SELECT * FROM `booking`";
                if ($resultshow32 = mysqli_query($conn, $sqlq1w)) {
                  if (mysqli_num_rows($resultshow32) > 0) {
                    //       $sn=1;
                    while ($row = mysqli_fetch_array($resultshow32)) {
                      echo '
                                <tr>
                                <td>' . $row['id'] . '</td> 
                                <td>' . $row['movie_name'] . '</td>  
                                <td>' . $row['user_name'] . '</td>
                                <td>' . $row['seat_num'] . '</td>  
                                <td>' . $row['time_slot'] . '</td>  
                                <td>' . $row['date'] . '</td>  
                                <td>' . $row['paid'] . '</td> 
                                <td>' . $row['method'] . '</td>                   

                            </tr>
                                 ';
                      //             $sn++;

                    }
                  }
                } else {
                  echo "No records matching your query were found.";
                }
                ?>

              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <a href="./students.php" class="btn btn-sm btn-secondary float-right">View All</a>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->


    </div>
  </div>
</div>
</section>
<!-- /.content -->
</div>





<?php
include('./include/admin_footer.php');

?>