<?php
$name=$_POST['name'];
$phone=$_POST['phone'];
$what=$_POST['what'];

$to="vladislav.volodko1996@mail.ru";

$subject="Заявка на консультацию";
$message="У пользователя есть к вам вопрос.<br />
".htmlspecialchars($what)."<br />
Имя: ".htmlspecialchars($name)."<br />
Телефон: ".htmlspecialchars($phone);

$headers="From: chudin.ru <site-email@chudin.ru>\r\nContent-type: text/html; charset=utf-8 \r\n";
mail ($to, $subject, $message, $headers);
Header("Location: http://practika/");
exit();
?>
