<?php

session_start();
if(isset($_SESSION['uid'])){
    echo "";
    }else{
    header('location: ../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body
        {
        background-image:url('../images/123.jfif');
        background-repeat: no-repeat;
        background-size: cover;
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <div align='center' style="font-weight: bold;font-family:'Times New Roman', Times, serif"><br><br><br><br>
        <h2 style="font-weight: 500; font-size: 32; color:white;">Courier Management Service</h2>
        <h4  style="font-weight: 500; font-size: 32; color:white;">The fastest courier service of India</h4><br><br>
        <h3  style="font-weight: 500; font-size: 32; color:white;"></h3>
        <h6  style="font-weight: 500; font-size: 32; color:white;">By G Bhargav Teja</h6>
    </div>
</body>
</html>