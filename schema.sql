
DROP DATABASE IF EXISTS hireme;
CREATE DATABASE hireme;
USE hireme;



CREATE TABLE users(
    id int(10) NOT NULL auto_increment,
    firstname varchar(80) NOT NULL default '',
    lastname varchar(80) NOT NULL default '',
    password char(200) NOT NULL,                    --200 char becuase passwords will need to be hashed.
    telephone varchar(15) UNIQUE NOT NULL,
    email varchar(80) UNIQUE NOT NULL,
    date_joined date NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE jobs(
    id int(10) NOT NULL auto_increment,
    job_title varchar(250) NOT NULL,
    job_description,
    category varchar(50),
    company_name varchar(80),
    company_location varchar(250),
    date_posted date,
    PRIMARY KEY(id)
);

CREATE TABLE jobs_applied_for(
    id int(10) NOT NULL auto_increment,
    job_id int(10),
    user_id int(10),
    date_applied date,
    PRIMARY KEY(id),
    FOREIGN KEY(job_id) REFERENCES job(id),
    FOREIGN KEY(user_id) REFERENCES users(id),
);