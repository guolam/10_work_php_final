<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>山記録</title>
</head>

<body>
  <form action="user_register_act.php" method="POST">
    <fieldset>
      <legend>山記録の登録画面</legend>
      <div>
        ユーザネーム: <input type="text" name="username">
      </div>
      <div>
        パスワード: <input type="text" name="password">
      </div>
      <div>
        <button>登録</button>
      </div>
      <a href="index.php">ログインはこちら</a>
    </fieldset>
  </form>

</body>

</html>