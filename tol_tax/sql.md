CREATE DATABASE IF NOT EXISTS toll_system;
USE toll_system;

CREATE TABLE toll_records (
  id INT AUTO_INCREMENT PRIMARY KEY,
  vehicle_no VARCHAR(20),
  vehicle_type VARCHAR(30),
  toll_amount DECIMAL(10,2),
  timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
);
