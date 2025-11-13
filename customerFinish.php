<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
    if(!empty($_SESSION['reserve_id'])) {
        echo '<p>更新が完了しました。</p>';
    } else {
        echo '<p>登録が完了しました。</p>';
    }

    $_SESSION['msgError_upd_id'] = '';
?>
<?php require 'footer.php'; ?>