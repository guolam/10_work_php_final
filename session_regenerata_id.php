<?php
// sessionをスタートしてidを再生成しよう．

session_start();
$session_id = session_id();

session_regenerate_id(true); //session_idが存在したら
$new_session_id = session_id(); //新たに作り直す

// 旧idと新idを表示しよう．

var_dump($session_id);
var_dump($new_session_id);

// echo "<p>old_id:{$session_id}</p> ";
// echo "<p>new_id:{$new_session_id}</p> ";

exit();
