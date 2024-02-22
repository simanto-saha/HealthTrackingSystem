CREATE DATABASE health_tracker;

CREATE TABLE health_profile(
    H_record_Id int NOT NULL AUTO_INCREMENT,
    height int NOT NULL,
    date_of_record date NOT NULL,
    weight int NOT NULL,
    Primary Key (H_record_Id),FOREIGN Key (User_Id) REFERENCES users(User_Id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE physical_health(
    H_record_Id int NOT NULL AUTO_INCREMENT,
    cholesterol int NOT NULL,
    blood_pressure int NOT NULL,
    Primary Key (H_record_Id),
);

CREATE TABLE mental_health(
    H_record_Id int NOT NULL AUTO_INCREMENT,
    stress_level varchar(20) NOT NULL,
    anxiety_level varchar(20) NOT NULL,
    Primary Key (H_record_Id),
);
