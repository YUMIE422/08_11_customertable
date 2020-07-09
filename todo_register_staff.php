<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff登録画面</title>
</head>

<body>
  <form action="todo_register_act_staff.php" method="POST">
    <fieldset>
      <legend>Staff登録画面</legend>
      <div>
        name: <input type="text" name="name">
      </div>
      <div>
        password: <input type="text" name="password">
      </div>
      <div>
        Administration: <input type="text" name="is_admin">←受付スタッフは1、エステスタッフは0
    
      </div>
      <div>
        <button>Register</button>
      </div>
      <a href="top.php">or login</a>
    </fieldset>
  </form>

</body>

</html>