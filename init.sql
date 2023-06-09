 CREATE DATABASE IF NOT EXISTS `cpsc332-magic survey` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
 USE `cpsc332-magic survey`;

 CREATE TABLE IF NOT EXISTS Users (
   UserId int(11) NOT NULL AUTO_INCREMENT,
   username varchar(255) NOT NULL,
   FirstName varchar(255) NOT NULL,
   LastName varchar(255) NOT NULL,
   email varchar(255) NOT NULL,
   password varchar(30) NOT NULL,
   phone varchar(255) NOT NULL,
   timestamp_date timestamp DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (UserId)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ; 
 
 INSERT INTO `Users` (`UserId`, `username`, `FirstName`, `LastName`, `email`, `password`, `phone`, `timestamp_date`) VALUES ('0', 'removed', 'removed', 'removed', 'removed@removed.com', 'removed', '5555555555', current_timestamp()); 
 UPDATE users SET UserId = 0 WHERE username = "removed"; 

CREATE TABLE IF NOT EXISTS Statuses(
    StatusId int(11) NOT NULL AUTO_INCREMENT,
    Name varchar(30) NOT NULL,
    timestamp_date timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (StatusId)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS QuestionTypes(
    QuestionTypeId int(11) NOT NULL AUTO_INCREMENT,
    Name varchar(30) NOT NULL,
    Description varchar(1024) NOT NULL,
    timestamp_date timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (QuestionTypeId )
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS Surveys(
    SurveyCode int(11) NOT NULL AUTO_INCREMENT,
    Name varchar(30) NOT NULL,
    Description varchar(1024) NOT NULL,
    StartDateTime DATETIME DEFAULT CURRENT_TIMESTAMP,
    EndDateTime DATETIME DEFAULT CURRENT_TIMESTAMP,   
    UserId int(11) NOT NULL,
    StatusId int(11) NOT NULL,
    timestamp_date timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (SurveyCode ),
    FOREIGN KEY (UserId) REFERENCES Users (UserId) ON UPDATE  NO ACTION  ON DELETE  CASCADE,
    FOREIGN KEY (StatusId) REFERENCES Statuses(StatusId) ON UPDATE  NO ACTION  ON DELETE  CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS Questions(
    QuestionId int(11) NOT NULL AUTO_INCREMENT,
    Name varchar(30) NOT NULL,
    Description varchar(1024) NOT NULL,
    SurveyCode int(11) NOT NULL,
    QuestionTypeId int(11) NOT NULL,
    timestamp_date timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (QuestionId ),
    FOREIGN KEY (SurveyCode) REFERENCES Surveys (SurveyCode) ON UPDATE  NO ACTION  ON DELETE  CASCADE,
    FOREIGN KEY (QuestionTypeId) REFERENCES QuestionTypes (QuestionTypeId) ON UPDATE  NO ACTION  ON DELETE  CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS AnswerChoices(
    AnswerChoiceId int(11) NOT NULL AUTO_INCREMENT,
	Answer varchar(1024),
    QuestionId int(11) NOT NULL,
    timestamp_date timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (AnswerChoiceId),
    FOREIGN KEY (QuestionId) REFERENCES Questions (QuestionId) ON UPDATE  NO ACTION  ON DELETE  CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS Responses(
    QuestionId int(11) NOT NULL,
    UserId int(11) NOT NULL,
    AnswerOptionId varchar(1024) NOT NULL,
    Answer varchar(4096),
    timestamp_date timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY CLUSTERED (QuestionId, UserId),
    FOREIGN KEY (QuestionId) REFERENCES Questions (QuestionId) ON UPDATE  NO ACTION  ON DELETE  CASCADE,
    FOREIGN KEY (UserId) REFERENCES Users (UserId) ON UPDATE  NO ACTION  ON DELETE  CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

USE `cpsc332-magic survey`;
INSERT INTO `QuestionTypes` (`QuestionTypeId`, `Name`, `Description`, `timestamp_date`)
VALUES (NULL, 'Multiple answers', 'Respondents can choose more than one answer from the available\r\noptions.\r\n', current_timestamp()), 
(NULL, 'Multiple choice', 'Respondents can choose only one answer from the available options.', CURRENT_TIMESTAMP()),
(NULL, 'Yes/No', 'Respondents can either choose yes or no.', current_timestamp()), 
(NULL, 'Essay', 'Respondents can enter anything into the answer textbox.', current_timestamp());

INSERT INTO `Users` (UserId, username, FirstName, LastName, email, password, phone)
VALUES(0, 'removed', 'removed', 'removed', 'removed', 'rjlksadjf.asdjfJKl(*(*32kjK', 'removed');
UPDATE Users SET UserId = 0 WHERE username = 'removed';
