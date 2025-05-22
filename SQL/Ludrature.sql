CREATE database Ludrature;

Use Ludrature;

CREATE TABLE categorie (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  nom VARCHAR(100) NOT NULL,
  constraint U_categorie UNIQUE(nom));
  
  CREATE TABLE theme  (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	categorie_id INT NOT NULL,
	nom VARCHAR(100) NOT NULL,
	CONSTRAINT U_theme UNIQUE(nom),
    CONSTRAINT fk_categorie FOREIGN KEY (categorie_id) REFERENCES categorie(id)
  );
  
  CREATE TABLE produit (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(100) NOT NULL,
  auteur VARCHAR(100) NOT NULL,
  edition VARCHAR(100) NOT NULL,
  date_sortie DATE NOT NULL,
  prix VARCHAR(20) NOT NULL,
  age_min INT NOT NULL,
  age_max INT NULL
 );
  
  CREATE TABLE produit_theme(
	produit_id INT NOT NULL,
    theme_id INT NOT NULL,
    PRIMARY KEY (produit_id, theme_id),
    CONSTRAINT fk_pt_produit FOREIGN KEY (produit_id) REFERENCES produit(id),
    CONSTRAINT fk_pt_theme FOREIGN KEY (theme_id) REFERENCES theme(id)
  );

INSERT INTO categorie (nom) VALUES ('jeu');
INSERT INTO categorie (nom) VALUES ('livre');
 
INSERT INTO theme (categorie_id, nom) VALUES 
(1, 'Jeux de stratégie'),
(1, 'Jeux de déduction / enquête'),
(1, 'Jeux de rôles (RPG)'),
(1, 'Jeux coopératifs'),
(1, 'Jeux de gestion / ressources'),
(1, 'Jeux de réflexion / casse-tête'),
(1, 'Jeux familiaux'),
(1, 'Jeux de cartes'),
(1, 'Jeux éducatifs');

INSERT INTO theme (categorie_id, nom) VALUES 
(2, 'Roman'),
(2, 'Policier'),
(2, 'Science-fiction'),
(2, 'Fantasy'),
(2, 'Thriller'),
(2, 'Romance'),
(2, 'Biographie'),
(2, 'Manga'),
(2, 'Jeunesse'),
(2, 'Art & Culture');

INSERT INTO produit (nom, edition, auteur, date_sortie, prix, age_min, age_max) VALUES
('Harry Potter à l\'école des sorciers', 'Gallimard', 'J.K. Rowling', '1997-06-26', '20.00', 10, NULL),
('Fourth Wing', 'Éditions XYZ', 'Rebecca Yarros', '2023-05-01', '25.00', 16, NULL),
('Divergent', 'Nathan', 'Veronica Roth', '2011-04-25', '18.00', 14, NULL),
('Hunger Games', 'Bayard Jeunesse', 'Suzanne Collins', '2008-09-14', '22.00', 12, NULL),
('Le Seigneur des Anneaux', 'Christian Bourgois', 'J.R.R. Tolkien', '1954-07-29', '30.00', 14, NULL),
('1984', 'Seuil', 'George Orwell', '1949-06-08', '15.00', 16, NULL),
('Le Petit Prince', 'Gallimard', 'Antoine de Saint-Exupéry', '1943-04-06', '12.00', 6, NULL),
('Les Misérables', 'Hachette', 'Victor Hugo', '1862-01-01', '28.00', 16, NULL),
('Twilight', 'Hachette', 'Stephenie Meyer', '2005-10-05', '20.00', 14, NULL),
('Le Trône de Fer', 'Pygmalion', 'George R.R. Martin', '1996-08-06', '35.00', 18, NULL);

INSERT INTO produit_theme (produit_id, theme_id) VALUES
(1, 13),
(1, 18),
(2, 13),
(2, 14),
(3, 12),
(3, 18),
(4, 12),
(4, 18),
(5, 13),
(6, 12),
(7, 18),
(7, 19),
(8, 10),
(8, 19),
(9, 15),
(9, 18),
(10, 13);

INSERT INTO produit (nom, edition, auteur, date_sortie, prix, age_min, age_max) VALUES
('Dune', 'Asmodee', 'Brad Talton', '2021-10-01', '45.00', 14, NULL),
('Terraforming Mars', 'FryxGames', 'Jacob Fryxelius', '2016-08-15', '55.00', 12, NULL),
('Yahtzee', 'Hasbro', 'Edwin S. Lowe', '1956-01-01', '15.00', 8, NULL),
('Uno', 'Mattel', 'Merle Robbins', '1971-01-01', '12.00', 7, NULL),
('6 qui prend', 'Amigo', 'Wolfgang Kramer', '1994-01-01', '10.00', 10, NULL),
('Duel', 'Libellud', 'Reiner Knizia', '2017-01-01', '20.00', 14, NULL),
('La couleur des émotions : Le monstre des couleurs', 'Editions Nathan', 'Anna Llenas', '2011-01-01', '18.00', 3, 7),
('Little Coopération', 'ABC Jeux', 'Collectif', '2020-05-01', '22.00', 4, 10),
('Les Aventuriers du rail : Autour du monde', 'Days of Wonder', 'Alan R. Moon', '2019-11-01', '40.00', 8, NULL);

INSERT INTO produit_theme (produit_id, theme_id) VALUES
(11, 1),
(12, 1),
(13, 6),
(14, 8),
(15, 6),
(16, 8),
(17, 9),
(18, 4),
(19, 1);

