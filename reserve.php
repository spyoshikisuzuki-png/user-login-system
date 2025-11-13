<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>

<p>
    ログイン後、各情報を入力して予約確認ボタンを押してください。<br>
    （※がついている項目は入力必須項目です）
</p>
<hr>
<form action="./reserveCheck.php" method="post">
    <table>
        <tr>
            <th class="text-center">予約日（※）</th>
            <td>
                <input type="text" name="reserve_date" value="<?php echo $_SESSION['reserve_date']; ?>" id="start">
                <font color="red"><?php echo $_SESSION['msgError_date']; ?></font>
            </td>
        </tr>
        <tr>
            <th class="text-center">予約時間（※）</th>
            <td>
                <!-- 時 -->
                <select name="reserve_hours">
                    <option value="not_entered">時間（時）を選択</option>
                    <?php
                        // 予約時間17~24
                        for($i=17; $i<=24; $i++) {
                            // セッション変数の値（時）を表示
                            if((int)$_SESSION['reserve_hours'] === $i) {
                                echo '<option value="' . $i . '" selected>' . $i . '</option>';
                            } else {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        }
                    ?>
                </select>
                <font color="red"><?php echo $_SESSION['msgError_hours']; ?></font>
            </td>
        </tr>
        <tr>
            <th class="text-center"></th>
            <td>
                <!-- 分 -->
                <select name="reserve_minutes">
                    <option value="not_entered">時間（分）を選択</option>
                    <?php
                        // 予約分数0,15,30,45
                        for($i=0; $i<=45; $i+=15) {
                            // セッション変数の値（分）を表示
                            // $i=0の影響を考えて$iを文字列にキャスト
                            if($_SESSION['reserve_minutes'] === (string)$i) {
                                echo '<option value="' . $i . '" selected>' . $i . '</option>';
                            } else {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        }
                    ?>
                </select>
                <font color="red"><?php echo $_SESSION['msgError_minutes']; ?></font>
            </td>
        </tr>
        <tr>
            <th class="text-center">予約人数（※）</th>
            <td>
                <input type="text" name="reserve_people" value="<?php echo $_SESSION['reserve_people']; ?>">
                <font color="<?php echo $_SESSION['color'] . '">' . $_SESSION['msgError_people']; ?></font>
            </td>
            
        </tr>
        <tr>
            <th class="text-center">連絡事項</th>
            <td>
                <textarea name="notifications" cols="40"><?php echo $_SESSION['notifications']; ?></textarea>
            </td>
        </tr>
    </table>
    <hr>

    <!-- readonly　編集不可 -->
    <table>
        <tr>
            <th class="text-center">氏名</th>
            <td><input type="text" value="<?php echo $_SESSION['name']; ?>" readonly></td>
        </tr>
        <tr>
            <th class="text-center">連絡先電話番号</th>
            <td><input type="text" value="<?php echo $_SESSION['tel']; ?>" readonly></td>
        </tr>
        <tr>
            <th class="text-center">メールアドレス</th>
            <td><input type="text" value="<?php echo $_SESSION['mail']; ?>" readonly></td>
        </tr>
    </table>

    <p class="mt-5">まだ予約は確定しておりません。次の画面で確定させてください。</p>
    <div class="text-danger mb-3">
        <?php echo $_SESSION['msgError_login']; ?>
    </div>
    <button type="submit">予約確認</button>
</form>

<?php require 'footer.php'; ?>