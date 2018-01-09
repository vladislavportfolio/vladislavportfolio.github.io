<?php
    require "db.php";
        
    $data = $_POST;
    if(isset($data['do_login']))
    {
        $errors = array();
        $user = R::findOne('users', 'login = ?', array($data['login']));
    
    if($user)
    { 
        //логин существует
     if(password_verify($data['password'],$user->password))
     {
        //все хорошо, логиним пользователя
        $_SESSION['logged_user'] = $user;
        echo '<div class="ok">Вы авторизованы!<br>Теперь можете перейти на <a href ="/">главную</a> страницу.</div><hr>';
     } else
     {
         $errors[] = 'Введен не верный пароль!';
     }
     } else
     {
        $errors[] = 'Пользователь с таким логином не найден!';
     }
        
         if(!empty($errors))
        {
             echo '<div class="errors">'.array_shift($errors).'</div><hr>';
        }
    }
?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Заголовок </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/registr.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico'>
    </head>
  <body>
 
<div class="caption">
    <h1>Вход в систему</h1>
</div> 
<div class="col-md-4 col-md-offset-4" >
<form action="/login.php" method="POST">
    
      <p> 
        <div class="form">
            <p>Логин</p>
            <input type="text" class="form-control" name="login" placeholder="Enter login..." value="<?php echo @$data['login']; ?>">
        </div>
     </p>
    
    <p>
        <div class="form">
            <p>Ваш пароль</p>
            <input type="password" class="form-control" name="password" placeholder="Enter password...">
        </div>
    </p>
    
      <button type="submit" name="do_login">Войти</button>
    
</form>
