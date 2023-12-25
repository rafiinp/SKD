# Fungsi untuk mengenkripsi teks dengan Caesar Cipher
def caesar_cipher(text, shift):
    result = ""
    for char in text:
        if char.isalpha():
            if char.islower():
                result += chr(((ord(char) - ord('a') + shift) % 26) + ord('a'))
            else:
                result += chr(((ord(char) - ord('A') + shift) % 26) + ord('A'))
        else:
            result += char
    return result

# Fungsi untuk mengenkripsi teks dengan Vigenere Cipher
def vigenere_cipher(text, key):
    result = ""
    key = key.upper()
    key_index = 0
    for char in text:
        if char.isalpha():
            if char.islower():
                result += chr(((ord(char) - ord('a') + (ord(key[key_index]) - ord('A'))) % 26) + ord('a'))
            else:
                result += chr(((ord(char) - ord('A') + (ord(key[key_index]) - ord('A'))) % 26) + ord('A'))
            key_index = (key_index + 1) % len(key)
        else:
            result += char
    return result

# Teks awal
text = "Success is not final, failure is not fatal, it is the courage to continue that counts"
caesar_shift = 14  # Pergeseran Caesar Cipher
vigenere_key = "RAFI"  # Kunci Vigenere Cipher

# Enkripsi teks dengan Caesar Cipher
encrypted_text_caesar = caesar_cipher(text, caesar_shift)

# Kemudian, enkripsi hasil Caesar Cipher dengan Vigenere Cipher
final_encryption = vigenere_cipher(encrypted_text_caesar, vigenere_key)

# Hasil akhir (Huruf Kapital dan Tanpa Spasi)
final_encryption = final_encryption.replace(" ", "").upper().replace(",","")

print("Teks Asli:", text)
print("Teks Terenkripsi (Hasil Caesar Cipher + Vigenere Cipher):", final_encryption)
