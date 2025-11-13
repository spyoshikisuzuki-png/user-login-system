<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>

<p>ご予約（最終確認）</p>
<p>予約内容をご確認後、よろしければ予約確定ボタンを押してください。</p>
<hr>
<p>予約詳細情報</p>
<hr>

<?php
    // 必要なセッション変数を変数に格納
    $reserve_date = $_SESSION['reserve_date'];  //予約日
    $reserve_hours = $_SESSION['reserve_hours'];  //時
    $reserve_minutes = $_SESSION['reserve_minutes'];  //分
    $reserve_people = $_SESSION['reserve_people'];  //人数
    $notifications = $_SESSION['notifications'];  //連絡事項

    $name = $_SESSION['name'];  //氏名
    $tel = $_SESSION['tel'];  //連絡先電話番号
    $mail = $_SESSION['mail'];  //メールアドレス

?>

<table>
    <tr>
        <th class="text-center">予約日</th>
        <td>
            <?php echo $reserve_date; ?>
        </td>
    </tr>
    <tr>
        <th class="text-center">予約時間</th>
        <td>
            <?php echo $reserve_hours . '時' . $reserve_minutes . '分'; ?>
        </td>
    </tr>
    <tr>
        <th class="text-center">予約人数</th>
        <td>
            <?php echo $reserve_people . '人'; ?>
        </td>
        
    </tr>
    <tr>
        <th class="text-center">連絡事項</th>
        <td>
            <?php echo $notifications; ?>
        </td>
    </tr>
</table>
<hr>

<table>
    <tr>
        <th class="text-center">氏名</th>
        <td>
            <?php echo $name; ?>
        </td>
    </tr>
    <tr>
        <th class="text-center">連絡先電話番号</th>
        <td>
            <?php echo $tel; ?>
        </td>
    </tr>
    <tr>
        <th class="text-center">メールアドレス</th>
        <td>
            <?php echo $mail; ?>
        </td>
    </tr>
</table>
<div class="mt-5">
    <a href="./reserveInsert.php" class="button">予約確定</a>
    <a href="./reserve.php" class="button">前の画面に戻る</a>
</div>


<?php require 'footer.php'; ?>