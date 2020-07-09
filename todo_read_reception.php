<?php
// DB接続の設定
// DB名は`gsacf_x00_00`にする

include("functions.php");

$pdo = connect_to_db();

// データ取得SQL作成
$sql = 'SELECT * FROM customer_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// SQL準備&実行
$view='';

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  exit('sqlError:'.$error[2]);
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  // fetchAll()関数でSQLで取得したレコードを配列で取得できる
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
  $output = "";
  // <tr><td>deadline</td><td>todo</td><tr>の形になるようにforeachで順番に$outputへデータを追加
  // `.=`は後ろに文字列を追加する，の意味
  foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["id"]}</td>";
    $output .= "<td>{$record["namae"]}</td>";
    $output .= "<td>{$record["date"]}</td>";
    $output .= "</tr>";
    // edit deleteリンクを追加
    // $output .= "<td><a href='todo_edit_cus.php?id={$record["id"]}'>edit</a></td>";
    // $output .= "<td><a href='todo_delete_cus.php?id={$record["id"]}'>delete</a></td>";
    $output .= "</tr>";
  }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お客様情報（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>お客様情報（一覧画面）</legend>
    <a href="top.php">ログアウト</a>
    <table>
      <thead>
        <tr>
          <th>ID</th><br>
          <th>お名前</th><br>
          <th>最終施術日</th><br>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>