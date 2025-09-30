<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis Pemrograman Web</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 700px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2, h3 {
            color: #0056b3;
        }
        hr {
            margin: 20px 0;
            border: 0;
            border-top: 1px solid #eee;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }
        input[type="checkbox"] {
            margin-right: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        
        /* --- CSS BARU UNTUK JENIS KELAMIN HORIZONTAL --- */
        .radio-group {
            margin-bottom: 10px;
            display: flex; /* Membuat item di dalamnya jadi horizontal */
            align-items: center; /* Menyejajarkan item secara vertikal */
            border: 1px solid #ddd; /* Memberi sedikit border agar rapi */
            padding: 10px;
            border-radius: 4px;
        }
        .radio-group label.utama { /* Label utama "Jenis Kelamin:" */
            margin-bottom: 0; /* Menghapus margin bawah */
            margin-right: 15px;
        }
        .radio-group input[type="radio"] {
            margin-right: 5px;
        }
        .radio-group label.pilihan { /* Label untuk "Pria" dan "Wanita" */
            font-weight: normal; /* Membuat teks tidak tebal */
            margin-bottom: 0;
            margin-right: 20px;
        }
        /* ----------------------------------------------- */

        .checkbox-group {
            margin-bottom: 10px;
        }
        .result-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .result-table th, .result-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .result-table th {
            background-color: #f2f2f2;
            width: 30%;
        }
        .search-result {
            padding: 10px;
            background-color: #e6f7ff;
            border: 1px solid #b3e0ff;
            border-radius: 4px;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Formulir Biodata Mahasiswa</h2>
    <form action="" method="POST">
        <div>
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama_lengkap" required>
        </div>
        <div>
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required>
        </div>
        <div>
            <label for="prodi">Program Studi:</label>
            <select id="prodi" name="program_studi" required>
                <option value="">-- Pilih Program Studi --</option>
                <option value="Informatika">Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Teknik Elektro">Teknik Elektro</option>
            </select>
        </div>
        
        <div class="radio-group">
            <label class="utama">Jenis Kelamin:</label>
            <input type="radio" id="pria" name="jenis_kelamin" value="Pria" required>
            <label for="pria" class="pilihan">Pria</label>
            
            <input type="radio" id="wanita" name="jenis_kelamin" value="Wanita">
            <label for="wanita" class="pilihan">Wanita</label>
        </div>
        <div class="checkbox-group">
            <label>Hobi:</label>
            <input type="checkbox" id="membaca" name="hobi[]" value="Membaca"> <label for="membaca" style="font-weight:normal; display:inline;">Membaca</label><br>
            <input type="checkbox" id="olahraga" name="hobi[]" value="Olahraga"> <label for="olahraga" style="font-weight:normal; display:inline;">Olahraga</label><br>
            <input type="checkbox" id="musik" name="hobi[]" value="Musik"> <label for="musik" style="font-weight:normal; display:inline;">Musik</label><br>
            <input type="checkbox" id="gaming" name="hobi[]" value="Gaming"> <label for="gaming" style="font-weight:normal; display:inline;">Gaming</label>
        </div>
        <div>
            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" rows="4" required></textarea>
        </div>
        <button type="submit">Kirim Biodata</button>
    </form>

    <?php
    // Memproses dan menampilkan data dari form biodata (POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nama_lengkap'])) {
        // Mengambil data dari form
        $nama = htmlspecialchars($_POST['nama_lengkap']);
        $nim = htmlspecialchars($_POST['nim']);
        $prodi = htmlspecialchars($_POST['program_studi']);
        $kelamin = isset($_POST['jenis_kelamin']) ? htmlspecialchars($_POST['jenis_kelamin']) : 'Tidak memilih';
        $hobi = isset($_POST['hobi']) ? implode(", ", $_POST['hobi']) : 'Tidak ada';
        $alamat = htmlspecialchars($_POST['alamat']);

        // Menampilkan data dalam bentuk tabel
        echo "<h3>Hasil Biodata yang Dikirim:</h3>";
        echo "<table class='result-table'>";
        echo "<tr><th>Nama Lengkap</th><td>" . $nama . "</td></tr>";
        echo "<tr><th>NIM</th><td>" . $nim . "</td></tr>";
        echo "<tr><th>Program Studi</th><td>" . $prodi . "</td></tr>";
        echo "<tr><th>Jenis Kelamin</th><td>" . $kelamin . "</td></tr>";
        echo "<tr><th>Hobi</th><td>" . $hobi . "</td></tr>";
        echo "<tr><th>Alamat</th><td>" . $alamat . "</td></tr>";
        echo "</table>";
    }
    ?>

    <hr>

    <h2>Formulir Pencarian Sederhana</h2>
    <form action="" method="GET">
        <div>
            <label for="search">Kata Kunci Pencarian:</label>
            <input type="text" id="search" name="kata_kunci" placeholder="Masukkan kata kunci...">
        </div>
        <button type="submit">Cari</button>
    </form>

    <?php
    // Memproses dan menampilkan data dari form pencarian (GET)
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['kata_kunci'])) {
        $keyword = htmlspecialchars($_GET['kata_kunci']);
        // Menampilkan pesan sesuai format yang diminta
        echo "<div class='search-result'>";
        echo "Anda mencari data dengan kata kunci: <strong>" . $keyword . "</strong>";
        echo "</div>";
    }
    ?>

</div>

</body>
</html>