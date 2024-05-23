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
    about VARCHAR(300) NOT NULL,
    status VARCHAR(25) DEFAULT 'available'
     );
     INSERT INTO booklist (title, author, about) VALUES
('To Kill a Mockingbird', 'Harper Lee', 'A novel set in the American South during the 1930s, addressing racial injustice.'),
('1984', 'George Orwell', 'A dystopian novel depicting a totalitarian regime and its impact on society.'),
('The Great Gatsby', 'F. Scott Fitzgerald', 'A classic novel set in the Jazz Age, exploring themes of wealth, love, and the American Dream.'),
('Pride and Prejudice', 'Jane Austen', 'A romantic novel set in early 19th-century England, revolving around the lives of the Bennet sisters.'),
('The Catcher in the Rye', 'J.D. Salinger', 'A coming-of-age novel narrated by a teenager named Holden Caulfield.'),
('The Hobbit', 'J.R.R. Tolkien', 'A fantasy novel following the journey of Bilbo Baggins, who embarks on an adventure to reclaim treasure guarded by a dragon.'),
('Harry Potter and the Sorcerer''s Stone', 'J.K. Rowling', 'The first book in the Harry Potter series, introducing the magical world of Hogwarts and the young wizard, Harry Potter.'),
('The Lord of the Rings', 'J.R.R. Tolkien', 'An epic fantasy trilogy set in the fictional world of Middle-earth, following the quest to destroy the One Ring.'),
('The Chronicles of Narnia: The Lion, the Witch and the Wardrobe', 'C.S. Lewis', 'A fantasy novel depicting the adventures of four siblings in the magical land of Narnia.'),
('The Alchemist', 'Paulo Coelho', 'A philosophical novel following a young Andalusian shepherd named Santiago on his journey to fulfill his personal legend.'),
('The Little Prince', 'Antoine de Saint-Exupéry', 'A novella narrating the story of a young prince who travels from planet to planet, meeting various inhabitants.'),
('The Hunger Games', 'Suzanne Collins', 'A dystopian novel set in a future where teenagers fight to the death in a televised event.'),
('The Da Vinci Code', 'Dan Brown', 'A mystery thriller novel following symbologist Robert Langdon as he investigates a murder in Paris.'),
('Moby-Dick', 'Herman Melville', 'A novel depicting the voyage of the whaling ship Pequod and its captain, Ahab, who seeks revenge on the white whale, Moby Dick.'),
('The Odyssey', 'Homer', 'An ancient Greek epic poem attributed to Homer, which follows the hero Odysseus on his journey home after the Trojan War.'),
('Frankenstein', 'Mary Shelley', 'A Gothic novel exploring themes of creation, identity, and the consequences of scientific ambition.'),
('Alice''s Adventures in Wonderland', 'Lewis Carroll', 'A fantastical novel following the adventures of a young girl named Alice in a surreal world.'),
('Don Quixote', 'Miguel de Cervantes', 'A satirical novel following the adventures of a nobleman who becomes obsessed with chivalric romance.'),
('War and Peace', 'Leo Tolstoy', 'An epic novel set during the Napoleonic Wars, exploring themes of love, war, and the human condition.');

ALTER TABLE booklist ADD COLUMN status VARCHAR(25) DEFAULT 'available';
JOIN booklist ON reservation.selected_books = booklist.book_id
ALTER TABLE elib CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
ALTER TABLE booklist CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
ALTER TABLE reservation CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;


    CREATE TABLE reservation (
        reservation_id  INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        FOREIGN KEY (user_id) REFERENCES elib(user_id),
        selected_books VARCHAR(25) NOT NULL,
        timess TIME,
        dates DATE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf32;