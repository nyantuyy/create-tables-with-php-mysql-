<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Pengaduan Masyarakat</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Source Sans Pro', sans-serif;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            flex-direction: column;
            background: url('web.jpg') center center fixed; /* Gambar latar belakang */
            background-size: cover; /* Menutupi seluruh laman */
            background-attachment: fixed; /* Menahan gambar latar belakang */
        }

        .login-container {
            background: rgba(17, 17, 17, 0.5); /* Warna latar belakang transparan */
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
            border: 2px solid rgba(255, 255, 255, 0.5); /* Garis transparan */
        }

        h1 {
            color: #FFA500;
            margin-bottom: 20px;
        }

        h2 {
            color: #FFA500;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 5px;
            background: transparent; /* Warna latar belakang input transparan */
            color: white; /* Warna teks input */
        }

        .login-button {
            background-color: transparent; /* Latar belakang tombol transparan */
            color: white; /* Warna teks tombol */
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            border: 2px solid white; /* Garis tombol */
            transition: background-color 0.3s, color 0.3s; /* Efek transisi warna */
        }

        .login-button:hover {
            background-color: white; /* Warna latar belakang tombol saat di hover */
            color: black; /* Warna teks tombol saat di hover */
        }

        .login-button:active {
            background-color: white; /* Warna latar belakang tombol saat di klik */
            color: black; /* Warna teks tombol saat di klik */
        }
    </style>
</head>

<body>
    <h1>Portal Pengaduan Masyarakat</h1>
    <div class="login-container">
        <h2>Login Admin</h2>
        <form action="login-process.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="login-button">Login</button>
        </form>
    </div>
</body>

</html>
