<!-- データベース接続 -->
<?php require './dbconnect.php' ?>
<!-- セッション -->
<?php session_start(); ?>

<?php
    // 必要なセッション変数を変数に格納
    $reserve_date = $_SESSION['reserve_date'];  //予約日
    $reserve_hours = $_SESSION['reserve_hours'];  //時
    $reserve_minutes = $_SESSION['reserve_minutes'];  //分
    $reserve_people = $_SESSION['reserve_people'];  //人数
    $notifications = $_SESSION['notifications'];  //連絡事項
    $customer_id = $_SESSION['reserve_id'];  //会員番号

    // DBの日付データに合わせて加工
    $date = date('Ymd', strtotime($reserve_date));


    // 連番を取得するために該当日付のデータをDBから降順で取得
    $rows_date = $pdo->prepare('SELECT reserve_no, reserve_date FROM reserve WHERE reserve_date=? ORDER BY reserve_no DESC');
    $rows_date->bindParam(1, intval($date), PDO::PARAM_INT);
    $rows_date->execute();

    if($row = $rows_date->fetch()) {
        // 連番を抽出して加工(取得した最大値の連番に+1している)
        $no = sprintf('%02d' , intval(substr($row['reserve_no'], -1, 2)) + 1);
        if(intval($no) <= 99) {
            $date_no = $date . $no;
        } else {
            echo '予約が定員上限に達しているため正常に行われませんでした。';
            exit;
        }
        
    } else {
        $date_no = $date . '01';
    }
    
    // 予約番号をセッション変数に格納
    $_SESSION['reserve_no'] = $date_no;

    // 挿入処理（予約）
    $rows = $pdo->prepare('INSERT INTO reserve(reserve_no, reserve_date, reserve_h, reserve_m, numbers, message, customer_id) VALUES(?, ?, ?, ?, ?, ?, ?)');
    $rows->bindParam(1, intval($date_no), PDO::PARAM_INT);
    $rows->bindParam(2, intval($date), PDO::PARAM_INT);
    $rows->bindParam(3, intval($reserve_hours), PDO::PARAM_INT);
    $rows->bindParam(4, intval($reserve_minutes), PDO::PARAM_INT);
    $rows->bindParam(5, intval($reserve_people), PDO::PARAM_INT);
    $rows->bindParam(6, $notifications, PDO::PARAM_STR);
    $rows->bindParam(7, $customer_id, PDO::PARAM_STR);
    $rows->execute();

    header('Location: ./reserveFinish.php');
?>