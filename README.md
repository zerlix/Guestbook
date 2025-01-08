
# Datenbank Tabelle

Erstelle einen Datenbank mit folgendem SQL Script.
```sql
CREATE DATABASE guestbook;

USE guestbook;

CREATE TABLE entries (
    gb_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    datum DATE NOT NULL,
    messages TEXT NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

```