Create a database named login_db

Run this SQL in the SQL tab:


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Insert one user (password is hashed)
INSERT INTO users (email, password) 
VALUES ('nishant@example.com', SHA1('password123'));
