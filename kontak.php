<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - Cut Khaila Tiara Putri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #0b0b0c;
            background-image: url('background-image-url.jpg'); /* Ganti dengan URL gambar background */
            background-size: cover;
            background-position: center;
            text-align: center;
            padding: 20px;
        }
        .overlay {
            background-color: rgba(255, 255, 255, 0.75);
            padding: 20px;
            border-radius: 8px;
            display: inline-block;
            margin-top: 20px;
            width: 300px;
        }
        img.icon {
            width: 20px;
            vertical-align: middle;
            margin-right: 8px;
        }
    </style>
</head>
<body>

    <div class="overlay">
        <h2>Kontak</h2>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Ambil data dari form
                $nama = $_POST['name'];
                $email = $_POST['email'];
                $jenis_kelamin = $_POST['gender'];
                $pesan = $_POST['message'];

                // Koneksi ke database
                $servername = "localhost";
                $username = "root";
                $password = "123"; // Ubah sesuai dengan password database Anda
                $dbname = "web_portfolio";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Cek koneksi
                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                // Menyimpan pesan ke database
                $sql = "INSERT INTO contacts (nama, email, jenis_kelamin, pesan)
                        VALUES ('$nama', '$email', '$jenis_kelamin', '$pesan')";

                if ($conn->query($sql) === TRUE) {
                    echo "<p>Pesan berhasil dikirim!</p>";
                } else {
                    echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }

                $conn->close();
            }
        ?>

        <form method="POST" action="kontak.php">
            <p>
                <label>Nama:</label><br>
                <input type="text" name="name" required>
            </p>
            <p>
                <label>Email:</label><br>
                <input type="email" name="email" required>
            </p>
            <p>
                <label>Jenis Kelamin:</label><br>
                <select name="gender" required>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </p>
            <p>
                <label>Pesan:</label><br>
                <textarea name="message" required></textarea>
            </p>
            <p><button type="submit">Kirim</button></p>
        </form>

        <a href="indeks.html">Kembali ke Beranda</a>
    </div>

</body>
</html>
