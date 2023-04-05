
<!-- // Создаем БД емсли она ещё не создана
CREATE DATABASE if NOT EXISTS `test`;
USE test;
// В БД создаем таблицу
CREATE TABLE `users` (
    // Столбцы таблицы
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) DEFAULT NULL, 
    `age` SMALLINT(6) DEFAULT NULL,
    `city`  VARCHAR(100) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;
INSERT INTO `users` (`id`, `name`, `age`, `city`) VALUES (1, 'Ivan', 25, 'Kyiv');
INSERT INTO `users` (`id`, `name`, `age`, `city`) VALUES (2, 'Petr', 37, 'Omsk');
INSERT INTO `users` (`id`, `name`, `age`, `city`) VALUES (3, 'Galina', 18, 'St. Peterburg');
INSERT INTO `users` (`id`, `name`, `age`, `city`) VALUES (4, 'Stepan', 45, 'Magnitogorsk');
INSERT INTO `users` (`id`, `name`, `age`, `city`) VALUES (5, 'Nataliya', 35, 'Novosibirsk');
INSERT INTO `users` (`id`, `name`, `age`, `city`) VALUES (6, 'Денис', 49, 'Миасс'); -->

<?php
// mysqli_connect - подключиться к базе данных
$db_handle = mysqli_connect('localhost',  'root', '', 'test');
if($db_handle === false) {
    // die - печать сообщения и выход из скрипта
    die("ОШИБКА: Неозможно подключиться к БД " . mysqli_connect_error());
} 
else {
    echo "Поключение к БД прошло успешно";
}


// mysqli_select_db - выбирает для работы указанную базу данных на сервере, на который ссылается переданный указатель.
mysqli_select_db($db_handle, "test") or die(mysqli_error($db_handle));

// --------------------------------------
// Извдечь данные из БД

// Запрос на извлечение данных
// Объявляем переменную и пишем в неё запрос (вывод всех данных)
$s = "SELECT * FROM users";
// Отобразитиь результаты запроса mysqli_query() две переменные: 1. подключение к БД 2. Наш запрос
$result = mysqli_query($db_handle, $s);
echo '<pre>';
print_r($result);
echo 'pre</pre>';
// echo PHP_EOL . $result . PHP_EOL; Массив не будет выводиться через echo

// --------------------------------------------------
// Вставить запись в БД с помощью INSERT INTO
echo PHP_EOL . "Шаг 1: Вставить данные<hr>" . PHP_EOL;
$sql = "INSERT INTO users (name, age, city) VALUES ('Татьяна', 46, 'Миасс')";
// Проверяем вставку данных
$insert = mysqli_query($db_handle, $sql);
if($insert) {
    echo "Данные вставлены" . PHP_EOL;
} else {
    echo "Произошла ошибка при вставке данных" . PHP_EOL;
}
echo "insert: " . $insert . PHP_EOL;
echo '<pre>';
print_r($result);
echo '</pre>';



// Закрыть подключение к БД - закрывает все сессии, но с версии 4 это уже правило хрошего тона
mysqli_close($db_handle);
?>