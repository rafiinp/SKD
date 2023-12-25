<?php
// Fungsi untuk mengenkripsi teks menggunakan metode pergeseran karakter (Caesar Cipher)
function encryptShift($plaintext, $shift) {
    $encryptedText = ''; // Variabel untuk menyimpan teks terenkripsi
    
    for ($i = 0; $i < strlen($plaintext); $i++) {
        $char = $plaintext[$i]; // Mengambil karakter ke-i dari teks
        
        // Memeriksa apakah karakter adalah huruf
        if (ctype_alpha($char)) {
            $isUpperCase = ctype_upper($char); // Memeriksa apakah huruf tersebut huruf besar
            $char = ord($char); // Mengubah karakter menjadi nilai ASCII
            $char = ($char - ($isUpperCase ? 65 : 97) + $shift) % 26; // Melakukan pergeseran
            $char = $char < 0 ? $char + 26 : $char; // Menangani pergeseran ke bawah (negatif)
            $char = $char + ($isUpperCase ? 65 : 97); // Mengembalikan ke huruf besar atau kecil
            $char = chr($char); // Mengubah nilai ASCII kembali menjadi karakter
        }
        
        $encryptedText .= $char; // Menambahkan karakter ke teks terenkripsi
    }
    
    return $encryptedText; // Mengembalikan teks terenkripsi
}

// Fungsi untuk mendekripsi teks yang telah dienkripsi menggunakan metode pergeseran karakter
function decryptShift($encryptedText, $shift) {
    return encryptShift($encryptedText, -$shift); // Menggunakan fungsi enkripsi dengan pergeseran negatif
}

// Memeriksa apakah pengguna telah mengirimkan permintaan enkripsi atau dekripsi
if (isset($_POST['encrypt'])) {
    $plaintext = $_POST['plaintext']; // Mengambil teks dari form enkripsi
    $shift = 34; // Jumlah pergeseran yang digunakan sesuai belakang NIM
    $encrypted = encryptShift($plaintext, $shift); // Melakukan enkripsi
} elseif (isset($_POST['decrypt'])) {
    $ciphertext = $_POST['ciphertext']; // Mengambil teks dari form dekripsi
    $shift = 34; // Jumlah pergeseran yang digunakan (sama dengan enkripsi) sesuai belakang NIM
    $decrypted = decryptShift($ciphertext, $shift); // Melakukan dekripsi
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enkripsi dan Dekripsi Pergeseran 34</title>
</head>
<body>
    <h1>Enkripsi dan Dekripsi Pergeseran 34</h1>
    
    <!-- Form untuk mengenkripsi teks -->
    <form method="post" action="">
        <label for="plaintext">Plaintext:</label>
        <input type="text" id="plaintext" name="plaintext">
        <input type="submit" name="encrypt" value="Enkripsi">
    </form>
    
    <?php
    // Menampilkan teks terenkripsi jika ada
    if (isset($encrypted)) {
        echo "<p>Teks Terenkripsi: $encrypted</p>";
    }
    ?>
    
    <!-- Form untuk mendekripsi teks -->
    <form method="post" action="">
        <label for="ciphertext">Ciphertext:</label>
        <input type="text" id="ciphertext" name="ciphertext">
        <input type="submit" name="decrypt" value="Dekripsi">
    </form>
    
    <?php
    // Menampilkan teks terdekripsi jika ada
    if (isset($decrypted)) {
        echo "<p>Teks Terdekripsi: $decrypted</p>";
    }
    ?>
</body>
</html>
