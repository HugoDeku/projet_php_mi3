DROP TABLE IF EXISTS UTILISATEUR;

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
    PSEUDO varchar(50) NOT NULL UNIQUE,
    EMAIL varchar(50) NOT NULL UNIQUE,
    MOTDEPASSE varchar(50) NOT NULL,
    ISADMIN BOOLEAN NOT NULL DEFAULT 0,
    PRIMARY KEY (ID)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO UTILISATEUR (PSEUDO, EMAIL, MOTDEPASSE, ISADMIN) VALUES ('admin', 'admin@admin.fr', SHA1('admin'), TRUE);

COMMIT;
