<?php
require_once('db.php');


function connect_to_db()

{
    $dsn = "mysql:host=www2950.sakura.ne.jp;dbname=guolam_mountain;charser=utf8";
    $user = 'guolam';
    $pwd = 'online123';

    try {
        return new PDO($dsn, $user, $pwd);
    } catch (PDOException $e) {
        echo json_encode(["db error" => "{$e->getMessage()}"]);
        exit();
    }
}





try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "データベース{$dbName}に接続しました。";
    $pdo = NULL;
} catch (Exception $e) {
    echo "<span class='error'>エラーがありました。</span><br>";
    echo $e->getMessage();
    exit();
}
