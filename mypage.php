<?php
session_start();
$id = $_GET["id"];
include("funcs.php");
sschk();
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM users WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if($status==false) {
    sql_error($stmt);
}else{
    $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">

  <title>マイページ</title>
</head>

<body>

<!-- Head[Start] -->
    <header>
      <?php include("menu.php"); ?>
    </header>
<!-- Head[End] -->

<form method="POST" action="mypage_update.php">
    <div class="container">
        <fieldset>
            <legend>マイページ<br><br>このページでお客様情報を編集できます。</legend><br><br>
            <label>メールアドレス：<input type="mail" name="mail" value="<?=$row["mail"]?>"></label><br>
            <label>姓：<input type="text" name="family_name" value="<?=$row["family_name"]?>"></label><br>
            <label>名：<input type="text" name="personal_name" value="<?=$row["personal_name"]?>"></label><br>
            <label>生年月日：<input type="date" name="birth" value="<?=$row["birth"]?>"></label><br>
            <button type="submit">保存する</button>
            <input type="hidden" name="id" value="<?=$row["id"]?>">
        </fieldset>
        <a href="logout.php" style="
            display: inline-block;
            width: 95%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            background-color: gray;
            color: #ffffff;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;">
            ログアウト
        </a>
    </div>
</form>

</body>
</html>
