<?php
    // Panggil koneksi
    session_start();
    require '../koneksi.php';

    // Ambil username dari sesi
    $username = $_SESSION['username'];

    // Query untuk mengambil nama dari tabel admin berdasarkan username
    $query = "SELECT nama1 FROM admin WHERE username = '$username'";

    try {
        $result = $db->query($query);

        // Periksa apakah query berhasil dieksekusi
        if ($result) {
            // Ambil data nama dari hasil query
            $userData = $result->fetch_assoc();

            // Periksa apakah hasil query mengembalikan data
            if ($userData) {
                $nama1 = $userData['nama1'];
            } else {
                echo "Data tidak ditemukan.";
            }
        } else {
            // Gagal eksekusi query
            throw new Exception("Query error: " . $db->error);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Perpustakaan Politeknik Negeri Padang</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo mr-5" href="dashboard.php" style="margin-left: 15px;"><img src="images/pnp.png" class="mr-2" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="images/logo_pnp.png" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
          
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                <img src="images/faces/person.png" alt="profile" style="margin-right: 5px; font-family: 'Poppins', sans-serif;"/>
                <?php echo $nama1; ?> 
            </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="logout.php">
                  <i class="ti-power-off text-primary"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>
            Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>
            Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Anggota</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="data-anggota.php">Data Anggota</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Buku</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="data-buku.php">Data Buku</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Sirkulasi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="peminjaman.php">Peminjaman</a></li>
                <li class="nav-item"> <a class="nav-link" href="pengembalian.php">Pengembalian</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Pengunjung</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="data-pengunjung.php">Daftar Pengunjung</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Pengguna</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="data-pengguna.php">Data Pengguna</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <div class="row">
                      <div class="col-md-6">
                        <p class="card-title mb-0">Data Anggota</p>
                      </div>
                        <?php
                          if ($_SESSION['level']=='pustakawan') {          
                        ?>
                      <div class="col-md-6 text-md-right">
                        <a href="input-anggota.php" class="btn btn-success">Tambah Anggota +</a>
                        <a href="cetak-anggota.php" class="btn btn-danger">Cetak</a>
                      </div>
                      <?php
                                  }
                      ?>
                    </div>
                    <br>

                  <div class="row">
                      <div class="col-12">
                          <div class="table-responsive">
                              <form action="data-anggota.php" method="POST">
                                  <div class="input-group">
                                      <input type="text" class="form-control" name='cari' placeholder="Search now" aria-label="search" aria-describedby="search" value="<?= isset($_POST['cari']) ? $_POST['cari'] : '' ?>">
                                      <div class="input-group-append">
                                          <button class="btn btn-primary" id="search-button">Search</button>
                                      </div>
                                  </div>
                                  <br>
                              </form>
                              <?php
                                  // Menggunakan satu query untuk menangani pencarian dan tampilan data
                                  $query = "SELECT * FROM data_anggota";

                                  if(isset($_POST['cari'])){
                                      $cari = $_POST['cari'];
                                      if (!empty($cari)) {
                                          $query = "SELECT * FROM data_anggota 
                                                    WHERE id_anggota LIKE '%$cari%' OR 
                                                          nama LIKE '%$cari%' OR
                                                          jenis LIKE '%$cari%'";
                                      }
                                  }

                                  $result = $db->query($query) or die($db->error);

                                  if ($result->num_rows > 0) {
                                      ?>
                                      <table id="example" class="display expandable-table" style="width:100%">
                                          <thead>
                                              <tr>
                                                  <th>No</th>
                                                  <th>ID Anggota</th>
                                                  <th>Nama</th>
                                                  <th>Jenis Kelamin</th>
                                                  <th>
                                                  <select class="custom-dropdown" id="filterJurusan" onchange="filterTableByJurusan(this.value)">
                                                      <option value="">Semua Jurusan</option>
                                                      <option value="Teknologi Informasi">Teknologi Informasi</option>
                                                      <option value="Teknik Mesin">Teknik Mesin</option>
                                                      <option value="Teknik Sipil">Teknik Sipil</option>
                                                      <option value="Teknik Elektro">Teknik Elektro</option>
                                                      <option value="Akuntansi">Akuntansi</option>
                                                      <option value="Administrasi Niaga">Administrasi Niaga</option>
                                                      <option value="Bahasa Inggris">Bahasa Inggris</option>
                                                      <!-- Tambahkan opsi untuk jurusan lainnya sesuai kebutuhan -->
                                                  </select>
                                                  </th>
                                                  <th>Status</th>
                                                  <?php
                                  if ($_SESSION['level']=='pustakawan') {          
                                ?>
                                                  <th>Tools</th>
                                                  <?php
                                  }
                                                  ?>
                                                  <th></th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <?php
                                                  $nomor = 1;
                                                  foreach ($result as $row) : ?>
                                                  <tr>
                                                      <td><?= $nomor++ ?></td>
                                                      <td><a href="detail-anggota.php?id_anggota=<?php echo $row['id_anggota']; ?>" style="color: #DA5E1D;"><?php echo $row['id_anggota']; ?></a></td>
                                                      <td><?=$row['nama']?></td>
                                                      <td><?=$row['gender']?></td>
                                                      <td><?=$row['jurusan']?></td>
                                                      <td><?=$row['jenis']?></td>
                                                      <?php
                                  if ($_SESSION['level']=='pustakawan') {          
                                ?>
                                                      <td>
                                                          <a href="edit-anggota.php?id_anggota=<?=$row['id_anggota']?>" class="btn btn-warning">Edit</a> |
                                                          <a onclick="return confirm('Apakah anda yakin menghapus data?')" href="delete-anggota.php?id_anggota=<?php echo $row['id_anggota']; ?>" class="btn btn-danger">Delete</a>
                                                      </td>
                                                      <?php
                                  }
                                  ?>
                                                  </tr>
                                              <?php endforeach ?>
                                          </tbody>
                                      </table>
                                      <?php
                                  } else {
                                      echo "Data tidak ditemukan.";
                                  }
                              ?>
                          </div>
                      </div>
                  </div>

  <script>
    function filterTableByJurusan(jurusan) {
        var table = document.getElementById('example').getElementsByTagName('tbody')[0];
        var rows = table.getElementsByTagName('tr');

        for (var i = 0; i < rows.length; i++) {
            var cell = rows[i].getElementsByTagName('td')[4]; // Kolom Jurusan (indeks 4)
            if (cell) {
                var content = cell.textContent || cell.innerText;
                rows[i].style.display = (jurusan === '' || content === jurusan) ? '' : 'none';
            }
        }
    }
    
</script>

                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  
  <!-- container-scroller -->
  <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023.<a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Perpustakaan Politeknik Negeri Padang<i class="ti-heart text-danger ml-1"></i></span>
          </div>
          <!-- <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span> 
          </div> -->
        </footer> 
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <!-- <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script> -->

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
