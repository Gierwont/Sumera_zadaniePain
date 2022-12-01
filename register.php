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
<body>
    <?php
    require('connect.php');
    error_reporting(0);

    $login= $_POST['login'];
    $name= $_POST['name'];
    $surname= $_POST['surname'];
    $age= $_POST['age'];
    $admin=$_POST['admin'];
    if($_POST['admin']==TRUE){
        $admin=1;
    }
    else {
        $admin=0;
    }
    $pass= sha1($_POST['pass']);


    $sql = "INSERT INTO user (login,haslo,surname,age,admin) VALUES ('$login','$pass','$surname','$age','$admin')";


    if($_POST['name']=="" || $_POST['surname']=="" || $_POST['age']==NULL)  {
        $sql = "INSERT INTO user (login,haslo";
    }


    if($_POST['name']!=""){
        $sql =$sql . ",name";
    }
    if($_POST['surname']!=""){
        $sql =$sql . ",surname";
    }
    if($_POST['age']!=NULL){
        $sql =$sql . ",age";
    }
    if($_POST['admin']!=FALSE){
        $sql =$sql . ",admin";
    }


    if($_POST['name']=="" || $_POST['surname']=="" || $_POST['age']==NULL){
        $sql = $sql . ") VALUES ('$login','$pass'";
    }


    if($_POST['name']!=""){
        $sql =$sql . ",'$name'";
    }
    if($_POST['surname']!=""){
        $sql =$sql . ",'$surname'";
    }
    if($_POST['age']!=NULL){
        $sql =$sql . ",'$age'";
    }
    if($_POST['admin']!=FALSE){
        $sql =$sql . ",'$admin'";
    }
    if($_POST['name']=="" || $_POST['surname']=="" || $_POST['age']==NULL){
        $sql = $sql . ");";
    }


    if (mysqli_query($conn, $sql)) {
        echo "<h1>Dodano rekord</h1>";
    } 
    else {
        echo '<div class="text">błąd: ' . $sql  . mysqli_error($conn) .'</div>';
    }



    mysqli_close($conn);
    ?>
    <br><div class="text"><a href="index.php">Powrót</a></div> 
</body>
</html>