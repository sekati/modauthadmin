# @see http://www.debuntu.org/how-to-apache2-authentication-using-mysql-backend-page-2
# mysql -u root -p < authdb.sql

# remove old db/user
DROP DATABASE authdb;
DROP USER authdb_user;

# create new db/user
CREATE DATABASE authdb;
GRANT ALL ON authdb.* TO 'authdb_user'@'%' IDENTIFIED BY 'ModAuthMySQLAuthent1cat10n';
FLUSH PRIVILEGES;
USE authdb;


# create accounts table
CREATE TABLE `accounts` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`email` varchar(255) NOT NULL DEFAULT '',
`username` varchar(30) NOT NULL DEFAULT '',
`passwd` varchar(40) NOT NULL DEFAULT '',
`groups` varchar(255) NOT NULL DEFAULT '',
`enabled` tinyint(1) unsigned NOT NULL DEFAULT '1',
`created` timestamp NULL DEFAULT NULL,
`modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY  (`id`),
UNIQUE KEY `username` (`username`),
UNIQUE KEY `email` (`email`),
KEY `groups` (`groups`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='ModAuthMySQL Accounts DB';


# accounts insert trigger: add `created` timestamp & SHA1 the `passwd` field automagically!
DELIMITER //
CREATE TRIGGER accounts_insert_trigger BEFORE INSERT ON `accounts`
FOR EACH ROW
BEGIN
  SET NEW.created = CURRENT_TIMESTAMP;
  SET NEW.passwd = SHA1(NEW.passwd);
END//
DELIMITER ;


# accounts update trigger: SHA1 the new `passwd` field value automagically!
CREATE TRIGGER accounts_update_trigger BEFORE UPDATE ON `accounts` FOR EACH ROW SET NEW.passwd = SHA1(NEW.passwd);

# insert dummy accounts (no need to SHA1 these inserts as the trigger takes care of this stuff for us!)
#INSERT INTO `accounts` (username, email, passwd, groups) VALUES ('root', 'root@sekati.com', 'password', 'wheel');
#INSERT INTO `accounts` (username, email, passwd, groups) VALUES ('admin', 'admin@sekati.com', 'password', 'wheel');
#INSERT INTO `accounts` (username, email, passwd, groups) VALUES ('test', 'test@sekati.com', 'password', 'testgroup');
#INSERT INTO `accounts` (username, email, passwd, groups) VALUES ('testadmin', 'testadmin@sekati.com', 'password', 'wheel,testgroup');
#INSERT INTO `accounts` (username, email, passwd, groups, enabled) VALUES ('bad', 'bad@sekati.com', 'password', 'badgroup', '0');

INSERT INTO `accounts` (username, email, passwd, groups) VALUES ('admin', 'admin@sekati.com', 'au7th3nt1c@t0r', 'wheel,admins');
INSERT INTO `accounts` (username, email, passwd, groups) VALUES ('jason', 'jason@sekati.com', 'au7th3nt1c@t0r', 'wheel,admins,svnusers');