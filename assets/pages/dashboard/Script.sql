CREATE TABLE categories (
    id int PRIMARY KEY AUTO_INCREMENT,
    nom varchar(20)
);

CREATE TABLE etudiants (
    id int PRIMARY KEY AUTO_INCREMENT,
    nom varchar(25),
    email varchar(100),
    phone varchar(20),
    image varchar(50),
    genre ENUM('male','female'),
    level varchar(10),
    promotion varchar(15)
);

CREATE TABLE livres (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    auteur VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    resume TEXT NOT NULL,
    nbrPage INT NOT NULL,
    image VARCHAR(255) NOT NULL,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);


CREATE TABLE reservations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    date_debut DATE,
    date_fin DATE,
    etudiant_id INT,
    livre_id INT,
    FOREIGN KEY (etudiant_id) REFERENCES etudiants(id) ON DELETE CASCADE,
    FOREIGN KEY (livre_id) REFERENCES livres(id) ON DELETE CASCADE
);