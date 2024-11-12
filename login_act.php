<?php
session_start();

//POST値
$mail = $_POST["mail"];
$lpw = $_POST["lpw"];

//1.  DB接続します
include("funcs.php");
$pdo = db_conn();

//2. データ登録SQL作成
//* PasswordがHash化→条件はmailのみ！！
$stmt = $pdo->prepare("SELECT * FROM users WHERE mail=:mail AND life_flg=0");//退会した人はログインできない 
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()

//5.該当１レコードがあればSESSIONに値を代入
//入力したPasswordと暗号化されたPasswordを比較！[戻り値：true,false]
$pw = password_verify($lpw, $val["lpw"]); //$lpw = password_hash($lpw, PASSWORD_DEFAULT);   //パスワードハッシュ化
if($pw){ 
  //Login成功時
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["mail"]      = $val['mail'];
  $_SESSION["id"]        = $val['id'];
  //Login成功時
  redirect("mypage.php?id=" . $val["id"]);

}else{
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
          <div class="container">ログインに失敗しました
            <br><br>
            <a href="login.php"><button type="submit">ログインページに戻る</button></a>
          </div>
        </body>
        </html>';

}

exit();


