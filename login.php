<?php

if (@$_SESSION['siswa']) {
  header('dasboard.php');
} else if (@$_SESSION['guru']) {
  header('guru.php');
} else {
  @session_start();
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style3.css">

    <!--===============================================================================================-->
  </head>

  <body>
    <?php
    if (@$_GET['page'] == "simpan") {
      echo
      '<script type="text/javascript">
              alert("Register Berhasil \n Silahkan Anda Login !");
          </script>';
    }
    ?>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <form class="login100-form validate-form" enctype="multipart/form-data" method="" action="proses_log.php">
            <span class="login100-form-title p-b-26">
              <br />Login
            </span>
            <span class="login100-form-title p-b-48">
              <i class="zmdi zmdi-font"></i>
            </span>

            <div class="wrap-input100 validate-input">
              <input class="input100" type="text" name="username" placeholder="Username" required />

            </div>

            <div class="wrap-input100 validate-input">

              <input class="input100" type="password" placeholder="Password" name="password" required />

            </div>

            <div class="container-login100-form-btn">
              <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn" name="login">
                  Login
                </button>
              </div>
            </div>

            <div class="text-center p-t-115">
              <span class="txt1">
                Don’t have an account?
              </span>

              <a class="txt2" href="daftar.php">
                Sign Up
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>


    <div id="dropDownSelect1"></div>
  </body>

  </html>

<?php
}
?>