CREATE TABLE tbl_users (
	user_index int(5) primary key auto_increment,
	username varchar(50) not null unique,
	password char(32) not null,
	retries tinyint(1) default 5
);

ALTER TABLE tbl_users AUTO_INCREMENT=1000;

CREATE TABLE tbl_personal_info(
	lname varchar(255) not null,
	fname varchar(255) not null,
	mname varchar(255) not null,
	email varchar(255) not null,
	educ_index int(5) not null,
	user_index int(5) primary key auto_increment
);

ALTER TABLE tbl_personal_info AUTO_INCREMENT=1000;

CREATE TABLE tbl_education(
	educ_index int(5) primary key auto_increment,
	educ_level tinyint(3) not null,
	degree varchar(50)
);


ALTER TABLE tbl_education AUTO_INCREMENT=2000;

CREATE TABLE tbl_educ_level(
	educ_level tinyint(2) primary key auto_increment,
	level_name varchar(50) not null
);


CREATE TABLE job_list(
	job_index int(4) primary key auto_increment,
	job_title varchar(50) not null,
	job_description varchar(255),
	min_educ_level tinyint(1) not null,
	educ_index int(8),
	company int(9), 
);

ALTER TABLE job_list AUTO_INCREMENT=8000;

CREATE TABLE company(
	company_index int(9) primary key auto_increment,
	name varchar(50),
	address varchar(255),
	contact varchar(50),
	logo_name varchar(50) unique
);

ALTER TABLE company AUTO_INCREMENT=9000;

