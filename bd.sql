CREATE TABLE `type_commercants` (
  `id_commercant` smallint(11) UNSIGNED NOT NULL,
  `nom` VARCHAR (50) DEFAULT NULL,
  `date_installation` DATE UNSIGNED DEFAULT NULL,
  `prix_location` FLOAT (7.2) UNSIGNED NOT NULL,
  `id_type_commercant` smallint(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO type_commercants VALUES (1, 'Boucherie');
INSERT INTO type_commercants VALUES (2, 'Boulangerie');
INSERT INTO type_commercants VALUES (3, 'Maraicher');
INSERT INTO type_commercants VALUES (4, 'Fromagerie');







insert into commercants values (1,'Boucherie Rousselet','2010-1-1','500',1);
insert into commercants values (2,'Boulanger Peslier','2009-1-1','600',2);
insert into commercants values (3,'Patisserie Perez','2014-1-1','600',2);
insert into commercants values (4,'Maraicher Ravier','2014-1-1','600',3);
insert into commercants values (5,'Bon Pain Woltz','2013-1-1','700',2);
insert into commercants values (6,'Caly Maraicher','2014-1-1','600',3);
insert into commercants values (7,'Boucherie Caly','2013-1-1','600',1);
insert into commercants values (8,'Fromagerie mervant','2013-1-1','600',4);
insert into commercants values (9,'Boulangerie Laure','2013-1-1','800',2);
insert into commercants values (10,'Boucherie Laurent','2013-1-1','800',1);
insert into commercants values (11,'Fromagerie dupuis','2014-1-1','600',4);