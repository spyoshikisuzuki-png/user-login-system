-- データベース名: dbkadai6　（ここは任意で変えてください）


-- reserveテーブル

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


-- customerテーブル

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