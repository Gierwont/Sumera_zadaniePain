<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="loged">
<div id="cont" class="container">
    <h1 class="text">Zalogowano pomyślnie</h1>
    <br><br><div class="text"><a href="logout.php">Wyloguj</a></div>

    <h2 class="text">Wstawianie danych do tabel</h2>
    <form action="" method="POST">
        Podaj nazwę klasy: <input type="text" name="klasa"><br>
        <button type="submit" value="submit"> Wstaw rekord do bazy</button>
    </form><br><br><br>

    <form action="" method="POST">
        Podaj imię ucznia: <input type="text" name="student_name"><br>
        Podaj nazwisko ucznia: <input type="text" name="student_surname"><br>
        Podaj nazwę klasy ucznia: <input type="text" name="student_klasaname"><br>
        <button type="submit" value="submit"> Wstaw rekord do bazy</button>
    </form><br><br><br>

    <form action="" method="POST">
        Podaj nazwę przedmiotu: <input type="text" name="subject_name"><br>
        Podaj nazwę klasy w której odbędą się zajęcia: <input type="text" name="subject_klasaname"><br>
        <button type="submit" value="submit"> Wstaw rekord do bazy</button>
    </form><br><br><br>

    <form action="" method="POST">
        Podaj imię nauczyciela: <input type="text" name="teacher_name"><br>
        Podaj nazwisko nauczyciela: <input type="text" name="teacher_surname"><br>
        Podaj wiek nauczyciela: <input type="number" name="teacher_age"><br>
        <button type="submit" value="submit"> Wstaw rekord do bazy</button>
    </form><br><br>


    <h1 class="text">Edytowanie danych</h1>
    <form action="" method="POST">
        <div class="text">Podaj login:</div> <input type="text" name="user_login"><br>
        <div class="text">Podaj hasło:</div> <input type="password" name="user_pass"><br>

        <div class="text">Podaj imie:</div> <input type="text" name="user_name"><br>
        <div class="text">Podaj nazwisko:</div> <input type="text" name="user_surname"><br>
        <div class="text">Podaj wiek:</div> <input type="number" name="user_age"><br>
        <div class="text">Admin:<br>Tak<input type="radio" name="admin" value=1><br> Nie<input type="radio" name="admin" value=0><br>  </div>   
        <button type="submit" value="submit">Edytuj dane</button>
    </form><br><br><br>




    <h1>Wyświetlanie tablic</h1>
    <form method="post">
        <input class="button" type="submit" name="button1"
                value="Klasy"/>
          
        <input class="button" type="submit" name="button2"
                value="Uczniowie"/>

        <input class="button" type="submit" name="button3"
                value="Przedmioty"/>
          
        <input class="button" type="submit" name="button4"
                value="Nauczyciele"/>

        <input class="button" type="submit" name="button5"
            value="Użytkownicy"/>
    </form>
    </div>


    <?php
    require('connect.php');

    $login = $_SESSION['login'];
    $obecne_id = "";
    $obecne_id = mysqli_fetch_array(mysqli_query($conn,"SELECT id FROM `user` WHERE `login` = '$login'")); 
    $obecne_id=(int)$obecne_id[0];
    

        if(isset($_POST['klasa'])){ //wstawianie rekordów do tabeli klasa
    $klasa= $_POST['klasa'];

    $sql1 = "INSERT INTO klasa (name,dodane_przez) VALUES ('$klasa','$obecne_id')";
    if (mysqli_query($conn, $sql1)) {
        echo "<div class='text'>Dodano rekord</div>";
    } 
    else {
        echo "błąd: " . $sql1  . mysqli_error($conn);
    }
    }

        if(isset($_POST['student_surname'])){ //wstawianie rekordów do tabeli student
    $student_name= $_POST['student_name'];
    $student_surname= $_POST['student_surname'];
    $student_klasaname=$_POST['student_klasaname'];
    $student_klasaid = mysqli_fetch_array(mysqli_query($conn,"SELECT id FROM `klasa` WHERE `name` = '$student_klasaname'")); 
    $student_klasaid=(int)$student_klasaid[0];

    $sql2 = "INSERT INTO student (name,surname,class_id,dodane_przez) VALUES ('$student_name','$student_surname','$student_klasaid','$obecne_id')";
    if (mysqli_query($conn, $sql2)) {
        echo "<div class='text'>Dodano rekord</div>";
    } 
    else {
        echo "błąd: " . $sql2  . mysqli_error($conn);
    }
    }

        if(isset($_POST['subject_name'])){ //wstawianie rekordów do tabeli subject
    $subject_name = $_POST['subject_name'];
    $subject_klasaname=$_POST['subject_klasaname'];
    $subject_klasaid = mysqli_fetch_array(mysqli_query($conn,"SELECT id FROM `klasa` WHERE `name` = '$subject_klasaname'")); 
    $subject_klasaid=(int)$subject_klasaid[0];

    $sql3 = "INSERT INTO subject (name,class_id,dodane_przez) VALUES ('$subject_name','$subject_klasaid','$obecne_id')";
    if (mysqli_query($conn, $sql3)) {
        echo "<div class='text'>Dodano rekord</div>";
    } 
    else {
        echo "błąd: " . $sql3  . mysqli_error($conn);
    }
    }

        if(isset($_POST['teacher_name'] )) { //wstawuanie rekordów do tabeli teacher
    $teacher_name = $_POST['teacher_name'];
    $teacher_surname = $_POST['teacher_surname'];
    $teacher_age = $_POST['teacher_age'];

    $sql4 = "INSERT INTO teacher (id,name,surname,age,dodane_przez) VALUES (NULL, '$teacher_name','$teacher_surname','$teacher_age','$obecne_id');";
    if (mysqli_query($conn, $sql4)) {
        echo "<div class='text'>Dodano rekord</div>";
    } 
    else {
        echo "błąd: " . $sql4  . mysqli_error($conn);
    }
    }
    echo "<br><br><br><br><br><br><br><br><br><br><br>";
    


    if(isset($_POST['user_login'])){  //edytowanie danych użytkownika
    $user_login = $_POST['user_login'];
    $user_pass= sha1($_POST['user_pass']);
    $user_name = $_POST['user_name'];
    $user_surname = $_POST['user_surname'];
    $user_age = $_POST['user_age'];
    if(empty($_POST['admin'])) {
        $admin=0;
    }
    else{
        $admin=$_POST['admin'];
    }
    $_SESSION['login'] = $user_login;
    $sql_edit = "UPDATE user SET login = '$user_login', haslo= '$user_pass', name= '$user_name', surname= '$user_surname', age= '$user_age', admin= '$admin' WHERE id = $obecne_id;";
    if (mysqli_query($conn, $sql_edit)) {
        echo "<div class='text'>Dodano rekord</div>";
    } 
    else {
        echo "błąd: " . $sql_edit  . mysqli_error($conn);
    }
    
    }



    if(isset($_POST['button1'])) {  //wyswietlanie tabeli klasa
        echo "<h1>Tabela klasa</h1><br>";
        $result = mysqli_query($conn, "SELECT * FROM klasa WHERE dodane_przez=$obecne_id");
        echo '<table><tr><th>Id</th><th>Name</th></tr>';
        while($row = mysqli_fetch_array($result)) {
            echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td></tr>";
        }
        echo '</table>';
    }
    if(isset($_POST['button2'])) {  //wyswietlanie tabeli student
        echo "<h1>Tabela student</h1><br>";
        $result = mysqli_query($conn, "SELECT * FROM student WHERE dodane_przez=$obecne_id");
        echo '<table><tr><th>Id</th><th>Name</th><th>Surname</th><th>Class_Id</th></tr>';
        while($row = mysqli_fetch_array($result)) {
            echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['surname']}</td><td>{$row['class_id']}</td></tr>";
        }
        echo '</table>';
    }
    if(isset($_POST['button3'])) { //wyswietlanie tabeli subject
        echo "<h1>Tabela subject</h1><br>";
        $result = mysqli_query($conn, "SELECT * FROM subject WHERE dodane_przez=$obecne_id");
        echo '<table><tr><th>Id</th><th>Name</th><th>Class_Id</th></tr>';
        while($row = mysqli_fetch_array($result)) {
            echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['class_id']}</td></tr>";
        }
        echo '</table>';
    }
    if(isset($_POST['button4'])) { //wyswietlanie tabeli teacher
        echo "<h1>Tabela teacher</h1><br>";
        $result = mysqli_query($conn, "SELECT * FROM teacher WHERE dodane_przez=$obecne_id");
        echo '<table><tr><th>Id</th><th>Name</th><th>Surname</th><th>Age</th></tr>';
        while($row = mysqli_fetch_array($result)) {
            echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['surname']}</td><td>{$row['age']}</td></tr>";
        }
        echo '</table>';
    }
    if(isset($_POST['button5'])) { //wyswietlanie tabeli user
        echo "<h1>Tabela user</h1><br>";
        $result = mysqli_query($conn, "SELECT * FROM user WHERE id=$obecne_id");
        echo '<table><tr><th>Id</th><th>Login</th><th>Haslo</th><th>Name</th><th>Surname</th><th>Age</th><th>Admin</th></tr>';
        while($row = mysqli_fetch_array($result)) {
            echo "<tr> <td>{$row['id']}</td> <td>{$row['login']}</td> <td>{$row['haslo']}</td> <td>{$row['name']}</td> <td>{$row['surname']}</td> <td>{$row['age']}</td> <td>{$row['admin']}</td> </tr>";
        }
        echo '</table>';
    }
    mysqli_close($conn);
    ?>
    
</body>
</html>