<?php
// 送信データのチェック
var_dump($_GET);
// exit();

// $seibetu = $_POST["seibetu"];
// var_dump($seibetu);

// 関数ファイルの読み込み
include("functions.php");

// idの受け取り
$id = $_GET['id'];
var_dump($id);
// $seibetu = $_GET["seibetu"];
// exit();


// DB接続
$pdo = connect_to_db();

// データ取得SQL作成
$sql = 'SELECT * FROM customer_table WHERE id=:id';
// $sql = 'SELECT * FROM customer_table WHERE id=:id and seibetu="女"';
// var_dump($sql);
// exit();
// $seibetu = $_POST["seibetu"];
// $radioVal = 'SELECT * FROM customer_table WHERE id=:id and seibetu="女"';
// var_dump($radioVal);

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
// $stmt->bindValue(':seibetu', $seibetu, PDO::PARAM_INT);
$status = $stmt->execute();
// $seibetu = $_GET["seibetu"];
// var_dump($seibetu);

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は指定の11レコードを取得
  // fetch()関数でSQLで取得したレコードを取得できる
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
  // var_dump($_GET);
  // exit();
}
$seibetu=$record["seibetu"];
// var_dump($seibetu);
$trb1=$record["trb1"];
// var_dump($trb1);
// $trb11=explode("",$trb1);
// var_dump($trb11);
$care1=$record["care1"];
// var_dump($care1);

$care2=$record["care2"];
// var_dump($care2);

$care3=$record["care3"];
// var_dump($care3);
$exp1=$record["exp1"];
$exp2=$record["exp2"];

// exit();
// if (isset($_POST["seibetu"])) {
//   if ($_POST['seibetu'] === "男") {
//   echo '男';
//   } else {
//   echo '女';
//   }
//   var_dump($_POST["seibetu"]);
//   }


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>エステカウンセリングシート（編集画面）</title>
</head>

<body>
  <form action="todo_update_cus.php" method="POST">
  <fieldset>
      <legend>エステカウンセリングシート（編集画面）</legend>
      <a href="todo_read_cus.php">一覧画面</a>
      <h3>お客様情報</h3>
      <p><div>カウンセリング日:<input type="date" name="date" value="<?=$record["date"]?>"></div></p>
      <!-- <p><div>お客様番号：<input type="text" name="id"></div></p> -->
      <p><div>名前: <input type="text" name="namae" value="<?=$record["namae"]?>"></div></p>
      <p><div>生年月日: <input type="text" name="birthday" value="<?=$record["birthday"]?>"></div></p> 
      <p><div>性別: <laber><input id="male" type="radio" name="seibetu" value="男" <?php if( !empty($seibetu) && $seibetu === "男" ){ echo 'checked'; } ?>>男</laber>
                    <laber><input id="female" type="radio" name="seibetu" value="女" <?php if( !empty($seibetu) && $seibetu === "女" ){ echo 'checked'; } ?>>女</laber>
      <p><div>年齢: <input type="text" name="age" value="<?=$record["age"]?>"></div></p>
      <p><div>血液型: <input type="text" name="bloodtype" value="<?=$record["bloodtype"]?>"></div></p> 
      <p><div>住所: <input type="text" name="jyusho" value="<?=$record["jyusho"]?>"></div></p>
      <p><div>電話番号: <input type="text" name="tel" value="<?=$record["tel"]?>"></div></p>
      
      <div class="formA">
      <h3>お肌の悩み</h3>
          <li><input type="checkbox" name="Choice[]" id="checkbox1"  value="<?=$record["trb1"]?>"<?php if( isset($trb1) && strpos($trb1, "肌荒れ") !==false ){ echo 'checked'; } ?>>
          <label class="label1" for="checkbox1">肌荒れ</label>
          </li>
          <li><input type="checkbox" name="Choice[]" id="checkbox2" value="<?=$record["trb1"]?>"<?php if( isset($trb1) && strpos($trb1, "しわ") !==false ){ echo 'checked'; } ?>>
          <label class="label2" for="checkbox2">しわ</label>
          </li>
          <li><input type="checkbox" name="Choice[]" id="checkbox3" value="<?=$record["trb1"]?>"<?php if( isset($trb1) && strpos($trb1, "くすみ") !==false ){ echo 'checked'; } ?>>
          <label class="label3" for="checkbox3">くすみ</label>
          </li>
          <li><input type="checkbox" name="Choice[]" id="checkbox4" value="<?=$record["trb1"]?>"<?php if( isset($trb1) && strpos($trb1, "しみ") !==false ){ echo 'checked'; } ?>>
          <label class="label4" for="checkbox4">しみ</label>
          </li>
          <li><input type="checkbox" name="Choice[]" id="checkbox5" value="<?=$record["trb1"]?>"<?php if( isset($trb1) && strpos($trb1, "にきび") !==false ){ echo 'checked'; } ?>>
          <label class="label5" for="checkbox5">にきび</label>
          </li>
          <li><input type="checkbox" name="Choice[]" id="checkbox6" value="<?=$record["trb1"]?>"<?php if( isset($trb1) && strpos($trb1, "たるみ") !==false ){ echo 'checked'; } ?>>
          <label class="label6" for="checkbox6">たるみ</label>
          </li>
          <li><input type="checkbox" name="Choice[]" id="checkbox7" value="<?=$record["trb1"]?>"<?php if( isset($trb1) && strpos($trb1, "アトピー") !==false ){ echo 'checked'; } ?>>
          <label class="label7" for="checkbox7">アトピー</label>
          </li>
          <li><input type="checkbox" name="Choice[]" id="checkbox8" value="<?=$record["trb1"]?>"<?php if( isset($trb1) && strpos($trb1, "メイク崩れ") !==false ){ echo 'checked'; } ?>>
          <label class="label8" for="checkbox8">メイク崩れ</label>
          </li>
          <li><input type="checkbox" name="Choice[]" id="checkbox9" value="<?=$record["trb1"]?>"<?php if( isset($trb1) && strpos($trb1, "毛穴の開き") !==false ){ echo 'checked'; } ?>>
          <label class="label9" for="checkbox9">毛穴の開き</label>
          </li>
          <li><input type="checkbox" name="Choice[]" id="checkbox10" value="<?=$record["trb1"]?>"<?php if( isset($trb1) && strpos($trb1, "黒ずみ") !==false ){ echo 'checked'; } ?>>
          <label class="label10" for="checkbox10">黒ずみ</label>
          </li>
          <li><input type="checkbox" name="Choice[]" id="checkbox11" value="<?=$record["trb1"]?>"<?php if( isset($trb1) && strpos($trb1, "乾燥") !==false ){ echo 'checked'; } ?>>
          <label class="label12" for="checkbox11">乾燥</label>
          </li>
          </div>
          <div class="formA">
          <h3>自宅でのお手入れ</h3>
          <p>朝🌞</p>
          <li><input type="checkbox" name="Choice1[]" id="checkbox1" value="<?=$record["care1"]?>"<?php if( isset($care1) && strpos($care1, "洗顔") !==false ){ echo 'checked'; } ?>>
          <label class="label1" for="checkbox1">洗顔</label>
          </li>
          <li><input type="checkbox" name="Choice1[]" id="checkbox2" value="<?=$record["care1"]?>"<?php if( isset($care2) && strpos($care2, "化粧水") !==false ){ echo 'checked'; } ?>>
          <label class="label2" for="checkbox2">化粧水</label>
          </li>
          <li><input type="checkbox" name="Choice1[]" id="checkbox3" value="<?=$record["care1"]?>"<?php if( isset($care1) && strpos($care1, "乳液") !==false ){ echo 'checked'; } ?>>
          <label class="label3" for="checkbox3">乳液</label>
          </li>
          <li><input type="checkbox" name="Choice1[]" id="checkbox4" value="<?=$record["care1"]?>"<?php if( isset($care1) && strpos($care1, "美容液") !==false ){ echo 'checked'; } ?>>
          <label class="label4" for="checkbox4">美容液</label>
          </li>
          <li><input type="checkbox" name="Choice1[]" id="checkbox5" value="<?=$record["care1"]?>"<?php if( isset($care1) && strpos($care1, "日焼け止め") !==false ){ echo 'checked'; } ?>>
          <label class="label5" for="checkbox5">日焼け止め</label>
          </li>
          <p>メイク💄</p>
          <li><input type="checkbox" name="Choice2[]" id="checkbox6" value="<?=$record["care2"]?>"<?php if( isset($care2) && strpos($care2, "ベース") !==false ){ echo 'checked'; } ?>>
          <label class="label6" for="checkbox6">ベース</label>
          </li>
          <li><input type="checkbox" name="Choice2[]" id="checkbox7" value="<?=$record["care2"]?>"<?php if( isset($care3) && strpos($care3, "リキッドファンデ") !==false ){ echo 'checked'; } ?>">
          <label class="label7" for="checkbox7">リキッドファンデ</label>
          </li>
          <li><input type="checkbox" name="Choice2[]" id="checkbox8" value="<?=$record["care2"]?>"<?php if( isset($care2) && strpos($care2, "固形ファンデ") !==false ){ echo 'checked'; } ?>>
          <label class="label8" for="checkbox8">固形ファンデ</label>
          </li>
          <li><input type="checkbox" name="Choice2[]" id="checkbox9" value="<?=$record["care2"]?>"<?php if( isset($care2) && strpos($care2, "クッションファンデ") !==false ){ echo 'checked'; } ?>>
          <label class="label9" for="checkbox9">クッションファンデ</label>
          </li>
          <li><input type="checkbox" name="Choice2[]" id="checkbox10" value="<?=$record["care2"]?>"<?php if( isset($care2) && strpos($care2, "パウダー") !==false ){ echo 'checked'; } ?>>
          <label class="label10" for="checkbox10">パウダー</label>
          </li>
          <li><input type="checkbox" name="Choice2[]" id="checkbox11" value="<?=$record["care2"]?>"<?php if( isset($care2) && strpos($care2, "ノーメイク") !==false ){ echo 'checked'; } ?>>
          <label class="label10" for="checkbox11">ノーメイク</label>
          </li>
          <p>夜🌜</p>
          <li><input type="checkbox" name="Choice3[]" id="checkbox12" value="<?=$record["care3"]?>"<?php if( isset($care3) && strpos($care3, "クレンジング") !==false ){ echo 'checked'; } ?>>
          <label class="label12" for="checkbox12">クレンジング</label>
          </li>
          <li><input type="checkbox" name="Choice3[]" id="checkbox13" value="<?=$record["care3"]?>"<?php if( isset($care3) && strpos($care3, "洗顔") !==false ){ echo 'checked'; } ?>>
          <label class="label1" for="checkbox13">洗顔</label>
          </li>
          <li><input type="checkbox" name="Choice3[]" id="checkbox14" value="<?=$record["care3"]?>"<?php if( isset($care3) && strpos($care3, "化粧水") !==false ){ echo 'checked'; } ?>>
          <label class="label2" for="checkbox14">化粧水</label>
          </li>
          <li><input type="checkbox" name="Choice3[]" id="checkbox15" value="<?=$record["care3"]?>"<?php if( isset($care3) && strpos($care3, "乳液") !==false ){ echo 'checked'; } ?>>
          <label class="label3" for="checkbox15">乳液</label>
          </li>
          <li><input type="checkbox" name="Choice3[]" id="checkbox16" value="<?=$record["care3"]?>"<?php if( isset($care3) && strpos($care3, "美容液") !==false ){ echo 'checked'; } ?>>
          <label class="label4" for="checkbox16">美容液</label>
          </li>
          <li><input type="checkbox" name="Choice3[]" id="checkbox17" value="<?=$record["care3"]?>"<?php if( isset($care3) && strpos($care3, "クリーム") !==false ){ echo 'checked'; } ?>>
          <label class="label5" for="checkbox17">クリーム</label>
          </li>
          <li><input type="checkbox" name="Choice3[]" id="checkbox18" value="<?=$record["care3"]?>"<?php if( isset($care3) && strpos($care3, "パックなど") !==false ){ echo 'checked'; } ?>>
          <label class="label5" for="checkbox18">パックなど</label>
          </li>
          </div>
          <div>
          <h3>その他 </h3>
            <div>エステティック経験: 
            <p><laber><input type="radio" name="exp1" value="ない"<?php if( !empty($experience) && $experience === "ない" ){ echo 'checked'; } ?>>ない</laber>  
            <laber><input type="radio" name="exp1" value="あり"<?php if( !empty($experience) && $experience === "ある" ){ echo 'checked'; } ?>>ある</p></laber>
            </div>
            <div>アレルギー: 
            <p><laber><input type="radio" name="exp2" value="ない"<?php if( !empty($experience1) && $experience1 === "ない" ){ echo 'checked'; } ?>>ない</laber>  
            <laber><input type="radio" name="exp2" value="あり"<?php if( !empty($experience1) && $experience1 === "ある" ){ echo 'checked'; } ?>>ある</p></laber>
            </div>
            <div><p>備考: <br>
            <textarea type="textbox" name="detail" value=""></textarea></p>
            </div>
          </div>
      <div> 
        <button>submit</button>
      </div>
      <input type="hidden" name="id" value="<?=$record["id"]?>">
      <!-- <input type="hidden" name="seibetu" value="<?php echo $_POST['seibetu']; ?>"> -->
    </fieldset>
  </form>

</body>

</html>