<?php
// session_start();
ob_start();
include("./include/db.inc.php");
include('./include/header.php');
?>

<?php
if (isset($_POST['submit'])) {

  // validating if input fileds are empty.
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (empty($username)) {
    echo "<div class='alert alert-danger'>Fieldes cannot be empty</div>"; //If empty the show error

  } elseif (empty($password)) {
    echo "<div class='alert alert-danger'>Fieldes cannot be empty</div>";
  } else {
    $password = md5($password); // making password md5

    $query = "SELECT * FROM `customer` WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    //counting how many times user trying to log in 
    if (!isset($_SESSION['counter'])) {
      $_SESSION['counter'] = 0;
    }
    // if button is pressed, increment counter
    if (isset($_POST['submit'])) {
      $_SESSION['counter']++;
    }

    if ($_SESSION['counter'] == 3) {
      setcookie('logfail', 'false', time() + 600);
      $_SESSION['counter'] = 0;
    } else {


      if (mysqli_num_rows($result) == 1) {
        echo "<div class='alert alert-success'>ok</div>";
        $row = mysqli_fetch_array($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['loggedin'] = true;
        $_SESSION['Role'] = $row['user_type'];

        header("Location: ./admin/admin_index.php");

        if ($_SESSION['Role'] == 'adm') {
          header("Location: ./admin/admin_index.php");
          unset($_SESSION['counter']);
        }
        if ($_SESSION['Role'] == 'cus') {
          header("Location: ./index.php");
          unset($_SESSION['counter']);
        }

        if ($_SESSION['Role'] == 'emp') {
          header("Location: ./admin/admin_index.php");
          unset($_SESSION['emp']);
        }
      } else {
        echo "<div class='alert alert-danger'>Username or Password is incorrect</div>";
        $_SESSION['loggedin'] = false;
      }
    }
  }
}




?>



<Section class="signup_wrapper">
  <div class="form">
    <!--login form start-->
    <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <i class="fa-solid fa-circle-user"></i>

      <input class="user-input" type="text" name="username" placeholder="Username">
      <input class="user-input" type="password" name="password" placeholder="Password">
      <div class="options-01">
        <label class="remember-me"><input type="checkbox" name="">Remember me</label>
        <a href="#">Forgot your password?</a>
      </div>

      <?php
      if (isset($_COOKIE['logfail'])) {

        echo "<div class='alert alert-danger'>This account is locked for 10min</div>";
      } else {
        echo '<input class="btn" type="submit" name="submit" value="LOGIN">';
      }



      ?>




      <!--<<<<<<<<<<<<<<<<<<<<<<<<<login page>>>>>>>>>>>>>>>>>>>>>>>>>>>> -->



      <div class="options-02">
        <p>Not Registered? <a href="#">Create an Account</a></p>
      </div>
    </form>
    <!--login form end-->

    <!--signup form start-->
    <form class="signup-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <i class="fa-solid fa-user-plus"></i>
      <input class="user-input" type="text" name="RegUsername" placeholder="Username" required>
      <input class="user-input" type="email" name="email" placeholder="Email Address" required>
      <input class="user-input" type="password" name="RegPassword" placeholder="Password" required>
      <select class="user-input" name="user_type" id="user_type">
        <option value="emp">Employee</option>
        <option value="cus">Customer</option>
        <option value="adm">Admin</option>
      </select>

      <input class="btn" type="submit" name="sign_submit" value="SIGN UP">
      <div class="options-02">
        <p>Already Registered? <a href="#">Sign In</a></p>
      </div>

      <?php

      if (isset($_POST['sign_submit'])) {

        $Regusername_ = $_POST['RegUsername'];
        $email = $_POST['email'];
        $RegPassword_ = $_POST['RegPassword'];
        $user_type = $_POST['user_type'];


        $hashpass = md5($RegPassword_);

        if (empty($Regusername_) || empty($email) || empty($RegPassword_) || empty($user_type)) {
          echo '
                            <div class="alert alert-danger" role="alert">
                              Please fill all the fields!
                            </div>
                          ';
        }

        $queryqw = "SELECT * FROM  customer  WHERE username='$Regusername_' LIMIT 1";
        $resultqw = mysqli_query($conn, $queryqw);
        $row1 = mysqli_num_rows($resultqw);
        if ($row1 == 1) {
          // echo "<div class='alert alert-danger'></div>";

          echo '<script language="javascript">';
          echo 'alert("User Name Already Taken")';
          echo '</script>';
        } else {

          $sql1 = "INSERT INTO `customer` (`username`, `email`, `password`, `user_type`) VALUES ('" . $Regusername_ . "','" . $email . "' , '" . $hashpass . "' ,'" . $user_type . "')";


          $result1 = mysqli_query($conn, $sql1);

          if ($result1) {
            echo '
                            <div class="alert alert-success" role="alert">
                              Account created successfully!
                            </div>
                          ';
          } else {
            echo '
                            <div class="alert alert-danger" role="alert">
                              Something went wrong!
                            </div>
                          ';
          }
        }
      }



      ?>



    </form>
    <!--signup form end-->
  </div>
</Section>
<!--form area start-->

<!--form area end-->



<?php
include('./include/footer.php');
ob_end_flush();

?>