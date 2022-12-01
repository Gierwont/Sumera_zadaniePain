DROP DATABASE szkola;
CREATE DATABASE szkola;

CREATE TABLE student (
    id INT NOT NULL AUTO_INCREMENT ,
    name VARCHAR(50),
    surname VARCHAR(50),
    class_id INT NOT NULL, 
    PRIMARY KEY (id)
    );
CREATE TABLE klasa (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50),
    PRIMARY KEY (id)
    );
CREATE TABLE teacher (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR (50),
    surname VARCHAR (50),
    age INT,
    PRIMARY KEY (id)
    );
CREATE TABLE subject (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50),
    class_id INT NOT NULL,
    PRIMARY KEY (id)
    );

ALTER TABLE student ADD FOREIGN KEY (class_id) REFERENCES klasa(id);
ALTER TABLE subject ADD FOREIGN KEY (class_id) REFERENCES klasa(id);
ALTER TABLE teacher ADD FOREIGN KEY (id) REFERENCES subject(id);

CREATE TABLE user (
    id INT NOT NULL AUTO_INCREMENT ,
    login VARCHAR(50) UNIQUE,
    haslo VARCHAR(50) , 
    PRIMARY KEY (id)
    );

ALTER TABLE user ADD COLUMN name varchar(50) DEFAULT "Kostek";
ALTER TABLE user ADD COLUMN surname varchar(50) DEFAULT "Dodo";
ALTER TABLE user ADD COLUMN age int DEFAULT 20;
ALTER TABLE user ADD COLUMN admin BOOLEAN DEFAULT 0;