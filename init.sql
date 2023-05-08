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
    Orders int(2) NOT NULL,
    timestamp_date timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (QuestionId ),
    FOREIGN KEY (SurveyCode) REFERENCES Surveys (SurveyCode) ON UPDATE  NO ACTION  ON DELETE  CASCADE,
    FOREIGN KEY (QuestionTypeId) REFERENCES QuestionTypes (QuestionTypeId) ON UPDATE  NO ACTION  ON DELETE  CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
CREATE UNIQUE INDEX QUESTION_ORDER ON Questions(SurveyCode, Orders);

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
