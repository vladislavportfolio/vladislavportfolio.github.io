<?php
    require "db.php";
        
    $data = $_POST;
    if(isset($data['do_signup']))
    {
        
        $errors = array();
          if(trim($data['email']) == '')
        {
            $errors[] = 'Введите Email!';
        }
        
        if(trim($data['login']) == '')
        {
            $errors[] = "Введите логин!";
        }
        
         if(($data['password']) == '')
        {
            $errors[] = 'Введите пароль!';
        }
        
          if(R::count('users', "login = ?", array($data['login'])) > 0)
        {
            $errors[] = 'Пользователь с таким логином уже существует!';
        }
        
         if(R::count('users', "email = ?", array($data['email'])) > 0)
        {
            $errors[] = 'Пользователь с таким email уже существует!';
        }
        
        
          if(($data['password_2']) != $data['password'])
        {
            $errors[] = 'Повторный пароль введен не верно!';
        }
        
        if(empty($errors))
        {
            $user = R::dispense('users');
            $user->login = $data['login'];
            $user->email = $data['email'];
            $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
            R::store($user);
            
            echo '<div class="ok">Вы успешно зарегистрированы</div><hr>';
            
        }
        else{
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
    <h1>Регистрация</h1>
</div> 
<div class="col-md-4 col-md-offset-4" >
<form action="signup.php" method="POST">
    <p> 
        <div class="form">
            <p>Введите Email</p>
            <input type="email" class="form-control" name="email" placeholder="Enter email..."  value="<?php echo @$data['email']; ?>">
        </div>
    </p>
       
     <p> 
        <div class="form">
            <p>Ваш логин</p>
            <input type="text" class="form-control" name="login" placeholder="Enter login..." value="<?php echo @$data['login']; ?>">
        </div>
     </p>

    <p>
        <div class="form">
            <p>Ваш пароль</p>
            <input type="password" class="form-control" name="password" placeholder="Enter password...">
        </div>
    </p>
    
    <p>
        <div class="form">
            <p>Введите пароль еще раз</p>
            <input type="password" class="form-control" name="password_2" placeholder="Enter password...">
        </div>
        
    </p>
    <button type="submit" name="do_signup">Зарегистироваться</button>
</form>
<div class="caption"><p>Чтобы вернуться на главную страницу нажмите <a href="/">здесь</a></p>
</div>
</div>
</div>
</html>