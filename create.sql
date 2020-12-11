DROP TABLE IF EXISTS UTILISATEUR;
DROP TABLE IF EXISTS MUSIQUE;
DROP TABLE IF EXISTS MAGAZINE;
DROP TABLE IF EXISTS FILM;
DROP TABLE IF EXISTS LIVRE;

CREATE TABLE IF NOT EXISTS UTILISATEUR (
    ID int(11) NOT NULL AUTO_INCREMENT,
    PSEUDO varchar(50) NOT NULL UNIQUE,
    EMAIL varchar(50) NOT NULL UNIQUE,
    MOTDEPASSE varchar(50) NOT NULL,
    ISADMIN BOOLEAN NOT NULL DEFAULT 0,
    PRIMARY KEY (ID)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS MUSIQUE (
    ID int(11) NOT NULL AUTO_INCREMENT,
    TITRE varchar(50) NOT NULL,
    IMAGE varchar(70) NOT NULL,
    ARTISTE varchar(50) NOT NULL,
    ANNEESORTIE YEAR NOT NULL,
    STOCK int NOT NULL,
    PISTES TINYINT NOT NULL,
    STYLE VARCHAR(30) NOT NULL,
    PRIMARY KEY (ID)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS MAGAZINE (
    ID int(11) NOT NULL AUTO_INCREMENT,
    TITRE varchar(50) NOT NULL,
    IMAGE varchar(70) NOT NULL,
    NUMERO varchar(50) NOT NULL,
    DATEPARUTION DATE NOT NULL,
    PERIODICITE TINYINT NOT NULL,
    PRIMARY KEY (ID)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS FILM (
    ID int(11) NOT NULL AUTO_INCREMENT,
    TITRE varchar(50) NOT NULL,
    IMAGE varchar(70) NOT NULL,
    REALISATEUR varchar(50) NOT NULL,
    ANNEESORTIE YEAR NOT NULL,
    STOCK int NOT NULL,
    VEDETTE varchar(50),
    PRIMARY KEY (ID)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS LIVRE (
    ID int(11) NOT NULL AUTO_INCREMENT,
    TITRE varchar(50) NOT NULL,
    IMAGE varchar(70) NOT NULL,
    AUTEUR varchar(50) NOT NULL,
    ANNEESORTIE YEAR NOT NULL,
    STOCK int NOT NULL,
    TYPE varchar(50),
    PAGES int NOT NULL,
    PRIMARY KEY (ID)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO UTILISATEUR (PSEUDO, EMAIL, MOTDEPASSE, ISADMIN) VALUES ('admin', 'admin@admin.fr', SHA1('admin'), TRUE);

INSERT INTO MUSIQUE (TITRE, IMAGE, ARTISTE, ANNEESORTIE, STOCK, PISTES, STYLE) VALUES ('Caravelle', 'data/musique/caravelle.jpg', 'Polo & Pan', 2017, 34, 12, 'Electronique');
INSERT INTO MUSIQUE (TITRE, IMAGE, ARTISTE, ANNEESORTIE, STOCK, PISTES, STYLE) VALUES ('Currents', 'data/musique/currents.jpg', 'Tame Impala', 2015, 78, 13, 'Electronique');
INSERT INTO MUSIQUE (TITRE, IMAGE, ARTISTE, ANNEESORTIE, STOCK, PISTES, STYLE) VALUES ('ENERGY', 'data/musique/energy.jpg', 'Disclosure', 2020, 100, 20, 'House');
INSERT INTO MUSIQUE (TITRE, IMAGE, ARTISTE, ANNEESORTIE, STOCK, PISTES, STYLE) VALUES ('Vénus', 'data/musique/venus.jpg', 'Joanna', 2020, 35, 7, 'Pop');
INSERT INTO MUSIQUE (TITRE, IMAGE, ARTISTE, ANNEESORTIE, STOCK, PISTES, STYLE) VALUES ('Joshua', 'data/musique/joshua.jpg', 'French79', 2019, 0, 13, 'Electronique');
INSERT INTO MUSIQUE (TITRE, IMAGE, ARTISTE, ANNEESORTIE, STOCK, PISTES, STYLE) VALUES ('Parachute', 'data/musique/parachute.jpg', 'Petit Biscuit', 2020, 10, 9, 'Pop');
INSERT INTO MUSIQUE (TITRE, IMAGE, ARTISTE, ANNEESORTIE, STOCK, PISTES, STYLE) VALUES ('S16', 'data/musique/s16.jpg', 'Woodkid', 2020, 89, 11, 'Alternative');
INSERT INTO MUSIQUE (TITRE, IMAGE, ARTISTE, ANNEESORTIE, STOCK, PISTES, STYLE) VALUES ('After Hours', 'data/musique/afterhours.jpg', 'The Weeknd', 2020, 90, 14, 'R\'N\'B');
INSERT INTO MUSIQUE (TITRE, IMAGE, ARTISTE, ANNEESORTIE, STOCK, PISTES, STYLE) VALUES ('so sad so sexy', 'data/musique/sosadsosexy.jpg', 'Lykke Li', 2018, 43, 10, 'Pop');
INSERT INTO MUSIQUE (TITRE, IMAGE, ARTISTE, ANNEESORTIE, STOCK, PISTES, STYLE) VALUES ('Miss Anthropocene', 'data/musique/missanthropocene.jpg', 'Grimes', 2020, 0, 15, 'Electronique');


INSERT INTO MAGAZINE (TITRE, IMAGE, NUMERO, DATEPARUTION, PERIODICITE) VALUES ('PAPER Magazine', 'data/magazine/paper.jpeg', 154, '2020-03-12', 4);
INSERT INTO MAGAZINE (TITRE, IMAGE, NUMERO, DATEPARUTION, PERIODICITE) VALUES ('Hidden Scotland', 'data/magazine/hidden.jpg', 1, '2020-09-04', 0);
INSERT INTO MAGAZINE (TITRE, IMAGE, NUMERO, DATEPARUTION, PERIODICITE) VALUES ('Flow Magazine', 'data/magazine/flow.jpg', 28, '2018-10-20', 4);
INSERT INTO MAGAZINE (TITRE, IMAGE, NUMERO, DATEPARUTION, PERIODICITE) VALUES ('Vogue US', 'data/magazine/vogue.png', 2211, '2020-12-28', 4);
INSERT INTO MAGAZINE (TITRE, IMAGE, NUMERO, DATEPARUTION, PERIODICITE) VALUES ('Society', 'data/magazine/society.jpg', 4887, '2019-03-01', 5);

INSERT INTO FILM (TITRE, IMAGE, REALISATEUR, ANNEESORTIE, STOCK, VEDETTE) VALUES ('Deadpool 2', 'data/film/deadpool2.jpg', 'David Leitch', 2018, 07, 'Ryan Reynolds');
INSERT INTO FILM (TITRE, IMAGE, REALISATEUR, ANNEESORTIE, STOCK, VEDETTE) VALUES ('Harry Potter et la Coupe de feu', 'data/film/harrypotter.jpg', 'Mike Newell', 2005, 56, 'Daniel Radcliffe');
INSERT INTO FILM (TITRE, IMAGE, REALISATEUR, ANNEESORTIE, STOCK, VEDETTE) VALUES ('Inception', 'data/film/inception.jpg', 'Christopher Nolan', 2010, 34, 'Leonardo Di Caprio');
INSERT INTO FILM (TITRE, IMAGE, REALISATEUR, ANNEESORTIE, STOCK, VEDETTE) VALUES ('Le Diable s\'Habille en Prada', 'data/film/prada.jpg', 'David Frenkel', 2006, 1, 'Anne Hathaway');
INSERT INTO FILM (TITRE, IMAGE, REALISATEUR, ANNEESORTIE, STOCK, VEDETTE) VALUES ('Kill Bill vol. 1', 'data/film/killbill.jpg', 'David Leitch', 2003, 0, 'Uma Thurman');


INSERT INTO LIVRE (TITRE, IMAGE, AUTEUR, ANNEESORTIE, STOCK, TYPE, PAGES) VALUES ('Le Petit Prince', 'data/livre/lepetitprince.jpg', 'Antoine de Saint-Exupéry', 1943, 78, 'Roman', 93);
INSERT INTO LIVRE (TITRE, IMAGE, AUTEUR, ANNEESORTIE, STOCK, TYPE, PAGES) VALUES ('Call Me By Your Name', 'data/livre/cmbyn.jpg', 'André Aciman', 2007, 78, 'Roman', 316);
INSERT INTO LIVRE (TITRE, IMAGE, AUTEUR, ANNEESORTIE, STOCK, TYPE, PAGES) VALUES ('Hunger Games vol. 1', 'data/livre/hg.jpg', 'Suzanne Collins', 2008, 3, 'Roman', 374);
INSERT INTO LIVRE (TITRE, IMAGE, AUTEUR, ANNEESORTIE, STOCK, TYPE, PAGES) VALUES ('Artemis Fowl', 'data/livre/artemisfowl.jpg', 'Eoin Colfer', 2001, 0, 'Roman', 280);
INSERT INTO LIVRE (TITRE, IMAGE, AUTEUR, ANNEESORTIE, STOCK, TYPE, PAGES) VALUES ('Divergente', 'data/livre/divergente.jpg', 'Veronica Roth', 2011, 56, 'Roman', 487);