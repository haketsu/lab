<?php
$users=array(
    "admin"=>"admin",
    "sasha"=>"sasha"
);
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
$error = "";
if ($error === "" ) {
    if (isset($users[$login])) {
        if ($users[$login] === $password) {
            session_start();
            $_SESSION['username']=$login;
            header("location: schedule.php");

        } else {
            echo "Неверный пароль";
        }
    } else {
        echo "Такой логин не существует";
    }
}
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Ошибка!</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
</head>
   <h3 align="center"><?php echo $error; ?> </h3>
   <span class="back"> <a role="button" href="index.html" style="background: rgb(239,239,239);border-radius: 4px;color: rgb(0,0,0);font-weight: bold;text-align: center">Обратно</a></span>
</body>
</html>

