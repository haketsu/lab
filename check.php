<?php
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
    echo "Недопустимая длина логина";
    exit();}
    else if(mb_strlen($name) < 1 || mb_strlen($name) > 90){
        echo"Недопустимая длина имени";
        exit();
    }

    $password = md5($password."rdgwsg3466");

    $mysql = new mysqli('localhost', 'root', '','register');
    $mysql->query("INSERT INTO `users` (`login`, `password`, `name`)
    VALUES('$login', '$password', '$name')");
    $mysql->close();

    header('Location: /');
?>