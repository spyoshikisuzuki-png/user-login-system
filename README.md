# 予約管理システム（PHP）

## 概要
顧客ログインと予約機能を備えたWebアプリです。

## 機能
- 会員登録・会員情報変更
- ログイン・ログアウト
- 予約登録・確認・完了画面
- 入力値チェック
- データベース連携（MySQL・PDO）

## 使用技術
- PHP 7.1.33
- MySQL
- Bootstrap 5
- jQuery UI（カレンダー表示）

## 開発の工夫点
- セッションによる多画面データ保持
- SQLインジェクション対策（プリペアドステートメント）
- 予約番号の自動生成（連番管理）

## 今後の改善
- パスワードのハッシュ化
- CSRF対策（トークンによるform保護）
- MVC構造化（Laravel学習中）

## データベースについて
本プロジェクトのデータベース設計は、職業訓練校で提供された仕様書に
記載されているテーブル構造・データ型をそのまま使用しています。

### reserveテーブル
```SQL
CREATE TABLE `reserve` (
  `reserve_no` int(10) NOT NULL,
  `reserve_date` int(8) NOT NULL,
  `reserve_h` int(2) NOT NULL,
  `reserve_m` int(2) NOT NULL,
  `numbers` int(3) NOT NULL,
  `message` varchar(200) NOT NULL,
  `customer_id` varchar(30) NOT NULL,
  PRIMARY KEY (`reserve_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `reserve` (`reserve_no`, `reserve_date`, `reserve_h`, `reserve_m`, `numbers`, `message`, `customer_id`) VALUES
(2025100101, 20251001, 17, 0, 7, '', '1111'),
(2025100102, 20251001, 18, 15, 11, '', '2222');
```

### customerテーブル
```SQL
CREATE TABLE `customer` (
  `customer_id` varchar(30) NOT NULL,
  `customer_password` varchar(30) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_telno` varchar(15) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `customer` (`customer_id`, `customer_password`, `customer_name`, `customer_telno`, `customer_address`) VALUES
('1111', 'pass1', '鈴木', '08011111111', 'aaaaa@gmail.com'),
('2222', 'pass2', '佐藤', '08022222222', 'bbbbb@gmail.com');
```