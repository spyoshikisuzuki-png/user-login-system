<!-- データベース接続 -->
<?php require './dbconnect.php' ?>
<!-- セッション -->
<?php session_start(); ?>

<!-- 更新処理 -->
<?php
    $customer_id = $_SESSION['upd_id'];  //ログインID
    $customer_password = $_SESSION['upd_pass'];  //パスワード
    $customer_name = $_SESSION['upd_name'];  //氏名
    $customer_telno = $_SESSION['upd_tel'];  //電話番号
    $customer_address = $_SESSION['upd_mail'];  //メールアドレス
 
    // 更新
    if($_SESSION['action'] === 'upd') {
        $rows = $pdo->prepare('UPDATE customer SET customer_password=?, customer_name=?, customer_telno=?, customer_address=? WHERE customer_id=?');
        $rows->bindParam(1, $customer_password);
        $rows->bindParam(2, $customer_name);
        $rows->bindParam(3, $customer_telno);
        $rows->bindParam(4, $customer_address);
        $rows->bindParam(5, $customer_id);
        $rows->execute();

        // 更新内容をセクション変数に反映
        $_SESSION['name'] = $customer_name;  //氏名
        $_SESSION['tel'] = $customer_telno;  //連絡先電話番号
        $_SESSION['mail'] = $customer_address;  //メールアドレス
    }
    
    if($_SESSION['action'] === 'ins') {
        $rows = $pdo->prepare('INSERT INTO customer SET customer_id=?, customer_password=?, customer_name=?, customer_telno=?, customer_address=?');
        $rows->bindParam(1, $customer_id);
        $rows->bindParam(2, $customer_password);
        $rows->bindParam(3, $customer_name);
        $rows->bindParam(4, $customer_telno);
        $rows->bindParam(5, $customer_address);
        $rows->execute();
    }

    header('Location: ./customerFinish.php');
?>