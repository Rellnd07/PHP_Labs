
CREATE DATABASE IF NOT EXISTS feedback_app;
USE feedback_app;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255),
    role VARCHAR(10),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100),
    email VARCHAR(100),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (name, email, password, role) VALUES (
  'Admin',
  'admin@example.com',
  '$2y$10$C6zQ2mX7yX5ZpbFZftI7Tuz4npoFeLxvQbFjMn7xChZCmAvFoODfG',
  'admin'
);

INSERT INTO feedback (user_name, email, message) VALUES
('Иван', 'ivan@example.com', 'Отличный сайт!'),
('Maria', 'maria@example.com', 'Полезный ресурс, буду заходить еще.');
