
-- Don't look here for answers you cheater. 
-- Go out there and actually hack those sites!


-- Recreate webshop user
-- (really long procedure for non existing 'DROP USER IF EXISTS' construct in MySQL)
-- See: http://bugs.mysql.com/bug.php?id=19166
CREATE DATABASE IF NOT EXISTS temp;
DROP PROCEDURE IF EXISTS `temp`.`drop_user_if_exists` ;
DELIMITER $$
CREATE PROCEDURE `temp`.`drop_user_if_exists`(username VARCHAR(100))
BEGIN
  DECLARE foo BIGINT DEFAULT 0 ;
  SELECT COUNT(*)
  INTO foo
    FROM `mysql`.`user`
      WHERE `User` = username;

  IF foo > 0 THEN
      SELECT CONCAT('DROP USER ', GROUP_CONCAT(CONCAT(QUOTE(username), '@', QUOTE('localhost'))))
      INTO @sql;
      PREPARE stmt FROM @sql;
      EXECUTE stmt;
  END IF;
END ;$$
DELIMITER ;
CALL `temp`.`drop_user_if_exists`('webshop') ;
CALL `temp`.`drop_user_if_exists`('bank') ;
DROP DATABASE temp;

CREATE USER 'webshop'@'localhost' IDENTIFIED BY 'pass';
GRANT ALL PRIVILEGES ON  `webshop`.* TO  'webshop'@'localhost';

DROP DATABASE IF EXISTS webshop;
CREATE DATABASE webshop;
USE webshop;

CREATE TABLE `gebruikers` (
  `id` int(11) NOT NULL,
  `gebruikersnaam` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `gebruikers` (`id`, `gebruikersnaam`, `wachtwoord`) VALUES
(1, 'Admin', 'ikbenzoslim'),
(2, 'Paul', 'wachtwoord12345'),
(3, 'Wim', '1337hacker'),
(4, 'Marco', 'apple4ever');

CREATE TABLE `producten` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `prijs` decimal(10,2) NOT NULL,
  `beschrijving` text NOT NULL,
  `afbeelding` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `producten` (`id`, `naam`, `prijs`, `beschrijving`, `afbeelding`) VALUES
(0, 'Kraan Deluxe', 100.00, 'Onze beste kraan! Past perfect bij elk interieur', 'deluxe.jpg'),
(1, 'Kraan Basis', 5.00, 'Kraan zonder poespas', 'basis.jpg'),
(2, 'Geldkraan', 30.00, 'Lastig open te draaien, maar makkelijk om dicht te draaien. Betaalt zichzelf terug', 'geld.jpg'),
(4, 'Dubbel afsluitbare kraan', 40.00, 'Voor als u nog zekerder wilt zijn dat uw kraan niet lekt', 'kurk.jpg');


CREATE USER 'bank'@'localhost' IDENTIFIED BY 'pass';
GRANT ALL PRIVILEGES ON `bank`.* TO 'bank'@'localhost';

DROP DATABASE IF EXISTS bank;
CREATE DATABASE bank;
USE bank;

CREATE TABLE `gebruikers` (
  `gebruikersnaam` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `balans` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`gebruikersnaam`, `wachtwoord`, `balans`) VALUES
('Alice', 'fluviusmaximus', 2600.00),
('Bob', '123456', 10.00),
('Carol', 'cuteasabuttonintheeyes', 42.00);

