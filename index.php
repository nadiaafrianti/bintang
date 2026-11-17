<?php
$tinggi = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = trim($_POST['tinggi'] ?? '');
    
    // Validasi apakah input merupakan bilangan bulat (integer)
    if (filter_var($input, FILTER_VALIDATE_INT) !== false) {
        $nilai = (int)$input;
        
        // Validasi rentang 1 sampai 20
        if ($nilai >= 1 && $nilai <= 20) {
            $tinggi = $nilai;
        } else {
            $error = 'Masukkan tidak valid! Tinggi segitiga harus antara 1 sampai 20.';
        }
    } else {
        $error = 'Masukkan tidak valid! Harap masukkan bilangan bulat.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Segitiga Bintang Simetris</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        .form-container {
            margin-bottom: 20px;
        }
        .error {
            color: #d9534f;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .hasil {
            /* Menggunakan font monospace agar lebar spasi dan bintang sama persis */
            font-family: 'Courier New', Courier, monospace;
            font-size: 20px;
            line-height: 1.2;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            padding: 20px;
            display: inline-block;
            border-radius: 6px;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <form method="POST" action="">
            <label for="tinggi">Masukkan Tinggi Segitiga (1 - 20): </label>
            <input type="text" id="tinggi" name="tinggi" value="<?= htmlspecialchars($_POST['tinggi'] ?? '') ?>" required>
            <button type="submit">Tampilkan</button>
        </form>
    </div>

    <?php if ($error !== ''): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <?php if ($tinggi !== null): ?>
        <div class="hasil">
            <?php
            // Perulangan luar untuk mengatur baris (dari atas ke bawah)
            for ($baris = 1; $baris <= $tinggi; $baris++) {
                
                // Perulangan dalam 1: mencetak spasi di kiri agar segitiga berada di tengah
                for ($spasi = $tinggi - $baris; $spasi > 0; $spasi--) {
                    echo "&nbsp;";
                }

                // Perulangan dalam 2: mencetak bintang dengan jumlah ganjil (1, 3, 5, dst.)
                for ($bintang = 1; $bintang <= (2 * $baris - 1); $bintang++) {
                    echo "*";
                }

                // Pindah ke baris berikutnya
                echo "<br>";
            }
            ?>
        </div>
    <?php endif; ?>

</body>
</html>