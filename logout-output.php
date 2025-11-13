<?php require 'header.php'; ?>
<!-- $_SESSION変数を破棄してログアウト -->
<?php 
    session_unset(); // 全削除
?>
<?php require 'menu.php'; ?>

<p class="mt-3">ログアウトしました。</p>

<?php require 'footer.php'; ?>