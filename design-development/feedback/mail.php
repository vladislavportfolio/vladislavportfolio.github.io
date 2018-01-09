<?php

$recepient = "vladislav.volodko1996@mai.ru";
$sitename = "WebDesign";

$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$title = trim($_POST["title"]);
$message = "Имя: $name \nЭлектронная почта: $email \nТекст: $title";

$pagetitle = "Новая заявка с сайта \"$sitename\"";
mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");