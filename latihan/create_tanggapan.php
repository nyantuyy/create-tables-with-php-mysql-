
 
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
        <span class="logo-name">Tanggapan</span>
      </div>
</nav>



<div class="container">
    <?php
    include 'koneksi.php';
    

  
    $id_pengaduan = $_GET['id_pengaduan'];
    $update = mysqli_query($conn, "SELECT * from pengaduan WHERE id_pengaduan='$id_pengaduan'");
    foreach ($update as $row) {
    
      ?>
      <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="text-center">
          <h1 align="center">Tanggapan</h1>
          <form method="post" action="tambah_tanggapan.php">
          <div class="form-group" method="post">
            <label><b>ID Pengaduan</b></label>
               <input type="text" class="form-control" readonly value="<?php echo $row['id_pengaduan']; ?>" name="id_pengaduan" id="id_pengaduan">
           </div>
           
           <div class="form-group">
            <label><b>Isi Pengaduan</b></label>
               <input type="text" class="form-control" readonly value="<?php echo $row['isi_laporan']; ?>" name="isi_laporan" id="isi_laporan">
           </div>
            <div class="form-group">
              <label><b>tanggal tanggapan</b></label>
              <input type="date" class="form-control" placeholder="masukkan tanggal" name="tgl_tanggapan">
            </div> 
             <div class="form-group">
              <label><b>tanggapan</b></label>
              <input type="text" class="form-control" placeholder="tanggapan" name="tanggapan">
            </div> 
            <button type="submit" name="edit" class="btn btn-success">OK</button>
            <button type="reset" class="btn btn-danger">CANCEL</button>
          </form>
          <h6> <a href="show_tanggapan.php">Tampilkan data anggota</a></h6>
        </div>
      </div>
    </div>
<?php }?>
       
    
   
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