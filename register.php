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
    $name = $_POST["name"];
    $email = $_POST["email"];
    $reg_password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Пользователь с таким email уже зарегистрирован.";
    } else {
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$reg_password')";
        if (mysqli_query($conn, $sql)) {
            echo "Регистрация успешна.";
        } else {
            echo "Ошибка регистрации: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>