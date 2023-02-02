<?php
include("functions.php");

if (
    !isset($_POST['id']) || $_POST['id'] === ''
) {
    exit('paramError');
}

$id = $_POST['id'];
$mountain_id = $_POST['mountain_id'];
$happy = $_POST['happy'];


// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'UPDATE mountain SET mountain_id=:mountain_id, happy=:happy,updated_at=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$stmt->bindValue(':mountain_id', $mountain_id, PDO::PARAM_STR);
$stmt->bindValue(':happy', $happy, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:yama_read.php");
exit();
