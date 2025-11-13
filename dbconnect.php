<?php
  try {
    $pdo = new PDO('mysql:dbname=dbkadai6;host=127.0.0.1;charset=utf8', 'root', ''); 
  } catch (PDOException $e) {
    echo 'DB接続エラー： ' . $e->getMessage();
  }
?>