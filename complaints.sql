-- Create database
CREATE DATABASE IF NOT EXISTS complaints;

-- Use the complaints database
USE complaints;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Insert sample user
INSERT INTO users (username, password) VALUES ('sampleuser', 'samplepassword');

-- Create complaint_students table
CREATE TABLE IF NOT EXISTS complaint_students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Insert sample student
INSERT INTO complaint_students (student_id, password) VALUES ('samplestudent', 'samplepassword');

-- Create complaints table
CREATE TABLE IF NOT EXISTS complaints (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(255) NOT NULL,
    complaint_text TEXT NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample complaints
INSERT INTO complaints (student_id, complaint_text) VALUES ('samplestudent', 'This is a sample complaint.');
INSERT INTO complaints (student_id, complaint_text) VALUES ('samplestudent', 'Another sample complaint.');

-- Create admins table
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    admin_username VARCHAR(255) NOT NULL,
    admin_password VARCHAR(255) NOT NULL
);

-- Insert sample admin
INSERT INTO admins (admin_username, admin_password) VALUES ('admin', 'adminpassword');


ALTER TABLE complaints CHANGE COLUMN timestamp created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;
