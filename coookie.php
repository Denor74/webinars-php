<?php

var_dump($_COOKIE);
setcookie('login', 'admin', 0, '/');

//setcookie($name1, $value1, $ttl1, $patch1);
// login $name - куки
// admin $value - значение которое мы задаем
// 0 $ttl - значение когда должен истечь срок существование куки, 0 по умолчанию и работает до закрытия файла или в секундах
// / $patch - путь в адресной строке  - '/' доступен из всех директорий сайта

$name = "Denis";
$age = "49";
setcookie("name", $name);
setcookie("age", $age, time() +3600); // срок действия 1 час
echo "Куки установлены";