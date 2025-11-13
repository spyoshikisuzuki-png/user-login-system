<!-- データベース接続 -->
<?php require './dbconnect.php' ?>
<!-- セッション -->
<?php session_start(); ?>

<!doctype html>
<html lang="ja">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>データベース課題</title>
    <!-- JQuery + JQuery UI -->
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- datepicker日本語対応 CDN -->
    <script src="https://rawgit.com/jquery/jquery-ui/master/ui/i18n/datepicker-ja.js"></script>
    <script>
        $(function () {
            $('#start').datepicker({
                dateFormat: 'yy/mm/dd'
            });
        });
    </script>
</head>

<body>
<header>
    <h1 class="font-weight-normal">データベース課題</h1>
</header>
<main>
    <h2>予約管理</h2>
