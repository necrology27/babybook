create database babyBook;
use babyBook;


CREATE TABLE users(
    id INT NOT NULL AUTO_INCREMENT Primary key,
    name VARCHAR(30),
    password VARCHAR(256),
    email VARCHAR(100),
    registration_date timestamp,
    birthday Date,
    role int,
    language int,
    measurement enum('SI (metre, kilogram)', 'English units(yard, stone)')
    -- 1 yard=0.9144 m
    -- 1 stone = 6.35 kg
);

CREATE TABLE children(
    id INT NOT NULL AUTO_INCREMENT Primary key,
    name VARCHAR(30),
    default_image INT,
    is_parent boolean,
    birthday date,
    -- gramban
    birth_weight int,		
    birth_length double,
    apgar_score varchar(10),
    gender enum('M', 'F'),
    genetical_disorders varchar(240),
    other_disorders varchar(240),
    registration_date timestamp
);

CREATE TABLE roles(
    id INT NOT NULL AUTO_INCREMENT Primary key,
    name VARCHAR(30)
);

CREATE TABLE siblings(
	child_id1 INT,
    child_id2 INT,
    twins boolean
);

CREATE TABLE skill_groups(
	id int NOT NULL AUTO_INCREMENT Primary key,
    name enum('Personal-Social','Fine Motor-Adaptive','Language','Gross Motor')

);
CREATE TABLE skills(
	id int NOT NULL AUTO_INCREMENT Primary key,
    name varchar(36),
    passed25pct double,
    passed50pct double,
    passed75pct double,
    passed90pct double,
    description text,
    -- int???? vagy enum???
    skill_group_id int
    
);

CREATE TABLE images(
	id int NOT NULL AUTO_INCREMENT Primary key,
    child_id int,
    file_name varchar(100),
    upload_date timestamp,
    age int,
    title varchar(100),
    description text
);


CREATE TABLE answers(
	child_id int,
    skill_id int,
    age int,
    learned boolean,
    checked_date date,
    user_id int
);

CREATE TABLE languages(
	id int NOT NULL AUTO_INCREMENT Primary key,
    language_name varchar(20)
);

CREATE TABLE skill_group_languages(
	lang_id int,
    skill_group_id int,
    skill_group_name varchar(36)
);

CREATE TABLE skill_language(
	lang_id int,
    skill_id int,
    skill_name varchar(50),
    description text
);
CREATE TABLE posts(
	id INT NOT NULL AUTO_INCREMENT Primary key,
    user_id int,
    title varchar(100),
    locked boolean,
    sticky boolean,
    description text,
    points int,
    upload_date timestamp
);

CREATE TABLE votes(
	user_id INT,
    post_id INT,
    votes_value boolean,
    votes_date timestamp
);


CREATE TABLE comments(
	id INT NOT NULL AUTO_INCREMENT Primary key,
    post_id INT,  #REFERENCES posts(id),
    user_id INT,	#REFERENCES users(id),
    comment_text text,
    comment_date timestamp
);
