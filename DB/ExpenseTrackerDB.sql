CREATE database expense_tracker;
use expense_tracker;

CREATE TABLE `categories` (
  `c_id` int(30) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `category` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  INDEX(category)
);

INSERT INTO `categories` (`c_id`, `category`,`date_created`) VALUES
(1, 'Shopping', '2022-11-30 09:21:36'),
(2, 'Maintenance',  '2022-11-30 09:21:52'),
(3, 'Electricity',  '2022-11-30 09:22:22'),
(4, 'Water', '2022-11-30 09:23:22'),
(5, 'Others','202-11-30 09:23:53'),
(6, 'Eating Out', '2022-11-30 09:23:22');
#drop table categories;
###################################################################################
#drop table users;
CREATE TABLE `users` (
   `u_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` text NOT NULL,
  `email` VARCHAR(40) NOT NULL,
  `password` VARCHAR(40) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
);

INSERT INTO `users`  VALUES
(1, 'Admin', 'martin@gamil.com','87b674763bffe44fb645c8daade89655','2022-11-20 14:02:37', '2022-11-21 09:55:07');


#####################################################################################
#drop table expense;
CREATE TABLE `expense` (
`e_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`u_id` int(11) NOT NULL,
`c_id` int(11) NOT NULL,
`category` VARCHAR(50) NOT NULL,
`amount`DECIMAL(8,2) NOT NULL,
`date` DATE NOT NULL,
CONSTRAINT f_key FOREIGN KEY (c_id)
	REFERENCES `categories`(c_id),
CONSTRAINT f1_key FOREIGN KEY (u_id)
	REFERENCES `users`(u_id)
)

