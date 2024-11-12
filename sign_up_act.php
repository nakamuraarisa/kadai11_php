<?php
//1. POSTデータ取得
$mail      = filter_input( INPUT_POST, "mail" );
$lpw       = filter_input( INPUT_POST, "lpw" );
$lpw       = password_hash($lpw, PASSWORD_DEFAULT);   //パスワードハッシュ化

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$sql = "INSERT INTO users(mail,lpw,kanri_flg,life_flg)VALUES(:mail,:lpw,0,0)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">

  <title>会員登録完了</title>

  <style>
        .container {
            width: 300px;
            margin: 0 auto;
            margin-top: 50px;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        .button[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<?php
//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    echo '<div class="container">会員登録が完了しました
            <br>
            <br>
            <a href="login.php"><button type="submit">ログイン</button></a></div>';
}
?>