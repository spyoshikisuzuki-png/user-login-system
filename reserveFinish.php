<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>

<p>予約が完了しました。以下の予約番号を控えておいてください。</p>
<hr>
<table>
    <tr>
        <th class="text-center">予約番号</th>
        <td>
            <?php echo $_SESSION['reserve_no']; ?>
        </td>
    </tr>
</table>
<hr>
<p>当日はお気をつけてお越しください。心よりお待ちいたしております。</p>

<?php
    // 予約に使ったセッションを破棄
    $_SESSION['reserve_no'] = '';  //予約番号
    $_SESSION['reserve_date'] = '';  //予約日
    $_SESSION['reserve_hours'] = '';  //時
    $_SESSION['reserve_minutes'] = '';  //分
    $_SESSION['reserve_people'] = '';  //人数
    $_SESSION['notifications'] = '';  //連絡事項
?>

<?php require 'footer.php'; ?>