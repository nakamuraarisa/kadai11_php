<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">

  <title>新規ユーザー登録</title>
</head>

<body>
<!-- Head[Start] -->
<header>
    <?php include("menu.php"); ?>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->

<div class="container">
      <form name="form2" action="sign_up_act.php" method="post">
          <p class="fsize">新規登録</p>
          <label>メールアドレス：<input type="mail" name="mail"></label><br>
          <label>パスワード：<input type="password" name="lpw"></label><br>
          <br>
          <button type="submit">送信</button>
      </form>
  </div>
<!-- Main[End] -->


</body>
</html>
