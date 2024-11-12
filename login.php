<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">

  <title>ログイン</title>
</head>

<body>

  <!-- Head[Start] -->
  <header>
      <?php include("menu.php"); ?>
  </header>
  <!-- Head[End] -->

  <div class="container">
      <form name="form1" action="login_act.php" method="post">
          <p class="fsize">ログイン</p>
          <input type="mail" name="mail" placeholder="Mail" required>
          <input type="password" name="lpw" placeholder="Password" required>
          <button type="submit">ログイン</button>
      </form>

      新規登録は<a href="sign_up.php">こちら</a>
  </div>

  

</body>
</html>