<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>受付Staffログイン画面</title>
</head>

<body>
  <form action="todo_login_act_reception.php" method="POST">
    <fieldset>
      <legend>受付Staffログイン画面</legend>
      <div>
        name: <input type="text" name="name">
      </div>
      <div>
        password: <input type="text" name="password">
      </div>
      <div>
        <button>Login</button>
      </div>
      <a href="todo_register_staff.php">or register</a>
    </fieldset>
  </form>

</body>

</html>