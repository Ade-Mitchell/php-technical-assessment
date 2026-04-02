CREATE DATABASE IF NOT EXISTS technical_assessment;
USE technical_assessment;

DROP TABLE IF EXISTS books;

CREATE TABLE books (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       title VARCHAR(255) NOT NULL,
                       author VARCHAR(255) NOT NULL,
                       published_year INT NOT NULL,
                       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO books (title, author, published_year) VALUES
                                                      ('1984', 'George Orwell', 1949),
                                                      ('The Hobbit', 'J.R.R. Tolkien', 1937),
                                                      ('Dune', 'Frank Herbert', 1965);