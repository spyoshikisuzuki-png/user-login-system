<?php
    // セッション
    session_start();

    $reserve_date = htmlspecialchars($_POST['reserve_date'], ENT_QUOTES);  //予約日
    $reserve_hours = $_POST['reserve_hours'];  //時
    $reserve_minutes = $_POST['reserve_minutes'];  //分
    $reserve_people = htmlspecialchars($_POST['reserve_people'], ENT_QUOTES);  //予約人数
    $notifications = htmlspecialchars($_POST['notifications']);  //連絡事項

    // セッション変数に格納
    $_SESSION['reserve_date'] = $reserve_date;  //予約日
    $_SESSION['reserve_hours'] = $reserve_hours;  //時
    $_SESSION['reserve_minutes'] = $reserve_minutes;  //分
    $_SESSION['reserve_people'] = $reserve_people;  //予約人数
    $_SESSION['notifications'] = $notifications;  //連絡事項

    // ログインチェック
    if(isset($_SESSION['name'])) {
        // ログインエラーセッション破棄
        $_SESSION['msgError_login'] = '';

        // 予約日
        // 未入力チェック
        if($reserve_date === '') {
            $_SESSION['msgError_date'] = '予約日が未入力です';
        } else {
            $_SESSION['msgError_date'] = '';
        }

        // 予約時間（時）
        // 未入力チェック
        if($reserve_hours === 'not_entered') {
            $_SESSION['msgError_hours'] = '予約時間（時）が未入力です';
        } else {
            $_SESSION['msgError_hours'] = '';
        }

        // 予約時間（分）
        // 未入力チェック
        if($reserve_minutes === 'not_entered') {
            $_SESSION['msgError_minutes'] = '予約時間（分）が未入力です';
        } else {
            $_SESSION['msgError_minutes'] = '';
        }

        // 予約人数
        // 未入力チェック、数値チェック、人数チェック
        if($reserve_people === '') {
            $_SESSION['msgError_people'] = '予約人数が未入力です';
            $_SESSION['color'] = 'red';
        } 
        elseif(!is_numeric($reserve_people)) {
            $_SESSION['msgError_people'] = '予約人数は数値で指定してください';
            $_SESSION['color'] = 'red';
        }
        elseif($reserve_people <= 0) {
            $_SESSION['msgError_people'] = '予約人数は１名以上を指定してください';
            $_SESSION['color'] = 'orange';
        }
        else {
            $_SESSION['msgError_people'] = '';
        }
    } else {
        $_SESSION['msgError_login'] = 'ログインをしてください';
    }
    
    // すべての入力値が正しい場合true
    if($_SESSION['msgError_date'] === '' && $_SESSION['msgError_hours'] === '' && $_SESSION['msgError_minutes'] === '' && $_SESSION['msgError_people'] === '' && $_SESSION['msgError_login'] === '') {
        header('Location: ./reserveConfirm.php');
    } else {
        header('Location: ./reserve.php');
    }
    
?>