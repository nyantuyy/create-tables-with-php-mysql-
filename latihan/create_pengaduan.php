
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Berhasil Login</title>
    
    <link 
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
</head>
<body>
<nav>
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">Pengaduan Masyarakat</span>
      </div>

      <div class="sidebar">
        <div class="logo">
          <i class="bx bx-menu menu-icon"></i>
          <span class="logo-name">Pengaduan Masyarakat</span>
        </div>

        <div class="sidebar-content">
          <ul class="lists">
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-home-alt icon"></i>
                <span class="link">Masyarakat</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-bar-chart-alt-2 icon"></i>
                <span class="link">Revenue</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-bell icon"></i>
                <span class="link">Notifications</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-message-rounded icon"></i>
                <span class="link">Messages</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-pie-chart-alt-2 icon"></i>
                <span class="link">Analytics</span>
              </a>
            </li>
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-heart icon"></i>
                <span class="link">Likes</span>
              </a>
            </li>
          </ul>
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-log-out icon"></i>
                <span class="link" >Logout</span>
              </a>
            </li>
          </div>
        </div>
      </div>
    </nav>
    
    <div class="container">
    <?php
    include 'koneksi.php';
    if (isset($_POST["ok"])) {
      $id_pengaduan = $_POST["id_pengaduan"];
      $tgl_pengaduan =$_POST["tgl_pengaduan"];
      $NIK =$_POST["NIK"];
      $isi_laporan =$_POST["isi_laporan"];
      $input = mysqli_query($conn, "insert into pengaduan values ('$id_pengaduan', '$tgl_pengaduan', '$NIK', '$isi_laporan')");
      echo "<div class='alert alert-success' >Selamat, anda sukses mendaftar!</div> ";
      }
      ?>
      <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="text-center">
          <h1>Tambah Pengaduan</h1>
          <form method="post" action="">
            <div class="form-group">
              <label><b> Id Pengaduan</b></label> 
              <input type="text" class="form-control" placeholder="Id pengaduan" name="id_pengaduan">
            </div>
            <div class="form-group">
              <label><b>Tanggal Pengaduan</b></label>
              <input type="date" class="form-control" placeholder="Masukkan Tanggal" name="tgl_pengaduan">
            </div>
            <div class="form-group">
              <label><b>NIK</b></label>
              <input type="text" class="form-control" placeholder="Masukkan NIK" name="NIK">
            </div> 
             <div class="form-group">
              <label><b>Isi Laporan</b></label>
              <input type="text" class="form-control" placeholder="laporan" name="isi_laporan">
            </div> 
            <button type="submit" name="ok" class="btn btn-success mt-2">OK</button>
            <button type="reset" class="btn btn-danger mt-2 ">CANCEL</button>
          </form>
          <h6> <button type="button" class="btn btn-a btn-outline-info mt-3" ><a href="show_pengaduan.php">Tampilkan data pengaduan</a></button></h6>
        </div>
      </div>
    </div>
    

    <section class="overlay"></section>

    <script>
      const navBar = document.querySelector("nav"),
        menuBtns = document.querySelectorAll(".menu-icon"),
        overlay = document.querySelector(".overlay");

      menuBtns.forEach((menuBtn) => {
        menuBtn.addEventListener("click", () => {
          navBar.classList.toggle("open");
        });
      });

      overlay.addEventListener("click", () => {
        navBar.classList.remove("open");
      });
    </script>

	
</body>
</html>