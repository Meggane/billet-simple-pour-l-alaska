# billet-simple-pour-l-alaska
This repository is about project 4 of OpenClassRooms

This project consists in developing a simple blog application in PHP and with a MySQL database. It must provide a frontend interface (ticket reading) and a backend interface (ticket administration for writing). We must find all the elements of a CRUD.

Each ticket must allow the addition of comments, which can be moderated in the administration interface if it's necessary.
Readers should be able to "report" comments that will be managed by administrators.

The administration interface will be protected by password. The writing of tickets will be done in a WYSIWYG interface based on TinyMCE.

This project uses PHP 7 and MySQL 5. The code will be built on a MVC architecture.

INSTALLATION : 
Install PHP 7 and MYSQL 5.
Download TinyMCE with these plugins :
-	Advlist
-	Autolink
-	Charmap
-	Code
-	Fullscreen
-	Help
-	Image
-	Imagetools
-	Link
-	Lists
-	Media
-	Paste
-	Preview
-	Print
-	Quickbars
-	Searchreplace
-	Table
-	Wordcount

To get the site in local, use a web development platform and create the database with these tables :
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTickets` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `publicationDate` datetime NOT NULL,
  `report` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idTickets_fk` (`idTickets`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idComment` int(11) NOT NULL,
  `idTickets` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `reportingDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idComment` (`idComment`),
  KEY `idTickets` (`idTickets`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `creationDate` datetime NOT NULL,
  `modificationDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=177 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=158 DEFAULT CHARSET=utf8;

Then, edit PHPFactory.php file with the elements concerning your database. Create a user that you will pass an administrator in the database directly in the “admin” field like this : 1.
