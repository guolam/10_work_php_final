<?php
session_start();
include("functions.php");
check_session_id();


$user_id = $_GET['user_id'];
$mountain_id = $_GET['mountain_id'];

$pdo = connect_to_db();

// $sql = 'INSERT INTO like_table (id, user_id, mountain_id, created_at) VALUES (NULL, :user_id, :mountain_id, now())';
// $sql = 'SELECT kadai_id AND COUNT(id) AS CNT FROM like_table GROUP BY kadai_id';

$sql = 'SELECT COUNT(*) FROM like_created WHERE user_id=:user_id AND mountain_id=:mountain_id';


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':mountain_id', $mountain_id, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

$like_count = $stmt->fetchColumn();

if ($like_count !== 0) {
    $sql = 'DELETE FROM like_created WHERE user_id=:user_id AND mountain_id=:mountain_id';
} else {
    $sql = 'INSERT INTO like_created (id, user_id, mountain_id, created_at) VALUES(NULL, :user_id, :mountain_id, now())';
}


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':mountain_id', $mountain_id, PDO::PARAM_STR);


try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:yama_read.php");
exit();
