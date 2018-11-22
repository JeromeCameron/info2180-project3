
DROP DATABASE IF EXISTS hireme;
CREATE DATABASE hireme;
USE hireme;


CREATE TABLE users(
    id int(10) NOT NULL auto_increment,
    firstname VARCHAR(80) NOT NULL default '',
    lastname VARCHAR(80) NOT NULL default '',
    password char(200) NOT NULL,
    telephone VARCHAR(15) NOT NULL,
    email VARCHAR(80) UNIQUE NOT NULL,
    date_joined DATE,
    PRIMARY KEY(id)
);

CREATE TABLE jobs(
    id int(10) NOT NULL auto_increment,
    job_title VARCHAR(250) NOT NULL,
    job_description LONGTEXT,
    category VARCHAR(50),
    company_name VARCHAR(80),
    company_location VARCHAR(250),
    date_posted DATE,
    PRIMARY KEY(id)
);

CREATE TABLE jobsAppliedFor(
    id int(10) NOT NULL auto_increment,
    job_id int(10),
    user_id int(10),
    date_applied date,
    PRIMARY KEY(id),
    FOREIGN KEY(job_id) REFERENCES jobs(id),
    FOREIGN KEY(user_id) REFERENCES users(id)
);

INSERT INTO users(firstname,lastname,password,telephone,email,date_joined) VALUES("Gregory","Anderson","password123","1888-998-5555","admin@hireme.com","2018-2-1");
INSERT INTO users(firstname,lastname,password,telephone,email,date_joined) VALUES("Kirsten","Kellman","pass1","1888-998-5555","kirsten@gmail.com","2018-11-20");
INSERT INTO users(firstname,lastname,password,telephone,email,date_joined) VALUES("Damian","Ross","pass2","1888-998-5555","damian@gmail.com","2018-11-1");
INSERT INTO users(firstname,lastname,password,telephone,email,date_joined) VALUES("Jerome","cameron","pass3","1888-998-5555","jerome@gmail.com","2018-11-22");
INSERT INTO users(firstname,lastname,password,telephone,email,date_joined) VALUES("Joevel","Edwards","pass4","1888-998-5555","joevel@gmail.com","2018-11-12");

INSERT INTO jobs(job_title,job_description,category,company_name,company_location,date_posted) VALUES("Applications Engineer","design apps","Computer Science", "Box","California","2018-10-23");
INSERT INTO jobs(job_title,job_description,category,company_name,company_location,date_posted) VALUES("Web Designer","design apps","Computer Science", "Youtube","Florida","2018-10-21");
INSERT INTO jobs(job_title,job_description,category,company_name,company_location,date_posted) VALUES("Full Stack Engineer","design apps","Computer Science", "Uber","California","2018-10-23");
INSERT INTO jobs(job_title,job_description,category,company_name,company_location,date_posted) VALUES("English Teacher","Teach English","Teacher", "Wolmers","Jamaica","2018-10-13");
INSERT INTO jobs(job_title,job_description,category,company_name,company_location,date_posted) VALUES("Facilities Ececutive","Support technical team","Facilities", "Google","New York","2018-10-2");

INSERT INTO jobsAppliedFor(job_id,user_id,date_applied) VALUES(3,2,"2018-11-21");
INSERT INTO jobsAppliedFor(job_id,user_id,date_applied) VALUES(3,3,"2018-11-21");
INSERT INTO jobsAppliedFor(job_id,user_id,date_applied) VALUES(2,1,"2018-11-21");
INSERT INTO jobsAppliedFor(job_id,user_id,date_applied) VALUES(3,2,"2018-11-21");
INSERT INTO jobsAppliedFor(job_id,user_id,date_applied) VALUES(4,3,"2018-11-21");