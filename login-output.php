<?php require 'header.php'; ?>

<?php
    $login_id = htmlspecialchars($_POST['login_id'], ENT_QUOTES);  //ログインID
    $login_pass = htmlspecialchars($_POST['login_pass'], ENT_QUOTES);  //パスワード
    // ログイン用
    $_SESSION['id'] = $login_id;
    $_SESSION['pass'] = $login_pass;

    // 未入力チェック
    if($login_id === '' or $login_pass === '') {
        // ログインIDの入力が空白の場合
        if($login_id === '') {
            $msgError_id = '未入力の項目があります';
        } else {
            $msgError_id = '';
        }

        // パスワードの入力が空白の場合
        if($login_pass === '') {
            $msgError_pass = '未入力の項目があります';
        } else {
            $msgError_pass = '';
        }
    } else { 
        // ログインIDとパスワードのチェック

        $msgError_id = 'ログイン名が違います';
        $msgError_pass = 'パスワードが違います';

        // 会員情報をcustomerテーブルから取得
        $rows = $pdo->prepare('SELECT * FROM customer WHERE customer_id=?');
        $rows->bindParam(1, $login_id);
        $rows->execute();

        if($row = $rows->fetch()) {
            // エラーメッセージを空にする
            $msgError_id = '';

            // 取得したDBの情報とパスワードを比較
            if($row['customer_password'] === $login_pass) {
                // エラーメッセージを空にする
                $msgError_pass = '';

                // ログイン情報を格納
                $name = $row['customer_name'];  //氏名
                $tel = $row['customer_telno'];  //電話番号
                $mail = $row['customer_address'];  //メールアドレス

                //予約の時に使う処理用
                $_SESSION['reserve_id'] = $login_id;

                // 会員情報登録の時に使う処理用
                $_SESSION['upd_id'] = $login_id;
                $_SESSION['upd_pass'] = $row['customer_password'];
                $_SESSION['upd_name'] = $row['customer_name'];
                $_SESSION['upd_tel'] = $row['customer_telno'];
                $_SESSION['upd_mail'] = $row['customer_address'];
            }
        }

        // ログインIDの該当がない場合はログインIDのエラーメッセージのみ表示する処理
        if($msgError_id !== '') {
            $msgError_pass = '';
        }

        // セッション変数への格納
        // エラーメッセージが両方空の場合はログイン
        if($msgError_id === '' && $msgError_pass === '') {
            // ログイン情報をセッション変数に格納
            $_SESSION['name'] = $name;
            $_SESSION['tel'] = $tel;
            $_SESSION['mail'] = $mail;
        }
    }

     // $msgError_idにエラーメッセージが入っていたらtrue
    if($msgError_id !== '') {
        $_SESSION['msgError_id'] = $msgError_id;
    } else {
        $_SESSION['msgError_id'] = '';
    }
    // $msgError_passにエラーメッセージが入っていたらtrue
    if($msgError_pass !== '') {
        $_SESSION['msgError_pass'] = $msgError_pass;
    } else {
        $_SESSION['msgError_pass'] = '';
    }

    // エラーメッセージがある場合はlogin-input.phpに戻る
    if($msgError_id !== '' or $msgError_pass !== '') {
        header('Location: ./login-input.php');
    } else {
        // ここまできたらログインできてるためセッション破棄（$_SESSION['reserve_id']、$_SESSION['reserve_pass']は他機能で使うため残しておく）
        $_SESSION['id'] = '';
        $_SESSION['pass'] = '';
        
        // 予約エラーメッセージを全て破棄
        $_SESSION['msgError_date'] = '';
        $_SESSION['msgError_hours'] = '';
        $_SESSION['msgError_minutes'] = '';
        $_SESSION['msgError_people'] = '';
        $_SESSION['msgError_login'] = '';
    }

?>

<?php require 'menu.php'; ?>

<p class="mt-3">いらっしゃいませ、<?php echo $_SESSION['name']; ?>さん。</p>

<?php require 'footer.php'; ?>