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
	company int(9)
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

INSERT INTO tbl_users(username, password) VALUES("dannah", md5('12345'));
INSERT INTO tbl_users(username, password) VALUES("james", md5('12345'));
INSERT INTO tbl_users(username, password) VALUES("ariel", md5('12345'));
INSERT INTO tbl_users(username, password) VALUES("bob", md5('12345'));
INSERT INTO tbl_users(username, password) VALUES("lysle", md5('12345'));
INSERT INTO tbl_users(username, password) VALUES("mae", md5('12345'));
INSERT INTO tbl_users(username, password) VALUES("seaan", md5('12345'));
INSERT INTO tbl_users(username, password) VALUES("cecille", md5('12345'));
INSERT INTO tbl_users(username, password) VALUES("ervina", md5('12345'));
INSERT INTO tbl_users(username, password) VALUES("percy", md5('12345'));

INSERT INTO tbl_personal_info(lname, fname, mname, email, educ_index) VALUES("Bacagan", "Dannah", "Bariring", "bacagandannah@gmail.com", (SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name="College" AND tbl_education.degree = "BS Physics"));
INSERT INTO tbl_personal_info(lname, fname, mname, email, educ_index)  VALUES("Dela Cruz", "James", "Miguel", 'jamess@gmail.com', (SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name="College" AND tbl_education.degree = "BS Biology"));
INSERT INTO tbl_personal_info(lname, fname, mname, email, educ_index)  VALUES('Navarro', 'Ariel', 'Garcia', 'nariel@gmail.com', (SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name="College" AND tbl_education.degree = "BS IT"));
INSERT INTO tbl_personal_info(lname, fname, mname, email, educ_index)  VALUES('Co', 'Bob', 'Sy', 'bobco@gmail.com', (SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name="Pre-school"));
INSERT INTO tbl_personal_info(lname, fname, mname, email, educ_index)  VALUES("Go", "Lysle", "Estacio", 'lysle@gmail.com',(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name="Elementary"));
INSERT INTO tbl_personal_info(lname, fname, mname, email, educ_index)  VALUES('Bustillo', 'Mae', 'Sy', 'mae@gmail.com',(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name="Master's" AND tbl_education.degree = "MS IT"));
INSERT INTO tbl_personal_info(lname, fname, mname, email, educ_index)  VALUES("Tira", "Sean", "Cabrera", 'seantira@gmail.com', (SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name="Doctorate"AND tbl_education.degree = "Doctor of economy" ));
INSERT INTO tbl_personal_info(lname, fname, mname, email, educ_index)  VALUES("Villanueva", "Cecille", "Estacio", 'cecillev@gmail.com',(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name="Senior High School"));
INSERT INTO tbl_personal_info(lname, fname, mname, email, educ_index)  VALUES("Ladio", "Ervina", "Cepe", "ervinaladio@gmail.com",(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name="Master's" AND tbl_education.degree = "MS IT"));
INSERT INTO tbl_personal_info(lname, fname, mname, email, educ_index)  VALUES("Manzano", "Percy", "Estacio", 'percymanzano@gmail.com',(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name="none"));


INSERT INTO tbl_education(educ_level, degree) VALUES((SELECT educ_level FROM tbl_educ_level WHERE level_name="College"), "BS IT");
INSERT INTO tbl_education(educ_level, degree) VALUES((SELECT educ_level FROM tbl_educ_level WHERE level_name="College"), "BS CompSci");
INSERT INTO tbl_education(educ_level, degree) VALUES((SELECT educ_level FROM tbl_educ_level WHERE level_name="College"), "BS Biology");
INSERT INTO tbl_education(educ_level, degree) VALUES((SELECT educ_level FROM tbl_educ_level WHERE level_name="College"), "BS Math");
INSERT INTO tbl_education(educ_level, degree) VALUES((SELECT educ_level FROM tbl_educ_level WHERE level_name="College"), "BS Physics");
INSERT INTO tbl_education(educ_level, degree) VALUES((SELECT educ_level FROM tbl_educ_level WHERE level_name="Master's"), "MS IT");
INSERT INTO tbl_education(educ_level, degree) VALUES((SELECT educ_level FROM tbl_educ_level WHERE level_name="Master's"), "MS CompSci");
INSERT INTO tbl_education(educ_level, degree) VALUES((SELECT educ_level FROM tbl_educ_level WHERE level_name="Master's"), "MBA");
INSERT INTO tbl_education(educ_level, degree) VALUES((SELECT educ_level FROM tbl_educ_level WHERE level_name="Doctorate"), "Doctor of laws");
INSERT INTO tbl_education(educ_level, degree) VALUES((SELECT educ_level FROM tbl_educ_level WHERE level_name="Doctorate"), "Doctor of medicine");
INSERT INTO tbl_education(educ_level, degree) VALUES((SELECT educ_level FROM tbl_educ_level WHERE level_name="Doctorate"), "Doctor of economy");
INSERT INTO tbl_education(educ_level, degree) VALUES((SELECT educ_level FROM tbl_educ_level WHERE level_name="none"), NULL);
INSERT INTO tbl_education(educ_level, degree) VALUES((SELECT educ_level FROM tbl_educ_level WHERE level_name="Pre-school"), NULL);
INSERT INTO tbl_education(educ_level, degree) VALUES((SELECT educ_level FROM tbl_educ_level WHERE level_name="Elementary"), NULL);
INSERT INTO tbl_education(educ_level, degree) VALUES((SELECT educ_level FROM tbl_educ_level WHERE level_name="Junior High School"), NULL);
INSERT INTO tbl_education(educ_level, degree) VALUES((SELECT educ_level FROM tbl_educ_level WHERE level_name="Senior High School"), NULL);
INSERT INTO tbl_education(educ_level, degree) VALUES((SELECT educ_level FROM tbl_educ_level WHERE level_name="Enlightened One"), NULL);

INSERT INTO tbl_educ_level(level_name) VALUES("none");
INSERT INTO tbl_educ_level(level_name) VALUES("Pre-school");
INSERT INTO tbl_educ_level(level_name) VALUES("Elementary");
INSERT INTO tbl_educ_level(level_name) VALUES("Junior High School");
INSERT INTO tbl_educ_level(level_name) VALUES("Senior High School");
INSERT INTO tbl_educ_level(level_name) VALUES("College");
INSERT INTO tbl_educ_level(level_name) VALUES("Master's");
INSERT INTO tbl_educ_level(level_name) VALUES("Doctorate");
INSERT INTO tbl_educ_level(level_name) VALUES("Enlightened One");

-- educ_index = 2000
INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Software engineer", 
	"Determines operational feasibility by evaluating analysis, problem definition, requirements, solution development, and proposed solutions", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS IT"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS IT"),
	(SELECT company_index FROM company WHERE name = "Jigzen")
);	

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Android developer", 
	"Designing and developing advanced applications for the Android platform", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS IT"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS IT"),
	(SELECT company_index FROM company WHERE name = "RAJ Technologiess")
);	

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Web developer", 
	"Responsible for building, and making improvements to, websites and web applications.", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS IT"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS IT"),
	(SELECT company_index FROM company WHERE name = "Techno Dream Web Works")
);	


-- educ_index = 2001
INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"System administrator", 
	"Install and configure software, hardware and networks", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS CompSci"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS CompSci"),
	(SELECT company_index FROM company WHERE name = "EFLEXervices")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Program manager", 
	"Oversee the operations of individual projects within programs", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS CompSci"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS CompSci"),
	(SELECT company_index FROM company WHERE name = "Amida Software Asia")
);


INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Software architect", 
	"Responsible for making make design choices, coordinate and oversee technical standards, including software coding standards, tools, and platforms", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS CompSci"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS CompSci"),
	(SELECT company_index FROM company WHERE name = "")
);


-- educ_index = 2002
INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Biochemist", 
	"Research or study chemical composition and processes of living organisms that affect vital processes such as growth and aging to determine chemical actions and effects on organisms", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS Biology"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS Biology"),
	(SELECT company_index FROM company WHERE name = "")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Genetic counselor", 
	"Assess the genetic makeup of clients and communicate with them about the risk of transmitting a genetic disease or disability to their offspring", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS Biology"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS Biology"),
	(SELECT company_index FROM company WHERE name = "")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Nanotechnologist", 
	"Deal with the design and manufacture of extremely small electronic circuits and mechanical devices built at the molecular level of matter", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS Biology"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS Biology"),
	(SELECT company_index FROM company WHERE name = "")
);

-- educ_index = 2003
INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Data scientist", 
	"Create various machine learning-based tools or processes within the company, such as recommendation engines or automated lead scoring systems", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS Math"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS Math")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Data analyst", 
	"Collect and store data on sales numbers, market research, logistics, linguistics, or other behaviors", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS Math"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS Math")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Statistician", 
	"Gather numerical data and then displays it, helping companies to make sense of quantitative data and to spot trends and make predictions", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS Math"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS Math")
);


-- educ_index = 2004
INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Geophysicist", 
	"Study the physical aspects of the earth using a range of methods, including gravity, magnetic, electrical and seismic", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS Physics"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS Physics")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Metallurgist", 
	"Develop and manufacture metal items and structures that range from tiny precision-made components to huge engineering parts", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS Physics"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS Physics")
);


INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Meteorologist", 
	"Record and analyze data from worldwide weather stations, satellites, radars and remote sensors", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS Physics"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "BS Physics")
);

-- educ_index = 2005
INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"IT Manager", 
	"Accomplish information technology staff results by communicating job expectations", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "MS IT"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "MS IT"),
	(SELECT company_index FROM company WHERE name = "EFLEXervices")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"IT Consultant", 
	"Consult staff from different parts of a client's organisation. analysing an organisation's data", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "MS IT"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "MS IT"),
	(SELECT company_index FROM company WHERE name = "Techno Dream Web Works")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Chief Technology Officer", 
	"Responsible for overseeing all technical aspects of the company", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "MS IT"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "MS IT"),
	(SELECT company_index FROM company WHERE name = "Amida Software Asia")
);

-- educ_index = 2006
INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Software designer", 
	"Responsible for problem-solving and planning for a software solution", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "MS CompSci"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "MS CompSci"),
	(SELECT company_index FROM company WHERE name = "Jigzen")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Network architect", 
	"Responsible for designing computer networks, including local area networks (LANs), wide area networks (WANs), the Internet, intranets, and other data communications systems", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "MS CompSci"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "MS CompSci"),
	(SELECT company_index FROM company WHERE name = "Texas Instruments")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Information technology auditor", 
	"Safeguard sensitive information by identifying weaknesses in a system's network and creating strategies to prevent any security breaches in the technology", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "MS CompSci"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "MS CompSci"),
	(SELECT company_index FROM company WHERE name = "")
);

-- educ_index = 2007
INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Financial manager", 
	"Responsible for the financial health of an organization", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "MBA"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "MBA"),
	(SELECT company_index FROM company WHERE name = "Long Shine Phils Inc.")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Product manager", 
	"Coordinate efforts among finance, development and marketing teams to produce new systems and widgets, ideally on deadline and under budge", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "MBA"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "MBA"),
	(SELECT company_index FROM company WHERE name = "Unilab")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Brand marketing manager", 
	"Plan, develop and direct marketing efforts to increase the value and performance of a specific brand, service or product", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "MBA"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "MBA"),
	(SELECT company_index FROM company WHERE name = "AXA")
);

-- educ_index = 2008
INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Lawyer", 
	"Represent clients in criminal and civil litigation and other legal proceedings, draw up legal documents, or manage or advise clients on legal transactions", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "Doctor of laws"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "Doctor of laws"),
	(SELECT company_index FROM company WHERE name = "Cajucom Law Office")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Judge", 
	"Preside over a courtroom, hearing evidence, making decisions on motions, instructing juries and making rulings", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "Doctor of laws"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "Doctor of laws"),
	(SELECT company_index FROM company WHERE name = "Court of Appeals")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Legal officer", 
	"Provide legal advice on diverse substantive and procedural questions of considerable complexity", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "Doctor of laws"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "Doctor of laws"),
	(SELECT company_index FROM company WHERE name = "Cajucom Law Office")
);

-- educ_index = 2009
INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Surgeon", 
	"Treat diseases, injuries, and deformities by invasive, minimally-invasive, or non-invasive surgical methods", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "Doctor of medicine"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "Doctor of medicine"),
	(SELECT company_index FROM company WHERE name = "Baguio General Hospital")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Internal medicine", 
	"Deal with the prevention, diagnosis, and treatment of adult diseases", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "Doctor of medicine"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "Doctor of medicine"),
	(SELECT company_index FROM company WHERE name = "St. Clare’s Medical Center")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Cardiologist", 
	"Diagnose and treat patients with heart and cardiovascular problems.", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "Doctor of medicine"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "Doctor of medicine"),
	(SELECT company_index FROM company WHERE name = "Makati Medical Center")
);

-- educ_index = 2010
INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Financial manager", 
	"Responsible for providing financial advice and undertaking related accounts administration", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "Doctor of economy"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "Doctor of economy"),
	(SELECT company_index FROM company WHERE name = "Long Shine Phils Inc.")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Economist", 
	"Analyze data using mathematical models and statistical techniques", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "Doctor of economy"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "Doctor of economy"),
	(SELECT company_index FROM company WHERE name = "Asia Pacific Digital")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Postsecondary economic teacher", 
	"Conduct research in their area of study to ensure that they are up to date on the latest theories and developments related to their specific topic", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "Doctor of economy"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_education.degree = "Doctor of economy"),
	(SELECT company_index FROM company WHERE name = "University of the Cordilleras")
);



-- educ_index = 2013
INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Truck driver", 
	"Transport and deliver cargo, serving businesses, campuses and private residences", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Elementary"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Elementary"),
	(SELECT company_index FROM company WHERE name = "")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Fitness instructor", 
	"Assess the clients' level of physical fitness and help them set and reach their fitness goals", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Elementary"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Elementary"),
	(SELECT company_index FROM company WHERE name = "Unilab")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Brickmason", 
	"Lay and bind building materials, such as brick, structural tile, concrete block, cinder block, glass block, and terra-cotta block, with mortar and other substances to construct or repair walls, partitions, arches, sewers, and other structures", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Elementary"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Elementary"),
	(SELECT company_index FROM company WHERE name = "Baguio General Hospital")
);

-- educ_index = 2014
INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Glazier", 
	"Cut and install glass in a range of building types, including homes and skyscrapers", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Junior High School"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Junior High School"),
	(SELECT company_index FROM company WHERE name = "Baguio General Hospital")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Real estate agent", 
	"Perform duties, such as study property listings, interview prospective clients, accompany clients to property site, discuss conditions of sale, and draw up real estate contracts", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Junior High School"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Junior High School"),
	(SELECT company_index FROM company WHERE name = "Asia Pacific Digital")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Cashier", 
	"Scan items, ensure that prices are quantities are correct, and collect payments", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Junior High School"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Junior High School"),
	(SELECT company_index FROM company WHERE name = "Robinsons")
);

-- educ_index = 2016
INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Makeup artist", 
	"Responsible for applying makeup and prosthetics to aesthetically enhance celebrities, performers, individuals, entertainers, or for special events such as weddings or dates", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Senior High School"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Senior High School"),
	(SELECT company_index FROM company WHERE name = "Camerahaus")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Carpenter", 
	"Follow blueprints and building plans to meet the needs of clients", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Senior High School"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Senior High School"),
	(SELECT company_index FROM company WHERE name = "Makati Medical Center")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Translator", 
	"Read documents. write and editing copies using software and bespoke applications to upload content", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Senior High School"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Senior High School"),
	(SELECT company_index FROM company WHERE name = "Asia Pacific Digital")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"God", 
	"Control the universe", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Enlightened One"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Enlightened One"),
	(SELECT company_index FROM company WHERE name = "")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Time traveler", 
	"Travel through space and time", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Enlightened One"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Enlightened One"),
	(SELECT company_index FROM company WHERE name = "")
);

INSERT INTO job_list(job_title, job_description, min_educ_level, educ_index, company) 
VALUES(
	"Mind reader", 
	"Read a person's thoughts and feelings", 
	(SELECT educ_index FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Enlightened One"),
	(SELECT tbl_education.educ_level FROM tbl_education JOIN tbl_educ_level ON tbl_education.educ_level=tbl_educ_level.educ_level WHERE tbl_educ_level.level_name = "Enlightened One"),
	(SELECT company_index FROM company WHERE name = "")
);


