<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>

<form action="./login-output.php" method="post" class="mt-3">
    <div class="mb-3">
        <label for="login_label">ログインID：</label>
        <input type="text" name="login_id" value="<?php echo $_SESSION['id']; ?>" id="login_label" autocomplete="off">
        <!-- 入力チェック用 -->
        <span class="text-danger"><?php echo $_SESSION['msgError_id']; ?></span>
    </div>
    <div class="mb-3">
        <label for="pass_label">パスワード：</label>
        <input type="password" name="login_pass" value="<?php echo $_SESSION['pass']; ?>" id="pass_label" autocomplete="off">
        <!-- 入力チェック用 -->
        <span class="text-danger"><?php echo $_SESSION['msgError_pass']; ?></span>
    </div>

    <button type="submit">ログイン</button>
</form>

<?php require 'footer.php'; ?>