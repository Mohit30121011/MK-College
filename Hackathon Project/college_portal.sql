CREATE DATABASE college_portal;

USE college_portal;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100),
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(15),
    role ENUM('student', 'staff', 'admin') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(20) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    duration INT,
    fee DECIMAL(10, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE programs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT
);

CREATE TABLE semesters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    start_date DATE,
    end_date DATE
);

CREATE TABLE enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    course_id INT,
    semester_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (course_id) REFERENCES courses(id),
    FOREIGN KEY (semester_id) REFERENCES semesters(id)
);

CREATE TABLE ug_admissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    dob DATE NOT NULL,
    gender VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address TEXT NOT NULL,
    course VARCHAR(100) NOT NULL,
    tenth VARCHAR(255) NOT NULL,
    twelfth VARCHAR(255) NOT NULL,
    aadhar VARCHAR(255) NOT NULL,
    idproof VARCHAR(255) NOT NULL,
    photo VARCHAR(255) NOT NULL,
    signature VARCHAR(255) NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE pg_admissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    dob DATE NOT NULL,
    gender VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    address TEXT NOT NULL,
    course VARCHAR(100) NOT NULL,
    ug_marksheet VARCHAR(255) NOT NULL,
    pg_entrance VARCHAR(255),
    aadhar VARCHAR(255) NOT NULL,
    idproof VARCHAR(255) NOT NULL,
    photo VARCHAR(255) NOT NULL,
    signature VARCHAR(255) NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE fee_payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    amount DECIMAL(10, 2),
    payment_method VARCHAR(50),
    status ENUM('pending', 'paid', 'failed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES users(id)
);
