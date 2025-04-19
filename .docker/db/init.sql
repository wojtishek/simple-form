CREATE TABLE `form_submission` (
   `form_submission_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
   `name` varchar(255) NOT NULL,
   `email` varchar(255) NOT NULL,
   `birthdate` date NOT NULL,
   `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (`form_submission_id`)
);