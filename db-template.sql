CREATE DATABASE IF NOT EXISTS `altech` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `altech`;

CREATE TABLE IF NOT EXISTS `user` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `address` varchar(255),
  `phone` varchar(15),
  `email` varchar(255) UNIQUE NOT NULL,
  `recover_token` varchar(255) UNIQUE,
  `role` ENUM ('ROLE_ADMIN', 'ROLE_SUPER_ADMIN', 'ROLE_CLIENT') NOT NULL DEFAULT 'ROLE_CLIENT',
  `password` varchar(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `closed` bit(1),
  `open_date` datetime,
  `admin_id` int DEFAULT NULL,
  `opener_id` int
);

CREATE TABLE  IF NOT EXISTS `ticket_message` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `ticket_id` int NOT NULL,
  `message` varchar(255) NOT NULL,
  `author` int DEFAULT NULL,
  `date_sent` datetime NOT NULL
);

CREATE TABLE  IF NOT EXISTS `faq` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL
);

CREATE TABLE IF NOT EXISTS `candidate` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(255) UNIQUE NOT NULL,
  `firstname` varchar(255),
  `lastname` varchar(255),
  `height` float(2),
  `weight` float(2),
  `sex` bit(1),
  `birthdate` datetime,
  `tests_nb` int,
  `user_id` int NOT NULL
);

CREATE TABLE IF NOT EXISTS `measure` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `heartbeat` float(2),
  `temperature` float(2),
  `conductivity` float(2),
  `visual_unexpected_reflex` float(2),
  `visual_expected_reflex` float(2),
  `sound_unexpected_reflex` float(2),
  `sound_expected_reflex` float(2),
  `tonality_recognition` float(2),
  `date_measured` datetime,
  `candidate_id` int NOT NULL
);


ALTER TABLE `ticket` ADD FOREIGN KEY (`admin_id`) REFERENCES `user` (`id`);

ALTER TABLE `ticket` ADD FOREIGN KEY (`opener_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

ALTER TABLE `ticket_message` ADD FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`) ON DELETE CASCADE;

ALTER TABLE `ticket_message` ADD FOREIGN KEY (`author`) REFERENCES `user` (`id`);

ALTER TABLE `candidate` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

ALTER TABLE `measure` ADD FOREIGN KEY (`candidate_id`) REFERENCES `candidate` (`id`) ON DELETE CASCADE;