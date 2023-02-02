<?php

// var_dump($_POST);
// exit();

include("functions.php");

if (
    !isset($_POST['name']) || $_POST['name'] === '' ||
    !isset($_POST['prefectures']) || $_POST['prefectures'] === ''
) {
    exit('paramError');
}

$mountain_id = $_POST['mountain_id'];
$name = $_POST['name'];
$nameKana = $_POST['nameKana'];
$area = $_POST['area'];
// $gsiUrl = $_POST['gsiUrl'];
$prefectures = $_POST['prefectures'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];



// DB接続
$pdo = connect_to_db();

$sql = "INSERT INTO mountain(id,mountain_id, name, nameKana, area, prefectures, latitude, longitude, created_at, updated_at) VALUES(NULL,:mountain_id, :name, :nameKana, :area, prefectures:prefectures, :latitude, :longitude, now(), now())";

//gsiUrl:gsiUrl,

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':mountain_id', $mountain_id, PDO::PARAM_STR);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':nameKana', $nameKana, PDO::PARAM_STR);
$stmt->bindValue(':area', $area, PDO::PARAM_STR);
$stmt->bindValue(':prefectures', $prefectures, PDO::PARAM_STR);
$stmt->bindValue(':latitude', $latitude, PDO::PARAM_STR);
$stmt->bindValue(':longitude', $longitude, PDO::PARAM_STR);
// $stmt->bindValue(':gisUrl', $gisUrl, PDO::PARAM_STR);


try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:mt_read.php");
exit();
