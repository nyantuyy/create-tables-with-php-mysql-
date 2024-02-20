<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit(); // Terminate script execution after the redirect
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>petugas</title>
    
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
              <a href="index.php" class="nav-link">
                <i class="bi bi-person-circle icon"></i>
                <span class="link">Pengaduan</span>
              </a>
            </li>
            <li class="list">
              <a href="show_tanggapan.php" class="nav-link">
                <i class="bx bx-bar-chart-alt-2 icon"></i>
                <span class="link">Tanggapan</span>
              </a>
            </li>
            <li class="list">
              <a href="" class="nav-link">
                <i class="bx bx-log-out icon"></i>
                <span class="link" >Logout</span>
              </a>
            </li>
          </div>
        </div>
      </div>
    </nav>
    <div class="container">
      <h2>DAFTAR PENGADUAN</h2>
      <form action="" allign="center" method="post">
        Cari berdasarkan <select name ="pilih">
            <option value= "id_pengaduan">id pengaduan</option>
            <option value= "NIK">NIK</option>
            <option value= "isi_laporan">isi laporan</option>
          </select>
          <input type ="text" name="tekscari"size="24"/>
          <input type ="submit" name="cari"value="cari"/>
          <input type ="submit" name="semua"value="Tampilkan Semua"/>
        </form>
      <table class="table table-a table-bordered table-striped">
        <tr>
          <th> NO  </th>
          <th> id pengaduan </th>
          <th> tgl pengaduan </th>
          <th> NIK </th>
          <th> isi laporan </th>
          <th> OPSI </th>
        </tr>
        
        <?php
        include 'koneksi.php';
        $input_pengaduan = mysqli_query($conn, "SELECT * from pengaduan");
        $input_pengaduan = "";
        if(isset($_POST["cari"])){
          $opsi=$_POST["pilih"];
          $teks=$_POST["tekscari"];
          $input_pengaduan=mysqli_query($conn,"SELECT * from pengaduan where $opsi like'%$teks%'");
        }
        else{
          $input_pengaduan=mysqli_query($conn,"SELECT * FROM pengaduan");
        }

        

        $no = 1;
        foreach ($input_pengaduan as $row) {
          echo "<tr>
            <td>$no</td>
            <td>" . $row['id_pengaduan'] . "</td>
            <td>" . $row['tgl_pengaduan'] . "</td>
            <td>" . $row['NIK'] . "</td>
            <td>" . $row['isi_laporan'] . "</td>
            
            <td><a href='create_tanggapan.php?id_pengaduan=$row[id_pengaduan]'><button> tanggapi </button></a> 
            </td></tr>";
          $no++;
        }
        ?>
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