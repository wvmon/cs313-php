DROP TABLE history;
DROP TABLE journal;
DROP TABLE users;

CREATE TABLE users(
    id SERIAL PRIMARY KEY NOT NULL,
    username VARCHAR(40) NOT NULL,
    password VARCHAR(40) NOT NULL
);

CREATE TABLE journal(
    id SERIAL PRIMARY KEY NOT NULL,
    user_id INT REFERENCES users(id),
    title VARCHAR(40) NOT NULL,
    entry_date DATE NOT NULL,
    entry TEXT NOT NULL,
    attachments TEXT
);

CREATE TABLE history(
    id SERIAL PRIMARY KEY NOT NULL,
    entry_id INT REFERENCES journal(id),
    history_time TIMESTAMP NOT NULL,
    entry TEXT NOT NULL,
    expiration_date DATE NOT NULL
);

INSERT INTO users(username, password)
VALUES ('student', 'test');