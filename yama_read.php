<?php
include("functions.php");
session_start();
// check_session_id();

$username = $_SESSION["username"];
$user_id = $_SESSION["user_id"];


$pdo = connect_to_db();


//ログインされたユーザーのみ表示

$sql = "SELECT * FROM mountain WHERE username='$username' AND deleted_at IS NULL ORDER BY mountain_id ASC";

$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}


$sql = "SELECT * FROM mountain LEFT OUTER JOIN (SELECT mountain_id, COUNT(id) AS like_count FROM `like_created` GROUP BY mountain_id) AS result_table ON mountain.id = result_table.mountain_id WHERE  username='$username' AND deleted_at IS NULL";

$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
  if ($record["like_count"] >= 1) {
    $images = 'img/yama_like.png';
  } else {
    $images = 'img/yama_normal.png';
  }
  $output .= "
    <tr>
      
      <td>{$record["mont"]}</td>
      <td>{$record["nameKana"]}</td>
      <td>{$record["area"]}</td>
      <td>{$record["prefectures"]}</td>
  
      <td>{$record["happy"]}</td>
      <td><a href='like_create.php?user_id={$user_id}&mountain_id={$record["id"]}'>
      
      <img src=$images alt=PL class='yama_like'><hidden {$record["like_count"]}>
      </a></td>
       

      <td>
      <a href='yama_edit.php?id={$record["id"]}'>編集</a>
      </td>
      <td>
       <a href='yama_delete.php?id={$record["id"]}'>削除</a>
      </td>
    </tr>
  ";
}

// <td>{$record["latitude"]}</td>
// <td>{$record["longitude"]}</td>

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="layout.css">
  <title>私の山リスト</title>
</head>

<body>
  <fieldset>
    <legend><?= $_SESSION["username"] ?>(<?= ["一般", "管理者"][$_SESSION["is_admin"]] ?>)の山リスト</legend>
    <a href="yama_input1.php">入力画面</a>
    <a href="user_logout.php">ログアウト</a>
    <table>
      <thead>
        <tr>

          <th>お山</th>
          <th>読みかな</th>
          <th>所在</th>
          <th>道都府県</th>
          <th>コメント</th>
          <th>行きたい山</th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>