CREATE TABLE users (
                       id INT PRIMARY KEY AUTO_INCREMENT,
                       username VARCHAR(50) NOT NULL,
                       email VARCHAR(100) NOT NULL,
                       password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, email, password)
VALUES ('bryan_johnson', 'john@example.com', 'password123');

INSERT INTO users (username, email, password)
VALUES ('satoshi_nakamoto', 'jane@example.com', 'qwerty456');

INSERT INTO users (username, email, password)
VALUES ('mike_mangini', 'mike@example.com', 'abc123');

INSERT INTO users (username, email, password)
VALUES ('david_goggins', 'dont@knowme.son', 'pass1234');

INSERT INTO users (username, email, password)
VALUES ('alex_thompson', 'alex@example.com', 'test456');

