<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <form action="register.php" method="POST">
        <div class="text">Podaj login:</div> <input type="text" name="login"><br>
        <div class="text">Podaj hasło:</div> <input type="password" name="pass"><br>

        <div class="text">Podaj imie:</div> <input type="text" name="name"><br>
        <div class="text">Podaj nazwisko:</div> <input type="text" name="surname"><br>
        <div class="text">Podaj wiek:</div> <input type="number" name="age"><br>
        <div class="text">Admin:<br>Tak:<input type="radio" name="admin" value=1><br> Nie:<input type="radio" name="admin" value=0><br>  </div>   
        <button type="submit" value="submit">zarejestruj się</button>
    </form><br><br><br>
    <form action="login.php" method="POST">
        <div class="text">Podaj login:</div> <input type="text" name="login"><br>
        <div class="text">Podaj hasło:</div> <input type="password" name="pass"><br>
        <button type="submit" value="submit">zaloguj się</button>
    </form>
    </div>
</body>
</html>