<?php

// 送信データのチェック
var_dump($_POST);
// exit();

// 関数ファイルの読み込み
include("functions.php");

// 送信データ受け取り
$id = $_POST["id"];
var_dump($id);
// exit();
$namae = $_POST["namae"];
$date = $_POST["date"];
$bloodtype = $_POST["bloodtype"];
$age = $_POST["age"];
$seibetu = $_POST["seibetu"];
// $seibetu=$record["seibetu"];
$tel = $_POST["tel"];
$jyusho = $_POST["jyusho"];
$birthday = $_POST["birthday"];
// $Choice = $_POST["Choice"];
// $experience = $_POST["experience"];
// $experience1 = $_POST["experience1"];
// $detail = $_POST["detail"];

// DB接続
$pdo=connect_to_db();

// UPDATE文を作成&実行
$sql = "UPDATE customer_table SET namae=:namae, seibetu=:seibetu, birthday=:birthday, bloodtype=:bloodtype, age=:age, jyusho=:jyusho, tel=:tel, date=:date, WHERE id=:id";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$stmt->bindValue(":namae", $namae, PDO::PARAM_STR);
$stmt->bindValue(":seibetu", $seibetu, PDO::PARAM_STR);
$stmt->bindValue(":birthday", $birthday, PDO::PARAM_STR);
$stmt->bindValue(":bloodtype", $bloodtype, PDO::PARAM_STR);
$stmt->bindValue(":age", $age, PDO::PARAM_STR);
$stmt->bindValue(":tel", $tel, PDO::PARAM_STR);
$stmt->bindValue(":jyusho", $jyusho, PDO::PARAM_STR);
$stmt->bindValue(":date", $date, PDO::PARAM_STR);
// $stmt->bindValue(":Choice", $Choice, PDO::PARAM_STR);
// $stmt->bindValue(":Choice1",isset($Choice1), PDO::PARAM_STR);
// $stmt->bindValue(":Choice2", isset($Choice2), PDO::PARAM_STR);
// $stmt->bindValue(":Choice3", isset($Choice3), PDO::PARAM_STR);
// $stmt->bindValue(":experience", $experience, PDO::PARAM_STR);
// $stmt->bindValue(":experience1", $experience1, PDO::PARAM_STR);
// $stmt->bindValue(":detail", $detail, PDO::PARAM_STR);
//   var_dump($_POST);
// exit();
$status = $stmt->execute(); // SQLを実行
  // var_dump($_POST);
// exit();



// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は一覧ページファイルに移動し，一覧ページの処理を実行する
  header("Location:todo_read.php");
  exit();
}
