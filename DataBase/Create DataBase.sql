DROP DATABASE IF EXISTS `subscriptionDB`;
CREATE DATABASE `subscriptionDB`; 
USE `subscriptionDB`;

CREATE TABLE Subscribers (
  `SubscriberID` tinyint(255) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `BirthDate` date NOT NULL,
  `RegistrationDate` date NOT NULL,
  PRIMARY KEY (`SubscriberID`)
);
INSERT INTO Subscribers VALUES (1,'Tal','Nazarenko','2000-04-18','2021-08-14');
INSERT INTO Subscribers VALUES (2,'Zhurik','Banditsky','1990-01-01','2020-06-13');
INSERT INTO Subscribers VALUES (3,'Zinaida','Petrovna','1890-02-04','2000-04-18');
INSERT INTO Subscribers VALUES (4,'Kid','Katan','2010-12-31','2021-08-14');

CREATE TABLE Movies (
  `MovieID` tinyint(255) NOT NULL AUTO_INCREMENT,
  `MovieName` varchar(50) NOT NULL,
  `DirectorName` varchar(50) NOT NULL,
  `ReleaseDate` date NOT NULL,
  `MinimalAge` tinyint(130) NOT NULL,
  PRIMARY KEY (`MovieID`)
);

INSERT INTO Movies VALUES (1,'shawshank redemption','Frank Darabont','1994-09-22',16);
INSERT INTO Movies VALUES (2,'The Dark Knight','Christopher Nolan','2008-07-24',13);
INSERT INTO Movies VALUES (3,'Tenet','Christopher Nolan','2020-08-12',13);
INSERT INTO Movies VALUES (4,'Asterix & Obelix vs. Ceasar','Claude Zidi','1999-02-03',6);

CREATE TABLE Subscriptions (
  `SubscriptionID` tinyint(255) NOT NULL AUTO_INCREMENT,
  `SubscriberID` tinyint(255) NOT NULL,
  `MovieID` tinyint(255) NOT NULL,
  `WatchDate` date NOT NULL,
  PRIMARY KEY (`SubscriptionID`),
  FOREIGN KEY (`SubscriberID`) REFERENCES Subscribers(`SubscriberID`),
  FOREIGN KEY (`MovieID`) REFERENCES Movies(`MovieID`)
);

INSERT INTO Subscriptions VALUES (1,1,4,'2021-08-15');
INSERT INTO Subscriptions VALUES (2,1,1,'2021-08-15');
INSERT INTO Subscriptions VALUES (3,3,2,'2010-12-31');

