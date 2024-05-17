<?php
$servername = "localhost";
$username = "пользователь";
$password = "пароль";
$dbname = "имя_базы_данных";

$conn = mysqli_connect("localhost", "root", "root", "spes");
if (!$conn) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Успешный вход
        header("Location: index.html"); 
        exit(); // Прерывает выполнение скрипта после перенаправления
    } else {
        echo "Неверный email или пароль.";
    }

    mysqli_close($conn);
}
?>