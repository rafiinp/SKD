from PyPDF2 import PdfWriter, PdfReader

# buat objek pdf writer
out = PdfWriter()

# buka file pdf asli
file = PdfReader("C:/Users/User/Documents/rafi/Sistem Keamanan Data/Tugas/Enkripsi PDF/UjiCoba.pdf")

# identifikasi total halaman file
num = len(file.pages)

# program membaca setiap halaman file sesuai halaman yang diidentifikasi 
for idx in range(num):
    page = file.pages[idx]  # Perubahan pada baris ini
    out.add_page(page)  # Perubahan pada baris ini

# masukkan password enkripsi 
password = "pass"

# enkripsi masing-masing halaman 
out.encrypt(password)

# buka file enkripsi "UjiCoba_encrypted.pdf"
with open("C:/Users/User/Documents/rafi/Sistem Keamanan Data/Tugas/Enkripsi PDF/UjiCoba_encrypted.pdf", "wb") as f:
    # simpan pdf 
    out.write(f)
