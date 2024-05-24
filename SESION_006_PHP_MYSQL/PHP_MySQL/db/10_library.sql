DROP DATABASE IF EXISTS library;

CREATE DATABASE library;

ALTER DATABASE library DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

USE library;

DROP TABLE IF EXISTS library.users;

CREATE TABLE
  `library`.`users` (
    `id_user` INT (10) AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(8) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `token` TEXT
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

INSERT INTO
  library.users (username, password, email, token)
VALUES
  ('user1', '1234', 'example1@mail.com', 'ASDF'),
  ('user2', '1234', 'example2@mail.com', 'ASDFG'),
  ('user3', '1234', 'example3@mail.com', 'ASDFH');

DROP TABLE IF EXISTS library.books;

CREATE TABLE
  `library`.`books` (
    `id_book` INT (10) AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `author` VARCHAR(255) NOT NULL,
    `genre` VARCHAR(255) NOT NULL,
    `publication_year` DATE NOT NULL,
    `isbn` INT (10) NOT NULL UNIQUE
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

INSERT INTO
  library.books (title, author, genre, publication_year, isbn)
VALUES
  (
    'Harry Potter and the Sorcerer`s Stone',
    'J.K. Rowling',
    'Fantasy',
    1997,
    0590358324
  ),
  (
    'The Lord of the Rings',
    'J.R.R. Tolkien',
    'Fantasy',
    1954,
    0007175214
  );

CREATE TABLE
  `library`.`rents` (
    `id_rent` INT (10) AUTO_INCREMENT PRIMARY KEY,
    `id_user` INT (10) NOT NULL,
    `id_book` INT (10) NOT NULL,
    `rentDate` DATE NOT NULL,
    `returnDate` DATE NOT NULL,
    CONSTRAINT userID FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT bookID FOREIGN KEY (`id_book`) REFERENCES `books` (`id_book`) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

SHOW TABLES
FROM
  library;

DESCRIBE library.books;
