CREATE TABLE elib (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(25) NOT NULL,
    course VARCHAR(25) NOT NULL,
    email VARCHAR(55) NOT NULL,
    contact VARCHAR(25) NOT NULL,
    password VARCHAR(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;
INSERT INTO elib (fullname,email,password) VALUES('admin', 'admin@gmail.com', '123');


CREATE TABLE booklist (
    book_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(25) NOT NULL,
    author VARCHAR(25) NOT NULL,
    about VARCHAR(300) NOT NULL
     );


    CREATE TABLE reservation (
        reservation_id  INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        FOREIGN KEY (user_id) REFERENCES elib(user_id),
        selected_books VARCHAR(25) NOT NULL,
        timess TIME,
        dates DATE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf32;