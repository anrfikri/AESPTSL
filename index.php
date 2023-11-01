<?php 
session_start();
include 'config.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="assets/images/kudus.png">
  <title>
  Halaman Login 
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/styles.css" rel="stylesheet" />
  <!-- Sweet Alert -->
  <link rel="stylesheet" type="text/css"  href="assets/css/sweetalert2.min.css" />
</head>

<body class="bg-gray-200">
  <section class="login-content">
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('assets/images/bg-login.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1">
                  <div class=" text-center">
                      <img src="assets/images/kudus.png" height="60px"><br>
                      <a class="text-white font-weight-bolder text-center"> AES PTSL <br> KEDUNGSARI</a>
                    </div>
                  
                </div>
              </div>
              <div class="card-body">
                <form class="login-form" action="auth.php" method="post">
                  <div class="form-group input-group input-group-outline my-3">
                    <label class="form-label">Username</label>
                    <input class="form-control" type="text" name="username"  required>
                  </div>
                  <div class="form-group input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" name="password"  required>
                  </div>
                  <!-- <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                  </div> -->
                  <div class="form-group text-center">
                    <button class="btn bg-gradient-info w-100 my-4 mb-2" name="login">MASUK</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="text-center text-sm text-white text-lg-start">
                <a>Storage and Security of PTSL Files Desa Kedungsari Kec.Gebog Kab.Kudus</a>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a class="nav-link text-white" href="#">Pemdes Kedungsari &copy; <?= date('Y'); ?></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  
</section>
<!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script src="./assets/js/styles.js"></script>
  <script src="./assets/js/jquery-2.1.4.min.js"></script>
  <script src="./assets/js/essential-plugins.js"></script>
  <script src="./assets/js/plugins/pace.min.js"></script>

  <!-- Sweet Alert -->
  <script src="./assets/js/sweetalert2.all.min.js"></script>
  <script src="./assets/js/myscript.js"></script>

  <!-- session Sweet Alert -->
  <?php if(@$_SESSION['eror_login']){ ?>
        <script>
            Swal.fire({title: 'Error',
              text: "<?php echo $_SESSION['eror_login']; ?>",
              icon: 'warning',
              showCancelButton: false,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'OK'});
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['eror_login']); } ?>
</body>

</html>