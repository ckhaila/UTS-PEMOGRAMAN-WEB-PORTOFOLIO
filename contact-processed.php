<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil data dari form
        $nama = $_POST['name'];
        $email = $_POST['email'];
        $jenis_kelamin = $_POST['gender'];
        $pesan = $_POST['message'];

        // Koneksi ke database
        $servername = "localhost";
        $username = "root";
        $password = "123"; // Ganti password sesuai konfigurasi Anda
        $dbname = "web_portfolio"; // Ganti dengan nama database Anda

        // Buat koneksi
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Cek koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Menyimpan pesan ke database
        $sql = "INSERT INTO contacts (nama, email, jenis_kelamin, pesan) VALUES (?, ?, ?, ?)";

        // Persiapkan dan bind
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $nama, $email, $jenis_kelamin, $pesan);

        // Eksekusi query
        if ($stmt->execute()) {
            echo "<p>Pesan berhasil dikirim!</p>";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Tutup koneksi
        $stmt->close();
        $conn->close();
    }
    ?>

</body>
</html>






