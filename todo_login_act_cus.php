<?php
// var_dump($_POST);
// exit();
session_start();
// 外部ファイル読み込み
include("functions.php");

// DB接続します
$pdo=connect_to_db();

// データ受け取り
$username = $_POST['username'];
$password = $_POST['password'];

var_dump($username);
var_dump($password);
// exit();

// データ取得SQL作成&実行
$sql = 'SELECT * FROM users_table
WHERE username=:username
AND password=:password
AND is_deleted=0';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();


// SQL実行時にエラーがある場合はエラーを表示して終了
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  // exit();
}

// うまくいったらデータ（1レコード）を取得
$val = $stmt->fetch(PDO::FETCH_ASSOC);

// ユーザ情報が取得できない場合はメッセージを表示
if (!$val) {
  echo "<p>ログイン情報に誤りがあります．</p>";
  echo '<a href="todo_login.php">login</a>';
  exit();
} else {
  // ログインできたら情報をsession領域に保存して一覧ページへ移動
  // var_dump($val);
  // exit();
  $_SESSION = array(); // セッション変数を空にする
  $_SESSION["session_id"] = session_id();
  $_SESSION["is_admin"] = $val["is_admin"];
  $_SESSION["username"] = $val["username"];
  header("Location:todo_read.php"); // 一覧ページへ移動
  exit();
  };
