<?php
require_once('config.php'); // подключение файла с паролями для доступа к БД

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); // соединение с БД
if ($conn->connect_error) { // не удаётся подключиться
    echo "Ошибка подключения: " . $conn->connect_error; // сообщение об ошибке
}

$sql = file_get_contents('1_create_table.sql'); // чтение содержимого файла SQL-запроса
$result = $conn->query($sql); // выполнение SQL-запроса

$result = $conn->query("DESCRIBE images"); // запрос о выводе содержимого

if ($result && $result->num_rows > 0) { // если есть данные - вывод таблицы
    while ($row = $result->fetch_assoc()) { // извлекаем строки c описанием полей
        foreach ($row as $key => $value) { // перебираем все элементы
            echo nl2br($key . ': ' . $value . "\n");  // каждый столбец каждой строки через :
        }
        echo nl2br("\n");
    }
} else { // нет данных, значит ошибка
    if ($conn->errno == 1146) { 
        echo 'Таблица не существует' . nl2br("\n");
    } else {
        echo 'Ошибка: ' . $conn->errno . ' ' . $conn->error . nl2br("\n"); // код ошибки и её описание
    }
}

$conn->close(); // закрытие соединения
?>