CREATE TABLE Portes(
   IdPorte INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   NumeroPorte INT NOT NULL
);

CREATE TABLE Mois(
   IdMois INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   NomMois VARCHAR(50) NOT NULL,
   AncienIndexMois INT,
   NouvelIndexMois INT,
   DateMois DATE NOT NULL
);

CREATE TABLE Sous_compteur(
   IdSousCompteur INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   NouvelIndex DOUBLE,
   AncienIndex DOUBLE,
   status INT NOT NULL,
   IdMois INT NOT NULL,
   IdPorte INT NOT NULL,
   CONSTRAINT fk_sc_mois FOREIGN KEY(IdMois) REFERENCES Mois(IdMois),
   CONSTRAINT fk_sc_portes FOREIGN KEY(IdPorte) REFERENCES Portes(IdPorte)
);

CREATE TABLE Utilisateurs(
   IdUtilisateur INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
   NomUtilisateur VARCHAR(100) NOT NULL,
   EmailUtilisateur VARCHAR(100) NOT NULL,
   MotDePasse VARCHAR(50)
);
