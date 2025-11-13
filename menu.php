<a href="reserve.php">予約</a>
<a href="login-input.php">ログイン</a>
<a href="logout-input.php">ログアウト</a>
<a href="customer.php">会員登録</a>
<?php
	if(isset($_SESSION['name'])) {
		echo ' [ログイン：' . $_SESSION['name'] . 'さん]';
	} else {
		echo ' [ログイン：ゲストさん]';
	}
?>
<hr>
