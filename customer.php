<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>

<p>
    登録する情報を入力後、登録ボタンを押してください。<br>
    （※がついている項目は入力必須項目です）
</p>
<hr>
<form action="./customerCheck.php" method="post">
    <table>
        <tr>
            <th class="text-center">ログインID（※）</th>
            <td>
                <input type="text" name="login" value="<?php echo $_SESSION['upd_id']; ?>"
                <?php
                    // readonlyを出力したかどうかの判定用フラグ
                    $flg = false;
                    // ログインされていたらtrue
                    if(!empty($_SESSION['reserve_id'])) {
                        echo ' readonly';
                        $flg = true;
                    }
                    echo '>';
                ?>
                <font color="red"><?php echo $_SESSION['msgError_upd_id']; ?></font>
            </td>
        </tr>
        <tr>
            <th class="text-center">パスワード（※）</th>
            <td>
                <input type="password" name="pass" value="<?php echo $_SESSION['upd_pass']; ?>">
                <font color="red"><?php echo $_SESSION['msgError_upd_pass']; ?></font>
            </td>
        </tr>
        <tr>
            <th class="text-center">氏名（※）</th>
            <td>
                <input type="text" name="name" value="<?php echo $_SESSION['upd_name']; ?>">
                <font color="red"><?php echo $_SESSION['msgError_upd_name']; ?></font>
            </td>
        </tr>
        <tr>
            <th class="text-center">連絡先電話番号（※）</th>
            <td>
                <input type="text" name="tel" value="<?php echo $_SESSION['upd_tel']; ?>">
                <font color="red"><?php echo $_SESSION['msgError_upd_tel']; ?></font>
            </td>
        </tr>
        <tr>
            <th class="text-center">メールアドレス（※）</th>
            <td>
                <input type="text" name="mail" value="<?php echo $_SESSION['upd_mail']; ?>">
                <font color="red"><?php echo $_SESSION['msgError_upd_mail']; ?></font>
            </td>
        </tr>
    </table>

    <?php
        if($flg) {
            // 更新処理
            echo '<button type="submit" name="action" value="upd" class="mt-4">更新</button>';
        } else {
            // 登録処理
            echo '<button type="submit" name="action" value="ins" class="mt-4">登録</button>';
        }
    ?>
</form>

<?php require 'footer.php'; ?>