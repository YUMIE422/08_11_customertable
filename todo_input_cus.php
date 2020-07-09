<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>エステカウンセリングシート（入力画面）</title>
</head>

<body>
  <form action="todo_create_cus.php" method="POST">
    <fieldset>
      <legend>エステカウンセリングシート（入力画面）</legend>
      <a href="todo_read_staff.php">一覧画面</a>
      <h3>お客様情報</h3>
      <p><div>カウンセリング日:<input type="date" name="date"></div></p>
      <!-- <p><div>お客様番号：<input type="text" name="id"></div></p> -->
      <p><div>名前: <input type="text" name="namae"></div></p>
      <p><div>生年月日: <input type="text" name="birthday"></div></p> 
      <p><div>性別: <laber><input type="radio" name="seibetu" value="男">男</laber>
                    <laber><input type="radio" name="seibetu" value="女">女</laber>
      <p><div>年齢: <input type="text" name="age"></div></p>
      <p><div>血液型: <input type="text" name="bloodtype"></div></p> 
      <p><div>住所: <input type="text" name="jyusho"></div></p>
      <p><div>電話番号: <input type="text" name="tel"></div></p>
      
      <div class="formA">
      <h3>お肌の悩み</h3>
          <li><input type="checkbox" name="Choice[]" id="checkbox1" value="肌荒れ">
          <label class="label1" for="checkbox1">肌荒れ</label>
          </li>
          <li><input type="checkbox" name="Choice[]" id="checkbox2" value="しわ">
          <label class="label2" for="checkbox2">しわ</label>
          </li>
          <li><input type="checkbox" name="Choice[]" id="checkbox3" value="くすみ">
          <label class="label3" for="checkbox3">くすみ</label>
          </li>
          <li><input type="checkbox" name="Choice[]" id="checkbox4" value="しみ">
          <label class="label4" for="checkbox4">しみ</label>
          </li>
          <li><input type="checkbox" name="Choice[]" id="checkbox5" value="にきび">
          <label class="label5" for="checkbox5">にきび</label>
          </li>
          <li><input type="checkbox" name="Choice[]" id="checkbox6" value="たるみ">
          <label class="label6" for="checkbox6">たるみ</label>
          </li>
          <li><input type="checkbox" name="Choice[]" id="checkbox7" value="アトピー">
          <label class="label7" for="checkbox7">アトピー</label>
          </li>
          <li><input type="checkbox" name="Choice[]" id="checkbox8" value="メイク崩れ">
          <label class="label8" for="checkbox8">メイク崩れ</label>
          </li>
          <li><input type="checkbox" name="Choice[]" id="checkbox9" value="毛穴の開き">
          <label class="label9" for="checkbox9">毛穴の開き</label>
          </li>
          <li><input type="checkbox" name="Choice[]" id="checkbox10" value="黒ずみ">
          <label class="label10" for="checkbox10">黒ずみ</label>
          </li>
          <li><input type="checkbox" name="Choice[]" id="checkbox11" value="乾燥">
          <label class="label12" for="checkbox11">乾燥</label>
          </li>
          </div>
          <div class="formA">
          <h3>自宅でのお手入れ</h3>
          <p>朝🌞</p>
          <li><input type="checkbox" name="Choice1[]" id="checkbox1" value="洗顔">
          <label class="label1" for="checkbox1">洗顔</label>
          </li>
          <li><input type="checkbox" name="Choice1[]" id="checkbox2" value="化粧水">
          <label class="label2" for="checkbox2">化粧水</label>
          </li>
          <li><input type="checkbox" name="Choice1[]" id="checkbox3" value="乳液">
          <label class="label3" for="checkbox3">乳液</label>
          </li>
          <li><input type="checkbox" name="Choice1[]" id="checkbox4" value="美容液">
          <label class="label4" for="checkbox4">美容液</label>
          </li>
          <li><input type="checkbox" name="Choice1[]" id="checkbox5" value="日焼け止め">
          <label class="label5" for="checkbox5">日焼け止め</label>
          </li>
          <p>メイク💄</p>
          <li><input type="checkbox" name="Choice2[]" id="checkbox6" value="ベース">
          <label class="label6" for="checkbox6">ベース</label>
          </li>
          <li><input type="checkbox" name="Choice2[]" id="checkbox7" value="リキッドファンデ">
          <label class="label7" for="checkbox7">リキッドファンデ</label>
          </li>
          <li><input type="checkbox" name="Choice2[]" id="checkbox8" value="固形ファンデ">
          <label class="label8" for="checkbox8">固形ファンデ</label>
          </li>
          <li><input type="checkbox" name="Choice2[]" id="checkbox9" value="クッションファンデ">
          <label class="label9" for="checkbox9">クッションファンデ</label>
          </li>
          <li><input type="checkbox" name="Choice2[]" id="checkbox10" value="パウダー">
          <label class="label10" for="checkbox10">パウダー</label>
          </li>
          <li><input type="checkbox" name="Choice2[]" id="checkbox11" value="パウダー">
          <label class="label10" for="checkbox11">ノーメイク</label>
          </li>
          <p>夜🌜</p>
          <li><input type="checkbox" name="Choice3[]" id="checkbox12" value="クレンジング">
          <label class="label12" for="checkbox12">クレンジング</label>
          </li>
          <li><input type="checkbox" name="Choice3[]" id="checkbox13" value="洗顔">
          <label class="label1" for="checkbox13">洗顔</label>
          </li>
          <li><input type="checkbox" name="Choice3[]" id="checkbox14" value="化粧水">
          <label class="label2" for="checkbox14">化粧水</label>
          </li>
          <li><input type="checkbox" name="Choice3[]" id="checkbox15" value="乳液">
          <label class="label3" for="checkbox15">乳液</label>
          </li>
          <li><input type="checkbox" name="Choice3[]" id="checkbox16" value="美容液">
          <label class="label4" for="checkbox16">美容液</label>
          </li>
          <li><input type="checkbox" name="Choice3[]" id="checkbox17" value="クリーム">
          <label class="label5" for="checkbox17">クリーム</label>
          </li>
          <li><input type="checkbox" name="Choice3[]" id="checkbox18" value="パックなど">
          <label class="label5" for="checkbox18">パックなど</label>
          </li>
          </div>
          <div>
          <h3>その他 </h3>
            <div>エステティック経験: 
            <p><input type="radio" name="experience" value="ない">ない  
            <input type="radio" name="experience" value="あり">ある</p>
            </div>
            <div>アレルギー: 
            <p><input type="radio" name="experience1" value="ない">ない  
            <input type="radio" name="experience1" value="あり">ある</p>
            </div>
            <div><p>備考: <br>
            <textarea type="textbox" name="detail" value=""></textarea></p>
            </div>
          </div>
      <div> 
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>