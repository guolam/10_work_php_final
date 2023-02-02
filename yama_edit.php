<?php
include("functions.php");

// id受け取り
$id = $_GET["id"];

// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = "SELECT*FROM mountain WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>編集画面</title>
</head>

<body>
  <form action="yama_update.php" method="POST">
    <fieldset>
      <legend>行きたかった山</legend>
      <a href="yama_read.php">一覧画面</a>
      <div>
        <input type="hidden" name="id" value="<?= $record["id"] ?>">
        <input type="hidden" name="mountain_id" value="<?= $record["mountain_id"] ?>">

        <p>山：<?= $record["mont"] ?></p>
        <p>読み：<?= $record["nameKana"] ?></p>
        <p>地域：<?= $record["area"] ?></p>
        <p>県：<?= $record["prefectures"] ?></p>
        <p>経度：<?= $record["latitude"] ?></p>
        <p>緯度：<?= $record["longitude"] ?></p>
        <p>所感:<textarea name="happy" value="<?= $record["happy"] ?>"></textarea>
        <div>

        </div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>