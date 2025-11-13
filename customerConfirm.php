<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>

<p>会員情報（最終確認）</p>
<p>会員情報をご確認後、よろしければ確定ボタンを押してください。</p>

<?php
    // 必要なセッション変数を変数に格納
    $upd_id = $_SESSION['upd_id'];
    $pass = $_SESSION['upd_pass'];
    $name = $_SESSION['upd_name'];
    $tel = $_SESSION['upd_tel'];
    $mail = $_SESSION['upd_mail'];
?>

<table>
    <tr>
        <th class="text-center">ログインID</th>
        <td><?php echo $upd_id; ?></td>
    </tr>
    <tr>
        <th class="text-center">パスワード</th>
        <td>
            <?php echo $pass; ?>
        </td>
    </tr>
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
    <a href="./customerInsert.php" class="button">確定</a>
    <a href="./customer.php" class="button">前の画面に戻る</a>
</div>


<?php require 'footer.php'; ?>