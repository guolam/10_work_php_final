<?php
session_start();
include("functions.php");

// var_dump($_GET);
// exit();

// データ受け取り
$id = $_GET["id"];


// DB接続
$pdo = connect_to_db();

// SQL実行
// //物理削除
// $sql = 'DELETE FROM todo_table WHERE id=:id';

//論理削除
$sql = 'UPDATE mountain SET deleted_at=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location: yama_read.php");
exit();
