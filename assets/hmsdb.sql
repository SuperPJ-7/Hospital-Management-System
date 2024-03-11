--create table admin
create table admin(
	email varchar(255) primary key,
    password varchar(255) not null,
    username varchar(50) not null UNIQUE
);

--create table doctor(doctor-id,doctor-name,specialization,contact,email,license)
create table doctor(
    did int auto_increment primary key,
    name varchar(255) not null,
    spec varchar(30) not null,
    contact int not null,
    email varchar(255) UNIQUE not null,
    lic varchar(255) not null,
    password varchar(255) not null
);

--nurse(nurse-id,nurse-name,nurse-email,nurse-contact)
create table nurse(
	nid int AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) not null,
    email varchar(255) not null UNIQUE,
    contact varchar(255) not null
);

--patient(patient-id,patient-name,contact,dob,gender,email,password)
create table patient(
    pid int auto_increment primary key,
    name varchar(255) not null,
    cont int not null,
    dob varchar(255) not null,
    gender varchar(7) not null,
    email varchar(255) not null UNIQUE,
    password varchar(255) not null
);

--appointment(appointment-id,patient-id(fk),doctor-id(fk),appointmentdate,appointment-time,status)
create table appointment(
    aid int auto_increment primary key,
    patient_id int,
    doctor_id int,
    apt_date varchar(50) not null,
    apt_time varchar(50) not null,
    apt_status varchar(50),
    FOREIGN KEY(patient_id) REFERENCES patient(pid),
    FOREIGN KEY(doctor_id) REFERENCES doctor(did)

);