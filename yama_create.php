<?php
session_start();
include('functions.php');
check_session_id();

if (
    !isset($_POST['mont']) || $_POST['mont'] === '' ||
    !isset($_POST['prefectures']) || $_POST['prefectures'] === ''
) {
    exit('paramError');
}

$username = $_SESSION["username"];

$mountain_id = $_POST['mountain_id'];
$mont = $_POST['mont'];
$nameKana = $_POST['nameKana'];
$area = $_POST['area'];
$prefectures = $_POST['prefectures'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];



// DB接続
$pdo = connect_to_db();

$sql = "INSERT INTO mountain(id,username, mountain_id, mont, nameKana, area, prefectures, latitude, longitude, created_at, updated_at) VALUES(NULL,:username, :mountain_id, :mont, :nameKana, :area,:prefectures, :latitude, :longitude, now(), now())";


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':mountain_id', $mountain_id, PDO::PARAM_STR);
$stmt->bindValue(':mont', $mont, PDO::PARAM_STR);
$stmt->bindValue(':nameKana', $nameKana, PDO::PARAM_STR);
$stmt->bindValue(':area', $area, PDO::PARAM_STR);
$stmt->bindValue(':prefectures', $prefectures, PDO::PARAM_STR);
$stmt->bindValue(':latitude', $latitude, PDO::PARAM_STR);
$stmt->bindValue(':longitude', $longitude, PDO::PARAM_STR);



try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:yama_read.php");
exit();
