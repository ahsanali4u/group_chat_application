/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.27-MariaDB : Database - group_chat_app_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`group_chat_app_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `group_chat_app_db`;

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `message_time` datetime DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `messages` */

insert  into `messages`(`message_id`,`user_id`,`message`,`message_time`) values 
(10,5,'asjhoidhoasiudhbas','2024-08-15 20:48:55'),
(11,5,'psojdaiofhaiosd','2024-08-15 20:49:45'),
(12,5,'ljasdidhasuhd','2024-08-15 20:50:20'),
(13,5,'xhbzkxzKJ','2024-08-15 20:50:35'),
(14,5,'oishasoidhasid','2024-08-15 20:51:39'),
(15,5,'oshdadhsoasdhsa','2024-08-15 20:55:52'),
(16,4,'sohasoudhao','2024-08-15 20:56:23'),
(17,4,'pisdjaoaishdioa','2024-08-15 20:56:58'),
(18,4,'iosdhauiashd','2024-08-15 23:54:22'),
(19,5,'sidhaidgasi','2024-08-16 00:07:12'),
(20,5,'Hey There','2024-08-16 00:21:13'),
(21,4,'I am waiting outside','2024-08-16 00:26:34'),
(22,5,'lets go to picnic','2024-08-16 00:27:36'),
(23,6,'Hey There','2024-08-16 00:39:37'),
(24,5,'Heyy','2024-08-16 00:39:53'),
(25,4,'Whatsapp guys?','2024-08-16 00:40:56'),
(26,5,'Hey &#039;guys','2024-08-16 00:50:30'),
(27,6,'Assalmu Allaykum','2024-08-16 00:50:55'),
(28,5,'W.salam','2024-08-16 00:51:09'),
(29,6,'Whatsapp??','2024-08-16 00:52:03'),
(34,8,'Yes How was the day?','2024-08-16 01:22:11'),
(35,10,'It was good though','2024-08-16 01:28:24'),
(37,10,'Kal ka kya plan hy?','2024-08-16 01:28:52'),
(38,8,'Nothing Just another day of struggle..','2024-08-16 01:30:08'),
(39,8,'???','2024-08-16 01:31:02'),
(40,10,'anyone there??','2024-08-16 01:31:22'),
(41,9,'yess','2024-08-16 01:31:37'),
(42,6,'good night..','2024-08-16 01:38:33'),
(43,8,'.....','2024-08-16 01:39:58'),
(44,5,'good night','2024-08-16 01:45:35');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `online_status` tinyint(1) DEFAULT 0,
  `file_name` blob NOT NULL,
  `file_path_name` blob NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`user_id`,`first_name`,`last_name`,`gender`,`user_email`,`user_password`,`online_status`,`file_name`,`file_path_name`) values 
(4,'Saad','Ali','male','saad@gmail.com','1212',0,'image1.jpg','Images/image1.jpg'),
(5,'Faraz','Ahmed','male','faraz@gmail.com','1212',0,'image2.jpg','Images/image2.jpg'),
(6,'Ayesha','Fatima','male','ayesha@gmail.com','1212',0,'image2.jpg','Images/image2.jpg'),
(8,'Khuzaima','Ansari','male','khuzaima@gmail.com','1212',0,'image1.jpg','Images/image1.jpg'),
(9,'Muhammad','Fahad','male','fahad@gmail.com','1212',0,'image1.jpg','Images/image1.jpg'),
(10,'Bilal','Ghori','male','bilal@gmail.com','1212',0,'image2.jpg','Images/image2.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
