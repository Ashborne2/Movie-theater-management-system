<?php
// $page="upload";
include('./include/db.inc.php');
// include('./include/header.php');
include('./include/admin_header.php');
?>


<?php



$msg = "";

// If upload button is clicked ...
if (isset($_POST['imgsubmit'])) {

    $moive_name =$_POST['movie_title'];
    $moive_time =$_POST['uploaded_time'];
    $moive_price =$_POST['movie_price'];
    
    $image_name = $_FILES['formFile']['name'];
    $image_file = $_FILES['formFile']['tmp_name'];

    $image_bac = $_FILES['form2ndFile']['name'];
    $image_file2 = $_FILES['form2ndFile']['tmp_name'];
    // image file directory
    $target = "./imgUpload/" . ($image_name);
    move_uploaded_file($image_file, $target);

    $target2 = "./imgUpload/". ($image_bac);
    move_uploaded_file($image_file2, $target2);

    if (empty($moive_name)) {
        $msg = '<div class="alert alert-danger" role="alert">Please enter an movie name!!</div>' ;
    }
    elseif ($_FILES['formFile']['size'] == 0) {
        $msg = '<div class="alert alert-danger" role="alert">No file was selected for uploading card, Please select a file</div>' ;
    }
    elseif ($_FILES['form2ndFile']['size'] == 0) {
        $msg = '<div class="alert alert-danger" role="alert">No file was selected for uploading background, Please select a file</div>' ;
    } 
    else {
        $sql = "INSERT INTO movies (title,image,background,date,price,ter_date) VALUES ('$moive_name', '$target', '$target2', '$moive_time','$moive_price','".$_POST['end_date']."' )";
        // execute query
       $result= mysqli_query($conn, $sql);
        if ($result) {
            $msg = '<div class="alert alert-success" role="alert">Image uploaded successfully</div>' ;
        } else {
            $msg = '<div class="alert alert-danger" role="alert">Failed to upload image</div>' ;
        }
    }
}

?>




<section class="upload_section flex">

    <h1>Upload Movie Information</h1>
    <form class="row g-3 upload_form"  method="post" enctype="multipart/form-data">
    <?php
        echo $msg ;
    ?>
        <div class="col-sm-5 col-md-6 qoqoqo">
            <label for="inputEmail4" class="form-label">Movie Name</label>
            <input type="text" class="form-control" id="inputEmail4" name="movie_title">
        </div>


        <div class="col-sm-5 col-md-6 qoqoqo">
            <label for="formFile" class="form-label">Choose a image to upload for Card:</label>
            <input class="form-control" type="file" id="formFile" name="formFile">
        </div>

        <div class="col-sm-5 col-md-6 qoqoqo">
            <label for="form2ndFile" class="form-label">Choose a image to upload for logo background:</label>
            <input class="form-control" type="file" id="form2ndFile" name="form2ndFile">
        </div>

        <!-- <div class="col-sm-5 col-md-6 qoqoqo">
            <label for="form3rdFile" class="form-label">Choose a image to upload for logo background:</label>
            <input class="form-control" type="file" id="form3rdFile" name="form3rdFile">
        </div> -->

        <div class="col-sm-5 col-md-6 qoqoqo">
            <label for="inprice" class="form-label">Price</label>
            <input type="number" class="form-control" id="inprice" name="movie_price">
        </div>

        <div class="col-sm-5 col-md-6 qoqoqo">
            <label for="daytime">Arrived in:</label>
            <input type="date" value="<?php echo date("Y-m-j");?>" min="<?php echo date("Y-m-j");?>" max="<?php echo date("Y-m-j", strtotime("+2 month"))?>" id="daytime" name="uploaded_time">
        </div>

        <div class="col-sm-5 col-md-6 qoqoqo">
            <label for="daytime">Terminates at:</label>
            <input type="date" value="2022-06-25" min="2022-06-25" max="2022-08-26" id="daytime" name="end_date">
        </div>

        <div class="col-sm-5 col-md-6 qoqoqo">
            <button type="submit" class="btn btn-primary" name="imgsubmit">Submit</button>
        </div>
    </form>

</section>

<?php
// include('./include/footer.php');
include('./include/admin_footer.php');
?>