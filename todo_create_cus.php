<?php

include("functions.php");

$pdo = connect_to_db();
// 送信確認
// var_dump($_POST);
// exit();

// データの受取
$namae = $_POST["namae"];
$date = $_POST["date"];
$bloodtype = $_POST["bloodtype"];
$age = $_POST["age"];
$seibetu = $_POST["seibetu"];
$tel = $_POST["tel"];
$jyusho = $_POST["jyusho"];
$birthday = $_POST["birthday"];
$Choice = $_POST["Choice"];
$experience = $_POST["experience"];
$experience1 = $_POST["experience1"];
$detail = $_POST["detail"];
// var_dump($_POST);
// exit();

// 項目入力のチェック
if (
  // !isset($_POST["id"]) || $_POST["id"]=='' ||
  !isset($_POST["namae"]) || $_POST["namae"]=='' ||
  !isset($_POST["birthday"]) || $_POST["birthday"]=='' ||
  !isset($_POST["bloodtype"]) || $_POST["bloodtype"]=='' ||
  !isset($_POST["age"]) || $_POST["age"]=='' ||
  !isset($_POST["seibetu"]) || $_POST["seibetu"]=='' ||
  !isset($_POST["tel"]) || $_POST["tel"]=='' ||
  !isset($_POST["jyusho"]) || $_POST["jyusho"]=='' ||
  !isset($_POST["date"]) || $_POST["date"]=='' 
  ) {
  exit("ParamError");
  }
//   var_dump($_POST);
// exit();
// 値が存在しないor空で送信されてきた場合はNGにする


// 受け取ったデータを変数に入れる
// $id = $_POST["id"];
$namae = $_POST["namae"];
$birthday = $_POST["birthday"];
$bloodtype = $_POST["bloodtype"];
$age = $_POST["age"];
$sex = $_POST["seibetu"];
$tel = $_POST["tel"];
$jyusho = $_POST["jyusho"];
$date = $_POST["date"];
$experience = $_POST["experience"];
$experience1 = $_POST["experience1"];
$detail = $_POST["detail"];
$Choice = $_POST["Choice"];
$Choice1 = $_POST["Choice1"];
$Choice2 = $_POST["Choice2"];
$Choice3 = $_POST["Choice3"];
//   var_dump($_POST);
// exit();


// DB接続の設定
// DB名は`gsacf_x00_00`にする

//各チョイスの中に配列を入れる
$Choice = join(",", $Choice);
$Choice1 = join(",", $Choice1);
$Choice2 = join(",", $Choice2);
$Choice3 = join(",", $Choice3);
// var_dump($_POST);
// exit();

// データ登録SQL作成
// `created_at`と`updated_at`には実行時の`sysdate()`関数を用いて実行時の日時を入力する
$sql = "INSERT INTO customer_table(id, namae, seibetu, birthday, age, bloodtype, jyusho, tel, date, trb1, care1, care2, care3, exp1, exp2, detail)
VALUES(NULL, :namae, :seibetu, :birthday, :age, :bloodtype, :jyusho, :tel, :date, :Choice, :Choice1, :Choice2, :Choice3, :experience, :experience, :detail)";
//   var_dump($_POST);
// exit();
// SQL準備&実行
$stmt = $pdo->prepare($sql);
// $stmt->bindValue(":id", $id, PDO::PARAM_INT);
$stmt->bindValue(":namae", $namae, PDO::PARAM_STR);
$stmt->bindValue(":seibetu", $seibetu, PDO::PARAM_STR);
$stmt->bindValue(":birthday", $birthday, PDO::PARAM_STR);
$stmt->bindValue(":bloodtype", $bloodtype, PDO::PARAM_STR);
$stmt->bindValue(":age", $age, PDO::PARAM_STR);
$stmt->bindValue(":tel", $tel, PDO::PARAM_STR);
$stmt->bindValue(":jyusho", $jyusho, PDO::PARAM_STR);
$stmt->bindValue(":date", $date, PDO::PARAM_STR);
$stmt->bindValue(":Choice", $Choice, PDO::PARAM_STR);
$stmt->bindValue(":Choice1", $Choice1, PDO::PARAM_STR);
$stmt->bindValue(":Choice2", $Choice2, PDO::PARAM_STR);
$stmt->bindValue(":Choice3", $Choice3, PDO::PARAM_STR);
$stmt->bindValue(":experience", $experience, PDO::PARAM_STR);
$stmt->bindValue(":experience1", $experience1, PDO::PARAM_STR);
$stmt->bindValue(":detail", $detail, PDO::PARAM_STR);
//   var_dump($_POST);
// exit();
$status = $stmt->execute(); // SQLを実行
//   var_dump($_POST);
// exit();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  // データ登録失敗次にエラーを表示
  exit("sqlError:".$error[2]);
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  header("Location:todo_input_cus.php");

}
