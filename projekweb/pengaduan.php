
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data | Pengaduan</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body{
            background-color: #c9d6ff;
            background: linear-gradient(to right, #e2e2e2, #c9d6ff);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }

        .container{
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
            overflow-y: scroll;
            position: relative;
            width: 768px;
            max-height: 480px;
        }

        .container p{
            font-size: 14px;
            line-height: 20px;
            letter-spacing: 0.3px;
            margin: 20px 0;
        }

        .container span{
            font-size: 12px;
        }

        .container h1{
            font-size: 30px;
            align-items: center;
        }

        .container a{
            color: #000000;
            font-size: 13px;
            text-decoration: none;
            margin: 5px 0 10px;
        }

        a:hover {
            color: #000000;
        }

        a:hover {
            color: #512da8;
        }

        .container button{
            background-color: #512da8;
            color: #fff;
            font-size: 12px;
            padding: 10px 45px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-top: 10px;
            cursor: pointer;
        }

        .container button.hidden{
            background-color: transparent;
            border-color: #fff;
        }

        .container form{
            background-color: #fff;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 40px 40px;
        }

        .container input{
            background-color: #eee;
            border: none;
            margin: 8px 0;
            padding: 10px 15px;
            font-size: 13px;
            border-radius: 8px;
            width: 100%;
            outline: none;
        }

        .form-container{
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
        overflow-y: scroll;
        }

        th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        }

        th {
        background-color: #f2f2f2;
        }

        input[type="text"] {
        padding: 5px;
        margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <form>
            <h1>Portal Pengaduan Masyarakat</h1>
            <br>

            <input type="text" id="searchInput" placeholder="Search...">

            <table id="dataTable">
                <thead>
                  <tr>
                    <th width="200px">Tanggal pengaduan</th>
                    <th>Isi laporan pengaduan</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                                        include 'koneksi.php';
                                        $input = mysqli_query($koneksi, "SELECT * from pengaduan");


                                        foreach ($input as $row) {
                                            echo "<tr>
                                            <td>" . $row['tgl_pengaduan'] . "</td>
                                            <td>" . $row['isi_laporan'] . "</td>"
                                            ;
                                        }
                                    ?>
                </tbody>
              </table>
              <br>

              <a href="laporan.php"><button type="button">kembali</button></a>
        </form>
    </div>
    

    <script>
        document.getElementById('searchInput').addEventListener('input', function () {
          searchTable();
        });
    
        function searchTable() {
          var input, filter, table, tr, td, i, j, txtValue;
          input = document.getElementById('searchInput');
          filter = input.value.toUpperCase();
          table = document.getElementById('dataTable');
          tr = table.getElementsByTagName('tr');
    
          for (i = 0; i < tr.length; i++) {
            var found = false;
            for (j = 0; j < tr[i].cells.length; j++) {
              td = tr[i].getElementsByTagName('td')[j];
              if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  found = true;
                  break;
                }
              }
            }
            if (found) {
              tr[i].style.display = '';
            } else {
              tr[i].style.display = 'none';
            }
          }
        }
        var tableContainer = document.getElementById('tableContainer');
        tableContainer.addEventListener('wheel', function (event) {
        if (event.deltaY !== 0) {
            tableContainer.scrollTop += event.deltaY;
            event.preventDefault();
        }
        });
      </script>
</body>
</html>