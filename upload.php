<?php
include('./include/db.inc.php');
// include('./include/header.php');
include('./admin/include/admin_header.php');
?>

<?php


$msg = "";

// If upload button is clicked ...
if (isset($_POST['imgsubmit'])) {

    $moive_name =$_POST['movie_title'];
    $moive_time =$_POST['uploaded_time'];
    
    $image_name = $_FILES['formFile']['name'];
    $image_file = $_FILES['formFile']['tmp_name'];
    // image file directory
    $target = "./imgUpload/" . ($image_name);
    move_uploaded_file($image_file, $target);

    if (empty($moive_name)) {
        $msg = '<div class="alert alert-danger" role="alert">Please enter an movie name!!</div>' ;
    }
    elseif ($_FILES['formFile']['size'] == 0) {
        $msg = '<div class="alert alert-danger" role="alert">No file was selected for upload, Please select a file</div>' ;
    } 
    else {
        $sql = "INSERT INTO movies (title,image,date) VALUES ('$moive_name', '$target', '$moive_time' )";
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
    
    <form class="row g-3 upload_form"  method="post" enctype="multipart/form-data">
    <?php
        echo $msg ;
    ?>
        <div class="col-sm-5 col-md-6">
            <label for="inputEmail4" class="form-label">Movie Name</label>
            <input type="text" class="form-control" id="inputEmail4" name="movie_title">
        </div>


        <div class="col-sm-5 col-md-6">
            <label for="formFile" class="form-label">Choose a image to upload:</label>
            <input class="form-control" type="file" id="formFile" name="formFile">
        </div>

        <div class="col-sm-5 col-md-6">
            <label for="birthdaytime">Added:</label>
            <input type="datetime-local" id="birthdaytime" name="uploaded_time">
        </div>

        <div class="col-sm-5 col-md-6">
            <button type="submit" class="btn btn-primary" name="imgsubmit">Submit</button>
        </div>
    </form>

</section>

<?php
// include('./include/footer.php');
?>