<?php
    session_start();

    $id = htmlspecialchars($_POST['login'], ENT_QUOTES);  //ログインID
    $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES);  //パスワード
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES);  //氏名
    $tel = htmlspecialchars($_POST['tel'], ENT_QUOTES);  //電話番号
    $mail = htmlspecialchars($_POST['mail'], ENT_QUOTES);  //メールアドレス
    $action = $_POST['action'];

    // セッションを入力値に更新する
    $_SESSION['upd_id'] = $id;
    $_SESSION['upd_pass'] = $pass;
    $_SESSION['upd_name'] = $name;
    $_SESSION['upd_tel'] = $tel;
    $_SESSION['upd_mail'] = $mail;
    // customerInsert.phpで使う
    $_SESSION['action'] = $action;


// 未入力チェックなどのバリデーションチェック

    // ログインIDチェック
    if(empty($id)) {
        $msgError_id = 'ログインIDが未入力です';
    // 大文字小文字の英数字を判定（文字制限は1文字以上）
    } else if(!preg_match('/\A[A-Za-z0-9]+\z/', $id)) {
        $msgError_id = '英数字で入力してください';
    } else {
        $msgError_id = '';
    }

    // パスワードチェック
    if(empty($pass)) {
        $msgError_pass = 'パスワードが未入力です';
    } else {
        $msgError_pass = '';
    }

    // 氏名チェック
    // 全角数字を半角数字に変換
    $name = mb_convert_kana($name, 'n', 'UTF-8');

    if(empty($name)) {
        $msgError_name = '氏名が未入力です';
    // 数値が入らないようにチェック
    } else if(is_numeric($name)) {
        $msgError_name = '名前を入力してください';
    } else {
        $msgError_name = '';
    }

    // 電話番号チェック
    if(empty($tel)) {
        $msgError_tel = '連絡先電話番号が未入力です';
    // 10桁以上で数値のみ
    } else if(!preg_match('/\A[0-9]{10,}\z/', $tel)) {
        $msgError_tel = '数値のみ10桁以上で入力してください';
    } else {
        $msgError_tel = '';
    }

    // メールアドレスチェック
    if(empty($mail)) {
        $msgError_mail = 'メールアドレスが未入力です';
    } else if(!preg_match("/\A[a-zA-Z0-9.!#$%&'*+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)*\z/", $mail)) {
        $msgError_mail = 'そのメールアドレスは使用できません';
    } else {
        $msgError_mail = '';
    }

    $_SESSION['msgError_upd_id'] = $msgError_id;
    $_SESSION['msgError_upd_pass'] = $msgError_pass;
    $_SESSION['msgError_upd_name'] = $msgError_name;
    $_SESSION['msgError_upd_tel'] = $msgError_tel;
    $_SESSION['msgError_upd_mail'] = $msgError_mail;

    if($msgError_id === '' && $msgError_pass === '' && $msgError_name === '' && $msgError_tel === '' && $msgError_mail === '') {
        header('Location: ./customerConfirm.php');
    } else {
        header('Location: ./customer.php');
    }

?>