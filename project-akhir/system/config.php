<?php 
$server = "localhost";
$user = "root";
$password = "";
$database = "blog_db";

try {
    $connect = new PDO("mysql:host=$server;dbname=$database",$user,$password);
} catch (PDOException $error) {
    die("Koneksi Gagal: ".$error->getMessage());
}
