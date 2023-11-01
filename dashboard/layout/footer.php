<!-- footer -->
<footer class="footer py-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-4 mb-lg-0 mb-4">
              <div class="text-center text-sm text-muted text-lg-start">
                <a>Storage and Security of PTSL Files Desa Kedungsari Kec.Gebog Kab.Kudus</a>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a class="nav-link text-muted" href="#">Pemdes Kedungsari &copy; <?= date('Y'); ?></a>
                </li>
              </ul>
            </div>
          </div>
          
        </div>
      </footer>
    </div>
  </main>
<!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.8'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script src="../assets/js/styles.js"></script>
  <!-- DataTables -->
  <script src="../assets/js/jquery-3.6.0.js"></script>
  <script src="../assets/js/datatables.js"></script>
  <script src="../assets/js/datatables-demo.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

  <script src="../assets/js/essential-plugins.js"></script>
  <script src="../assets/js/plugins/pace.min.js"></script>

  <!-- Sweet Alert -->
  <script src="../assets/js/sweetalert2.all.min.js"></script>
  <script src="../assets/js/myscript.js"></script>

<!-- --------------------------------sesion sweetalert--------------------------------------------------- -->
  <!-- jika ada session user_dobel maka tampilkan sweet alert dengan pesan yang telah di set
    di dalam session user_dobel  -->
    <?php if(@$_SESSION['user_dobel']){ ?>
        <script>
            Swal.fire("Username Sudah Ada !", "<?php echo $_SESSION['user_dobel']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['user_dobel']); } ?>

    <!-- jika ada session user_dobel maka tampilkan sweet alert dengan pesan yang telah di set
    di dalam session user_dobel  -->
    <?php if(@$_SESSION['user_dobel1']){ ?>
        <script>
            Swal.fire("Username Sudah Ada !", "<?php echo $_SESSION['user_dobel1']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['user_dobel1']); } ?>

    <!-- jika ada session sukses_adduser maka tampilkan sweet alert dengan pesan yang telah di set
    di dalam session sukses_adduser  -->
    <?php if(@$_SESSION['sukses_adduser']){ ?>
        <script>
            Swal.fire("Berhasil", "<?php echo $_SESSION['sukses_adduser']; ?>", "success");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['sukses_adduser']); } ?>

    <!-- jika ada session sukses_edituser maka tampilkan sweet alert dengan pesan yang telah di set
    di dalam session sukses_ubahuser  -->
    <?php if(@$_SESSION['sukses_ubahuser']){ ?>
        <script>
            Swal.fire("Berhasil", "<?php echo $_SESSION['sukses_ubahuser']; ?>", "success");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['sukses_ubahuser']); } ?>

    <!-- jika ada session sukses_hapususer maka tampilkan sweet alert dengan pesan yang telah di set
    di dalam session sukses_hapususer  -->
    <?php if(@$_SESSION['sukses_hapususer']){ ?>
        <script>
            Swal.fire("Berhasil", "<?php echo $_SESSION['sukses_hapususer']; ?>", "success");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['sukses_hapususer']); } ?>

    <!-- jika ada session sukses_hapusfile maka tampilkan sweet alert dengan pesan yang telah di set
    di dalam session sukses_hapusfile  -->
    <?php if(@$_SESSION['sukses_hapusfile']){ ?>
        <script>
            Swal.fire("Berhasil", "<?php echo $_SESSION['sukses_hapusfile']; ?>", "success");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['sukses_hapusfile']); } ?>

    <!-- jika ada session eror_edituser maka tampilkan sweet alert dengan pesan yang telah di set
    di dalam session eror_edituser  -->
    <?php if(@$_SESSION['eror_edituser']){ ?>
        <script>
            Swal.fire("Error", "<?php echo $_SESSION['eror_edituser']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['eror_edituser']); } ?>


    <!-- jika ada session sukses_download maka tampilkan sweet alert dengan pesan yang telah di set
    di dalam session sukses_download  -->
    <?php if(@$_SESSION['sukses_download']){ ?>
        <script>
            Swal.fire("Berhasil", "<?php echo $_SESSION['sukses_download']; ?>", "success");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['sukses_download']); } ?>

    <!-- jika ada session eror_download maka tampilkan sweet alert dengan pesan yang telah di set
    di dalam session eror_download  -->
    <?php if(@$_SESSION['eror_download']){ ?>
        <script>
            Swal.fire("Error", "<?php echo $_SESSION['eror_download']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['eror_download']); } ?>

    <!-- jika ada session sukses_decrypt maka tampilkan sweet alert dengan pesan yang telah di set
    di dalam session sukses_decrypt  -->
    <?php if(@$_SESSION['sukses_decrypt']){ ?>
        <script>
            Swal.fire("Berhasil", "<?php echo $_SESSION['sukses_decrypt']; ?>", "success");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['sukses_decrypt']); } ?>

    <!-- jika ada session eror_decrypt maka tampilkan sweet alert dengan pesan yang telah di set
    di dalam session eror_decrypt  -->
    <?php if(@$_SESSION['eror_decrypt']){ ?>
        <script>
            Swal.fire("Error", "<?php echo $_SESSION['eror_decrypt']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['eror_decrypt']); } ?>

    <!-- jika ada session sukses_encrypt maka tampilkan sweet alert dengan pesan yang telah di set
    di dalam session sukses_encrypt  -->
    <?php if(@$_SESSION['sukses_encrypt']){ ?>
        <script>
            Swal.fire("Berhasil", "<?php echo $_SESSION['sukses_encrypt']; ?>", "success");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['sukses_encrypt']); } ?>

    <!-- jika ada session eror_encrypt maka tampilkan sweet alert dengan pesan yang telah di set
    di dalam session eror_encrypt  -->
    <?php if(@$_SESSION['eror_encrypt']){ ?>
        <script>
            Swal.fire("Error", "<?php echo $_SESSION['eror_encrypt']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['eror_encrypt']); } ?>

    <!-- jika ada session errext maka tampilkan sweet alert dengan pesan yang telah di set
    di dalam session errext  -->
    <?php if(@$_SESSION['errext']){ ?>
        <script>
            Swal.fire("Error", "<?php echo $_SESSION['errext']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['errext']); } ?>

    <!-- jika ada session errsize maka tampilkan sweet alert dengan pesan yang telah di set
    di dalam session errsize  -->
    <?php if(@$_SESSION['errsize']){ ?>
        <script>
            Swal.fire("Error", "<?php echo $_SESSION['errsize']; ?>", "error");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['errsize']); } ?>


<!-- --------------------------------end sesion sweetalert--------------------------------------------------- -->

</body>

</html>