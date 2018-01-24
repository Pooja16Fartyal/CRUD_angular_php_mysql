# CRUD_angular_php_mysql
Crud operation with the help of angular php and mysql

Create a table with the follwing SCHEMA


CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO INCREMENT,
  PRIMARY KEY (id),
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
