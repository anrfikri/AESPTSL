<!-- Sidebar -->
<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" " target="_blank">
        <center><span class="font-weight-bold text-white">AES PTSL</span></center>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100 ps" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item" >
          <a class="nav-link text-white " href="index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <?php
            $v = $_SESSION['username'];
            $query = mysqli_query($koneksi,"SELECT * FROM users WHERE username='$v'");
            $users = mysqli_fetch_array($query);
            if ($users['status'] == 'admin') {
              echo '<li class="nav-item ">
          <a class="nav-link text-white " href="daftar_file.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Daftar File Enkripsi Dekripsi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="decrypt.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">File Siap Download</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="daftar_user.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Daftar User</span>
          </a>
        </li>';
            }elseif ($users['status'] == 'user') {
              echo '<li class="nav-item ">
          <a class="nav-link text-white " href="daftar_file.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Daftar File Enkripsi Dekripsi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="decrypt.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">File Siap Download</span>
          </a>
        </li>';
            }else {
              echo "";
            }
             ?>
        
        
        
      </ul>
    </div>
    <hr class="horizontal light mt-0 mb-2">

    <div class="sidenav-footer position-absolute w-100 bottom-1 ">
      <!-- <center><div class="text-sm justify-content">Backup dan pengamanan pada file Pendaftaran Tanah Sistematis Lengkap (PTSL) Desa Kedungsari dengan algoritma AES-128</div></center> -->
      <div class="mx-2">
        <div class="bg-gradient-info shadow-primary border-radius-lg pt-0 pb-0">
        <div class="user-panel text-white">
            <div class="pull-left image">
              <img class="img-circle" src="../assets/images/user.png" width="45px" alt="User Image"></div>
            <div class="pull-left info">
              <p><?php echo $data['fullname']; ?></p>
              <p class="designation"><?php echo $data['job_title']; ?></p>
              <p class="designation2">Aktivitas Terakhir: <?php echo $data['last_activity'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
<!-- Sidebar -->

  <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <img src="../assets/images/kudus.png" width="45px" alt="" srcset="">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-0 px-1 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Aplikasi Backup dan Pengamanan File PTSL</li>
          </ol>
          <h6 class="font-weight-bolder mb-0 px-1">Desa Kedungsari</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            
          </div>
          <ul class="navbar-nav  justify-content-end">
            <!-- start button sidenav -->
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <!-- end button sidenav -->
            <li class="nav-item dropdown pe-2 px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-sign-out cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md tombol_keluar" href="logout.php">
                    <div class="d-flex py-1">
                      <div class="d-flex flex-column content-center">
                        <p class="font-weight-bold mb-0">
                          <i class="fa fa-sign-out fa-lg"></i> Keluar
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->