<?php
// Fungsi untuk memvalidasi nama menggunakan regex
function validateName($name) {
    $pattern = "/^[a-zA-Z\s]+$/";
    return preg_match($pattern, $name) === 1;
}

// Fungsi untuk memvalidasi username
function validateUsername($username) {
    $username = trim($username); // Menghapus spasi di awal dan akhir
    return !empty($username) && strlen($username) >= 3; // Validasi panjang
}

// Fungsi untuk memvalidasi email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Fungsi untuk memvalidasi URL
function validateURL($url) {
    return filter_var($url, FILTER_VALIDATE_URL) !== false;
}

// Fungsi untuk memeriksa tipe data
function validateNumeric($value) {
    return is_numeric($value);
}

// Fungsi untuk memvalidasi tanggal
function validateDateInput($day, $month, $year) {
    return checkdate($month, $day, $year);
}

// Contoh input
$name = "John Doe";
$username = "user123";
$email = "user@example.com";
$url = "http://example.com";
$number = "123.45";
$day = 29;
$month = 2;
$year = 2024; // Tahun kabisat

// Validasi input dan tampilkan hasil
if (validateName($name)) {
    echo "Nama valid.<br>";
} else {
    echo "Nama tidak valid.<br>";
}

if (validateUsername($username)) {
    echo "Username valid.<br>";
} else {
    echo "Username tidak valid.<br>";
}

if (validateEmail($email)) {
    echo "Email valid.<br>";
} else {
    echo "Email tidak valid.<br>";
}

if (validateURL($url)) {
    echo "URL valid.<br>";
} else {
    echo "URL tidak valid.<br>";
}

if (validateNumeric($number)) {
    echo "Nilai ini adalah angka.<br>";
} else {
    echo "Nilai ini bukan angka.<br>";
}

if (validateDateInput($day, $month, $year)) {
    echo "Tanggal valid.<br>";
} else {
    echo "Tanggal tidak valid.<br>";
}

// Contoh penggunaan fungsi built-in
echo "<h3>Contoh Fungsi Built-in:</h3>";

// Regular Expressions
$regexTest = "Example123";
if (preg_match("/^[a-zA-Z0-9]+$/", $regexTest)) {
    echo "String '$regexTest' cocok dengan regex.<br>";
} else {
    echo "String '$regexTest' tidak cocok dengan regex.<br>";
}

// String Functions
$originalString = "   Hello World!   ";
$trimmedString = trim($originalString);
$lowercaseString = strtolower($originalString);
$uppercaseString = strtoupper($originalString);
echo "Original: '$originalString' <br>";
echo "Trimmed: '$trimmedString' <br>";
echo "Lowercase: '$lowercaseString' <br>";
echo "Uppercase: '$uppercaseString' <br>";

// Filter Functions
$ip = "192.168.1.1";
if (filter_var($ip, FILTER_VALIDATE_IP)) {
    echo "IP '$ip' valid.<br>";
} else {
    echo "IP '$ip' tidak valid.<br>";
}

// Type Testing Functions
$floatValue = 12.34;
if (is_float($floatValue)) {
    echo "Nilai ini adalah float.<br>";
} else {
    echo "Nilai ini bukan float.<br>";
}

// Date Functions
$day = 30;
$month = 2;
$year = 2024; // Tahun kabisat
if (checkdate($month, $day, $year)) {
    echo "Tanggal $day/$month/$year valid.<br>";
} else {
    echo "Tanggal $day/$month/$year tidak valid.<br>";
}
?>
