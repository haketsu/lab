<?php
$users=array(
    "admin"=>"admin",
    "sasha"=>"sasha"
);
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
$error = "";
for ($i=0; $i < strlen($login); $i++) {
    $uppers = ($login[$i] >= 'A' && $login[$i] <= 'Z');
    $lowers = ($login[$i] >= 'a' && $login[$i] <= 'z');
    $numbers = ($login[$i] >= '0' && $login[$i] <= '9');

    if (!$uppers && !$lowers && !$numbers) {
        $error =  "Недопустимые символы в логине";
    }
}

for ($i=0; $i < strlen($password); $i++) {
    $uppers = ($password[$i] >= 'A' && $password[$i] <= 'Z');
    $lowers = ($password[$i] >= 'a' && $password[$i] <= 'z');
    $numbers = ($password[$i] >= '0' && $password[$i] <= '9');

    if (!$uppers && !$lowers && !$numbers) {
        $error =  "Недопустимые символы в пароле";
    }
}
if ($error === "" ) {
    if (isset($users[$login])) {
        if ($users[$login] === $password) {
            session_start();
            $_SESSION['username']=$login;
            header("location: schedule.php");

        } else {
            $error =  "Неверный пароль";
        }
    } else {
        $error =  "Такой логин не существует";
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

