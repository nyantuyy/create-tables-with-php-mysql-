
<?php
include 'koneksi.php';
if (isset($_POST["ok"])) {
      $id_tanggapan = $_POST["id_tanggapan"];
      $id_pengaduan =$_POST["id_pengaduan"];
      $tgl_tanggapan =$_POST["tgl_tanggapan"];
      $tanggapan =$_POST["tanggapan"];
      $id_petugas =$_POST["id_petugas"];
  $input = mysqli_query($conn, "UPDATE tanggapan SET id_pengaduan='$id_pengaduan', tgl_tanggapan ='$tgl_tanggapan ', tanggapan='$tanggapan', id_petugas='$id_petugas' WHERE id_tanggapan='$id_tanggapan'");
  header("location:show_tanggapan.php");
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
</nav>

<div class="container">
    
<?php
                                include 'koneksi.php';
                                if (isset($_POST["id_tanggapan"])) {
                                    $id_tanggapan = $_POST["id_tanggapan"];
                                    $id_pengaduan = $_POST["id_pengaduan"];
                                    $tgl_tanggapan = $_POST["tgl_tanggapan"];
                                    $tanggapan = $_POST["tanggapan"];
                                    
                                    $input = mysqli_query($conn, "UPDATE tanggapan SET id_pengaduan='$id_pengaduan', tgl_tanggapan='$tgl_tanggapan', tanggapan='$tanggapan' WHERE id_tanggapan='$id_tanggapan'");
                                    if ($input) {
                                        echo "<div class='alert alert-success' >Data berhasil di edit!</div> ";
                                    } else {
                                        echo "<script>alert('Gagal menyimpan');</script>";
                                    }
                                    
                                }
                                ?>
                                 
                                 <?php
                                    include 'koneksi.php';
                                    $id_tanggapan = $_GET['id_tanggapan'];
                                    $update = mysqli_query($conn, "SELECT * from tanggapan WHERE id_tanggapan='$id_tanggapan'");
                                    foreach ($update as $row) {

                                    ?>

                                <form method="post" action="" enctype="multipart/form-data">

                                    <div class="form-group">
                                     <label><b>ID Tanggapan</b></label>
                                        <input type="text" class="form-control" readonly value="<?php echo $row['id_tanggapan']; ?>" name="id_tanggapan" id="id_tanggapan">
                                    </div>
                                    
                                    <div class="form-group">
                                     <label><b>ID Pengaduan</b></label>
                                        <input type="text" class="form-control" readonly value="<?php echo $row['id_pengaduan']; ?>" name="id_pengaduan" id="id_pengaduan">
                                    </div>

                                    <div class="form-group">
                                     <label><b>TGL Tanggapan</b></label>
                                        <input type="date" class="form-control" value="<?php echo $row['tgl_tanggapan']; ?>" name="tgl_tanggapan" id="tgl_tanggapan">
                                    </div>

                                    <div class="form-group">
                                     <label><b>Tanggapan</b></label>
                                        <input type="text" class="form-control" value="<?php echo $row['tanggapan']; ?>" name="tanggapan" id="tanggapan">
                                    </div>

                                    <button type="reset" class="btn btn-warning"><a href="show_tanggapan.php">KEMBALI</a></button> &emsp; &emsp;
                                    <button type="submit" name="edit" class="btn btn-primary"> &nbsp; EDIT &nbsp; </button>
                                </form>

                                <?php } ?>
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