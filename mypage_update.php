<?php
session_start();
//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
//2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更

//1. POSTデータ取得
$family_name = $_POST["family_name"];
$personal_name = $_POST["personal_name"];
$mail    = $_POST["mail"];
$birth    = $_POST["birth"];
$id    = $_POST["id"];

//2. DB接続します
include("funcs.php"); //外部ファイル読み込み
$pdo = db_conn();

//３．データ登録SQL作成 この通りに書く
$sql = "UPDATE users SET family_name=:family_name,personal_name=:personal_name,mail=:mail,birth=:birth WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':family_name',      $family_name,      PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT) 「:**」はバインド変数 bindValueで危ない文字をクリーニング 文字列＝STR
$stmt->bindValue(':personal_name',    $personal_name,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':mail',             $mail,             PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':birth',            $birth,            PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',               $id,               PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行すると、true or falseが返ってくる

//４．データ登録処理後
if($status==false){
  sql_error($stmt);
} else {
  echo '<!DOCTYPE html>
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
        <body>
          <div class="container">登録内容が修正されました
            <br>
            <br>
            <a href="mypage.php?id=' . $id . '"><button class="mypage">マイページに戻る</button></a>
           </div>
        </body>
        </html>';
}